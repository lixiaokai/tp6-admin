<?php
declare(strict_types=1);

namespace app\common\job;

use Psr\SimpleCache\InvalidArgumentException;
use think\facade\Cache;
use think\facade\Log;
use think\queue\Job;

/**
 * 任务队列 - 基类.
 */
abstract class BaseJob
{
    /**
     * 执行 - 消息队列.
     *
     * @throws InvalidArgumentException
     */
    public function fire(Job $job, $data)
    {
        if (empty($data)) {
            Log::error(sprintf('[%s][%s] 队列无消息', __CLASS__, __FUNCTION__));
            return;
        }

        $jobId = $job->getJobId(); // 队列的数据库 id 或者 redis key
        // $jobClassName = $job->getName(); // 队列对象类
        // $queueName = $job->getQueue(); // 队列名称

        // 如果已经执行中或者执行完成就不再执行了
        if (! $this->checkJob($jobId, $data)) {
            $job->delete();
            Cache::store('redis')->delete($jobId);
            return;
        }

        // 执行业务处理
        if ($this->execute($data)) {
            Log::record(sprintf('[%s][%s] 队列执行成功', __CLASS__, __FUNCTION__));
            $job->delete(); // 任务执行成功后删除
            Cache::store('redis')->delete($jobId); // 删除 redis 中的缓存
        } else {
            // 检查任务重试次数
            if ($job->attempts() > 3) {
                Log::error(sprintf('[%s][%s] 队列执行重试次数超过3次，执行失败', __CLASS__, __FUNCTION__));

                // 第 1 种处理方式：重新发布任务，该任务延迟 10 秒后再执行；也可以不指定秒数立即执行
                //$job->release(10);

                // 第 2 种处理方式：原任务的基础上 1 分钟执行一次并增加尝试次数
                //$job->failed();

                // 第 3 种处理方式：删除任务
                $job->delete(); // 任务执行后删除
                Cache::store('redis')->delete($jobId); // 删除 redis 中的缓存
            }

        }

    }


    /**
     * 消息在到达消费者时可能已经不需要执行了.
     *
     * @throws InvalidArgumentException
     */
    protected function checkJob(string $jobId, $message): bool
    {
        // 查询 redis
        $data = Cache::store('redis')->get($jobId);
        if (! empty($data)) {
            return false;
        }

        Cache::store('redis')->set($jobId, $message);
        return true;
    }

    /**
     * 执行 - 具体的任务.
     */
    abstract protected function execute($data): bool;
}

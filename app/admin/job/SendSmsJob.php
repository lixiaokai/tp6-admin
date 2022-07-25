<?php
declare(strict_types=1);

namespace app\admin\job;

use think\queue\Job;

/**
 * 发送短信 - 任务消费者.
 */
class SendSmsJob
{
    public function fire(Job $job, $data)
    {
        //....这里执行具体的任务
        var_dump([
            '$data'=> $data,
            'attempts'=> $job->attempts(),
        ]);

        // 如果重试超过 3 次
        if ($job->attempts() > 3) {

        }

        // 任务执行成功后 删除任务
        $job->delete();
    }

    /**
     * 任务达到最大重试次数后，失败了.
     */
    public function failed($data)
    {

    }
}

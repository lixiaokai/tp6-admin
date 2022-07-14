<?php
declare(strict_types=1);

namespace app\common\exception\handler;

use think\App;
use think\exception\Handle;
use think\Response;
use Throwable;

/**
 * 应用异常处理类.
 */
class ExceptionHandle extends Handle
{
    /**
     * 记录 - 异常信息 ( 包括日志或者其它方式记录 ).
     */
    public function report(Throwable $exception): void
    {
        // 使用内置的方式记录异常日志
        parent::report($exception);
    }

    /**
     * 处理 - 异常.
     */
    public function render($request, Throwable $e): Response
    {
        // 添加自定义异常处理机制

        // 其他错误交给系统处理
        return parent::render($request, $e);
    }
}

<?php
declare(strict_types=1);

namespace app\common\exception;

/**
 * 业务 - 异常类.
 */
class BizException extends BaseException
{
    protected $code = 10400;

    protected $message = '未知错误';
}

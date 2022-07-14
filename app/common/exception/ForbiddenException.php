<?php
declare(strict_types=1);

namespace app\common\exception;

/**
 * 权限 - 异常类.
 */
class ForbiddenException extends BaseException
{
    protected $code = 10403;

    protected $message = '无权访问';
}

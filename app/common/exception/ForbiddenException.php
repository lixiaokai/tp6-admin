<?php
declare(strict_types=1);

namespace app\common\exception;

use think\Exception;

/**
 * 权限 - 异常类.
 */
class ForbiddenException extends Exception
{
    protected $code = 10403;

    protected $message = '无权访问';
}

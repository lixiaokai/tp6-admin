<?php
declare(strict_types=1);

namespace app\common\exception;

use think\Exception;

/**
 * 授权 - 异常类.
 */
class UnauthorizedException extends Exception
{
    protected $code = 10401;

    protected $message = '未经授权';
}

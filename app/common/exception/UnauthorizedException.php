<?php
declare(strict_types=1);

namespace app\common\exception;

/**
 * 授权 - 异常类.
 */
class UnauthorizedException extends BaseException
{
    protected $code = 10401;

    protected $message = '未经授权';
}

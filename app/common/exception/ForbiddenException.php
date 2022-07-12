<?php

namespace app\common\exception;

use think\Exception;

/**
 * 权限 - 异常类.
 */
class ForbiddenException extends Exception
{
    protected $message = '无权访问';

    protected $code = 104003;
}

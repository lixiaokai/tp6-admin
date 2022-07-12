<?php

namespace app\common\exception;

use think\Exception;

/**
 * 业务 - 异常类.
 */
class BizException extends Exception
{
    protected $code = 10400;

    protected $message = '未知错误';
}

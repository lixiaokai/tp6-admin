<?php
declare(strict_types=1);

namespace app\common\exception;

/**
 * 验证 - 异常类.
 */
class ValidateException extends \think\exception\ValidateException
{
    protected $code = 10422;
}

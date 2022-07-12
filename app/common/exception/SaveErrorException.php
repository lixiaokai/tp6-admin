<?php
declare(strict_types=1);

namespace app\common\exception;

use think\Exception;

/**
 * 数据 - 异常类.
 */
class SaveErrorException extends Exception
{
    protected $code = 10500;

    protected $message = '数据保存错误';
}

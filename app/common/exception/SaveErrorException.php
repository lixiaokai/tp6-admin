<?php
declare(strict_types=1);

namespace app\common\exception;

/**
 * 数据 - 异常类.
 */
class SaveErrorException extends BaseException
{
    protected $code = 10500;

    protected $message = '数据保存错误';
}

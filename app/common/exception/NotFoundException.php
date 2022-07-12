<?php
declare(strict_types=1);

namespace app\common\exception;

use think\Exception;

/**
 * 数据 - 异常类.
 */
class NotFoundException extends Exception
{
    protected $code = 10404;

    protected $message = '数据不存在';
}

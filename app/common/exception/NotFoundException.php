<?php
declare(strict_types=1);

namespace app\common\exception;

/**
 * 数据 - 异常类.
 */
class NotFoundException extends BaseException
{
    protected $code = 10404;

    protected $message = '数据不存在';
}

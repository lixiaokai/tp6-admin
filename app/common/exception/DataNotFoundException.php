<?php

namespace app\common\exception;

/**
 * 数据 - 异常类.
 */
class DataNotFoundException extends \think\db\exception\DataNotFoundException
{
    protected $code = 10404;

    protected $message = '数据不存在';
}

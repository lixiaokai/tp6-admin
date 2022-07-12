<?php
declare (strict_types = 1);

namespace app\common\exception;

use think\db\exception\DbException;

/**
 * 数据 - 异常类.
 */
class DataSaveErrorException extends DbException
{
    public function __construct(string $message = '数据保存错误')
    {
        parent::__construct($message);
    }
}

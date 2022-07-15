<?php

namespace app\common\validate;

use think\exception\ValidateException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * 验证并获取验证后的数据.
     */
    public function checked(): array
    {
        $data = $this->getRequestData();
        if (! $this->check($this->getRequestData())) {
            throw new ValidateException($this->getError());
        }

        return $data;
    }

    /**
     * 获取 - 规则中包含字段的数据.
     */
    public function getRequestData(string $type = 'param'): array
    {
        return Request::instance()->only(array_keys($this->rule), $type);
    }
}

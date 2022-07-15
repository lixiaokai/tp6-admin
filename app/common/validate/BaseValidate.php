<?php
declare(strict_types=1);

namespace app\common\validate;

use app\common\exception\ValidateException;
use think\facade\Request;
use think\Validate;

/**
 * 数据验证 - 基类.
 */
class BaseValidate extends Validate
{
    /**
     * 获取 - 验证后的数据.
     */
    public function validated(string $scene = null): array
    {
        $data = $this->getRequestData();

        $scene && $this->scene($scene);
        if (! $this->check($data)) {
            throw new ValidateException($this->getError());
        }

        return $data;
    }

    /**
     * 获取 - 规则中字段的请求数据.
     */
    public function getRequestData(): array
    {
        return Request::param(array_keys($this->rule));
    }
}

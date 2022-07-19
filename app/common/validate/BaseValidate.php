<?php
declare(strict_types=1);

namespace app\common\validate;

use app\common\exception\ValidateException;
use think\facade\Request;
use think\Validate;

/**
 * 数据验证 - 基类.
 *
 * 说明：
 * 1. 把 [ 验证规则、验证字段描述、验证场景定义 ] 由属性配置转成函数体配置.
 * 2. 获取验证后的数据，且只获取验证规则中存在的字段数据.
 */
abstract class BaseValidate extends Validate
{
    /**
     * 获取 - 验证规则.
     */
    abstract public function rules(): array;

    /**
     * 获取 - 验证字段描述.
     */
    abstract public function fields(): array;

    /**
     * 获取 - 验证场景定义.
     */
    public function scenes(): array
    {
        return [];
    }

    /**
     * 获取 - 验证后的数据.
     */
    public function validated(string $scene = null): array
    {
        $this->beforeValidated();

        $scene && $this->scene($scene);
        $data = $this->getRequestData();
        if (! $this->check($data)) {
            throw new ValidateException($this->getError());
        }

        return $data;
    }

    /**
     * 获取 - 验证后的数据 - 之前.
     *
     * 说明：
     * 1. 把 $this->rule   配置转到函数体内，使其支持动态规则.
     * 2. 把 $this->>field 字段中文映射转到函数体内.
     */
    protected function beforeValidated(): void
    {
        $this->rule = array_merge($this->rule, $this->rules());
        $this->field = array_merge($this->field, $this->fields());
        $this->scene = array_merge($this->scene, $this->scenes());
    }

    /**
     * 获取 - 规则中字段的请求数据.
     */
    protected function getRequestData(): array
    {
        return Request::param(array_keys($this->rule));
    }
}

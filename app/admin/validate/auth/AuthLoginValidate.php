<?php
declare(strict_types=1);

namespace app\admin\validate\auth;

use app\common\constant\LoginType;
use app\common\validate\BaseValidate;

/**
 * 用户登录 - 验证器类.
 */
class AuthLoginValidate extends BaseValidate
{
    public function rules(): array
    {
        $loginType = implode(',', LoginType::codes());

        return [
            'loginType' => ['require', 'in:' . $loginType],
            'phone' => ['require', 'length:11', 'mobile'],
            'password' => ['require', 'min:6', 'max:20'],
        ];
    }

    public function fields(): array
    {
        return [
            'loginType' => '登录类型',
            'phone' => '手机号',
            'password' => '密码',
        ];
    }
}

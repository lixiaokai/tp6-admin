<?php
declare(strict_types=1);

namespace app\admin\validate\auth;

use app\common\validate\BaseValidate;

/**
 * Token 刷新 - 验证器类.
 */
class AuthRefreshValidate extends BaseValidate
{
    public function rules(): array
    {
        return [
            'token' => ['require', 'alphaNum'],
        ];
    }

    public function fields(): array
    {
        return [
            'token' => '访问令牌',
        ];
    }
}

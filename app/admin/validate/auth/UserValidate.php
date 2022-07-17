<?php
declare(strict_types=1);

namespace app\admin\validate\auth;

use app\common\model\User;
use app\common\validate\BaseValidate;

/**
 * 用户管理 - 验证器类.
 */
class UserValidate extends BaseValidate
{
    public function scenes(): array
    {
        return [
            'update'  =>  ['nickname', 'status'],
        ];
    }

    public function rules(): array
    {
        // 昵称唯一验证规则 ( 排除自己 )
        $id = $this->request->param('id');
        $nicknameUniqueRule = $id ? User::class . ',nickname,' . $id : User::class;

        return [
            'nickname' => ['require', 'chsDash', 'min:2', 'max:15', 'unique' => $nicknameUniqueRule],
            'phone' => ['require', 'length:11', 'mobile', 'unique:user'],
            'password' => ['require', 'min:6', 'max:20'],
            'passwordConfirm' => ['require', 'confirm:password'],
            'status' => ['require', 'in:enable,disable'],
        ];
    }

    public function fields(): array
    {
        return [
            'nickname' => '昵称',
            'phone' => '手机号',
            'password' => '密码',
            'passwordConfirm' => '确认密码',
            'status' => '状态',
        ];
    }
}

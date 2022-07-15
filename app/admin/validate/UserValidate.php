<?php
declare(strict_types=1);

namespace app\admin\validate;

use think\Validate;

/**
 * 用户管理 - 验证器类.
 */
class UserValidate extends Validate
{
    protected $rule = [
        'nickname' => ['require', 'chsDash', 'min:2', 'max:15', 'unique:user'],
        'phone' => ['require', 'length:11', 'mobile', 'unique:user'],
        'password' => ['require', 'min:6', 'max:20'],
        'password_confirm' => ['require', 'confirm:password'],
        'status' => ['require', 'in:enable,disable'],
    ];

    protected $field = [
        'nickname' => '昵称',
        'phone' => '手机号',
        'password' => '密码',
        'password_confirm' => '确认密码',
        'status' => '状态',
    ];

    protected $scene = [
        'update'  =>  ['nickname', 'status'],
    ];
}

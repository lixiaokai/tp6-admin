<?php
declare(strict_types=1);

namespace app\common\model;

/**
 * 用户 - 模型.
 */
class User extends BaseModel
{
    protected $table = 'user';

    protected $hidden = ['password', 'salt'];

    protected $schema = [
        'id' => 'int',
        'nickname' => 'string',
        'phone' => 'string',
        'password' => 'string',
        'salt' => 'string',
        'status' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

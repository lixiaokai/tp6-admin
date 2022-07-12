<?php
declare(strict_types=1);

namespace app\common\model;

/**
 * 用户 - 模型.
 */
class User extends BaseModel
{
    protected $table = 'user';

    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    protected $hidden = ['password', 'salt'];

    protected $type = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

<?php
declare(strict_types=1);

namespace app\common\model;

use app\common\constant\StandardStatus;

/**
 * 用户 - 模型.
 *
 * @property int $id 用户 ID
 * @property string $nickname 昵称
 * @property string $phone 手机
 * @property string $password 密码
 * @property string $salt 盐值
 * @property string $status 状态 ( enable-启用 disable-禁用 )
 * @property string $createdAt 创建时间
 * @property string $updatedAt 修改时间
 *
 * @property-read string statusText 状态 - 文字
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

    public function getStatusTextAttr(): string
    {
        return StandardStatus::getText($this->getAttr('status'));
    }
}

<?php
declare(strict_types=1);

namespace app\admin\collection\auth;

use app\common\model\User;
use app\common\resource\BaseCollection;

/**
 * 用户管理 - 列表 - 集合.
 *
 * @property-read User $resource
 */
class UserCollection extends BaseCollection
{
    public function toArray(): array
    {
        return [
            'id' => $this->resource->id, // 用户 id
            'name' => $this->resource->nickname, // 用户昵称
            'phone' => $this->resource->phone, // 用户手机
            'status' => $this->resource->status, // 状态
            'statusText' => $this->resource->statusText, // 状态 - 文字
            'createdAt' => $this->resource->createdAt, // 创建时间
            'updatedAt' => $this->resource->updatedAt, // 修改时间
        ];
    }
}

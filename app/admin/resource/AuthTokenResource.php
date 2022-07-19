<?php
declare(strict_types=1);

namespace app\admin\resource;

use app\common\resource\BaseResource;

/**
 * 访问令牌 - 详情 - 资源.
 *
 * @property-read $resource
 */
class AuthTokenResource extends BaseResource
{
    public function toArray(): array
    {
        return [
            'token' => '111111', // 访问令牌
            'tokenType' => 'Bearer', // 令牌类型
            'expireIn' => 3600, // 过期时间
        ];
    }
}

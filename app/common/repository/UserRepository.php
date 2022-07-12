<?php
declare(strict_types=1);

namespace app\common\repository;

use app\common\model\User;

/**
 * 用户 - 仓库类.
 *
 * @method User find(int $id)
 * @method User create(array $data)
 * @method User update(User $model, array $data)
 */
class UserRepository extends BaseRepository
{
    protected string $modelClass = User::class;
}

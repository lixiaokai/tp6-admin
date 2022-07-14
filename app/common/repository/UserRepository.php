<?php
declare(strict_types=1);

namespace app\common\repository;

use app\common\model\User;

/**
 * 用户 - 仓库类.
 *
 * @method User getById(int $id)
 * @method User create(array $data)
 * @method User update(User $model, array $data)
 * @method bool delete(User $model)
 */
class UserRepository extends BaseRepository
{
    protected string $modelClass = User::class;

    /**
     * 用户 - 启用.
     */
    public function enable(User $model): User
    {
        $model->status = 1; // Todo: 待用常量替换
        $model->save();

        return $model;
    }

    /**
     * 用户 - 禁用.
     */
    public function disable(User $model): User
    {
        $model->status = 0; // Todo: 待用常量替换
        $model->save();

        return $model;
    }
}

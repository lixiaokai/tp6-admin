<?php

namespace app\common\repository;

use think\Model;
use think\Collection;
use think\Paginator;

/**
 * 仓库类 - 接口.
 */
interface RepositoryInterface
{
    /**
     * 获取 - 1 条主键记录.
     */
    public function getById(int $id): Model;

    /**
     * 获取 - 多条主键记录.
     */
    public function getByIds(array $ids, array $columns = ['*']): Collection;

    /**
     * 获取 - 多条某属性记录.
     */
    public function getBy(string $field, mixed $value): Collection;

    /**
     * 获取 - 所有记录.
     */
    public function all(array $columns = ['*']): Collection;

    /**
     * 获取 - 搜索记录.
     */
    public function search(): Paginator;

    /**
     * 创建 - 记录.
     */
    public function create(array $data): Model;

    /**
     * 更新 - 记录.
     */
    public function update(Model $model, array $data): Model;

    /**
     * 删除 - 记录.
     */
    public function delete(Model $model): bool;
}

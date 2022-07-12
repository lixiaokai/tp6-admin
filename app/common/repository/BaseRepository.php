<?php
declare(strict_types=1);

namespace app\common\repository;

use app\common\exception\NotFoundException;
use app\common\exception\SaveErrorException;
use Exception;
use think\App;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;
use think\Collection;
use think\Paginator;

/**
 * 仓库类 - 抽象基类.
 */
abstract class BaseRepository implements RepositoryInterface
{
    protected App $app;

    protected Model $model;

    protected string $modelClass;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->model = $this->app->make($this->modelClass);
    }

    /**
     * @throws NotFoundException
     */
    public function find(int $id): Model
    {
        try {
            return $this->model->findOrFail($id);
        } catch (DbException $e) {
            $this->app->log->error($e->getMessage());
            throw new NotFoundException();
        }
    }

    /**
     * @throws DataNotFoundException|DbException|ModelNotFoundException
     */
    public function findBy(string $field, mixed $value): Collection
    {
        // Todo: 待实现
        return $this->model->where($field, $value)->select();
    }

    /**
     * @throws DataNotFoundException|DbException|ModelNotFoundException
     */
    public function all(): Collection
    {
        // Todo: 待实现
        return $this->model->select();
    }

    /**
     * @throws DbException
     */
    public function search($perPage = 15): Paginator
    {
        // Todo: 待实现
        return $this->model->paginate();
    }

    /**
     * @throws SaveErrorException
     */
    public function create(array $data): Model
    {
        try {
            return $this->model::create($data);
        } catch (Exception $e) {
            $this->app->log->error($e->getMessage());
            throw new SaveErrorException();
        }
    }

    /**
     * @throws SaveErrorException
     */
    public function update(Model $model, array $data): Model
    {
        try {
            $model->save($data);
        } catch (Exception $e) {
            $this->app->log->error($e->getMessage());
            throw new SaveErrorException();
        }

        return $model;
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}

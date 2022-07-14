<?php
declare(strict_types=1);

namespace app\common\service\user;

use app\common\exception\NotFoundException;
use app\common\exception\SaveErrorException;
use app\common\model\User;
use app\common\repository\UserRepository;
use app\common\service\BaseService;
use think\annotation\Inject;
use think\db\exception\DbException;
use think\Paginator;

/**
 * 用户 - 服务类.
 */
class UserService extends BaseService
{
    #[Inject]
    protected UserRepository $repo;

    /**
     * 用户 - 列表.
     *
     * @throws DbException
     */
    public function search(array $search = []): Paginator
    {
        $query = $this->repo->getQuery();

        // 查询 [ 昵称 ]
        if (! empty($search['nickname'])) {
            $query->where('nickname', 'like', '%' . $search['nickname'] . '%');
        }

        return $query->order('id', 'desc')->paginate();
    }

    /**
     * 用户 - 详情.
     *
     * @throws NotFoundException
     */
    public function get(int $id): User
    {
        try {
            return $this->repo->getById($id);
        } catch (NotFoundException) {
            throw new NotFoundException(__('messages.not.found', ['name' => '用户信息']));
        }
    }

    /**
     * 用户 - 创建.
     *
     * @throws SaveErrorException
     */
    public function create(array $data): User
    {
        return $this->repo->create($data);
    }

    /**
     * 用户 - 更新.
     *
     * @throws SaveErrorException
     */
    public function update(User $model, array $data): User
    {
        return $this->repo->update($model, $data);
    }

    /**
     * 用户 - 删除.
     *
     * 说明：用户不允许删除，保留该方法，实现注释掉.
     */
    public function delete(User $user): bool
    {
        // return $this->repo->delete($user);
        return false;
    }

    /**
     * 用户 - 启用.
     */
    public function enable(User $model): User
    {
        return $this->repo->enable($model);
    }

    /**
     * 用户 - 禁用.
     */
    public function disable(User $model): User
    {
        return $this->repo->disable($model);
    }
}

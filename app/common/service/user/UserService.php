<?php
declare(strict_types=1);

namespace app\common\service\user;

use app\common\exception\NotFoundException;
use app\common\model\User;
use app\common\repository\UserRepository;
use app\common\service\BaseService;
use think\annotation\Inject;

/**
 * 用户 - 服务类.
 */
class UserService extends BaseService
{
    #[Inject]
    protected UserRepository $repo;

    /**
     * 用户 - 详情.
     *
     * @throws NotFoundException
     */
    public function get(int $id): User
    {
        try {
            return $this->repo->find($id);
        } catch (NotFoundException) {
            throw new NotFoundException('用户信息 不存在');
        }
    }
}


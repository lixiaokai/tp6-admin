<?php
declare(strict_types=1);

namespace app\admin\controller\auth;

use app\admin\collection\auth\UserCollection;
use app\admin\resource\auth\UserResource;
use app\admin\validate\UserValidate;
use app\common\controller\BaseController;
use app\common\exception\NotFoundException;
use app\common\exception\SaveErrorException;
use app\common\service\user\UserService;
use think\annotation\Inject;
use think\db\exception\DbException;
use think\Response;

class UserController extends BaseController
{
    #[Inject]
    protected UserService $service;

    /**
     * 用户管理 - 列表.
     *
     * @throws DbException
     */
    public function index(): Response
    {
        $res = $this->service->search($this->request->param());

        return UserCollection::make($res);
    }

    /**
     * 用户管理 - 详情.
     *
     * @throws NotFoundException
     */
    public function read(int $id): Response
    {
        $model = $this->service->get($id);

        return UserResource::make($model);
    }

    /**
     * 用户管理 - 创建.
     *
     * @throws SaveErrorException
     */
    public function save(UserValidate $validate): Response
    {
        $model = $this->service->create($validate->validated());

        return json(['code' => 10200, 'message' => '创建成功', 'data' => $model]);
    }

    /**
     * 用户管理 - 更新.
     * @throws NotFoundException|SaveErrorException
     */
    public function update(UserValidate $validate, int $id): Response
    {
        $model = $this->service->get($id);
        $data = $validate->validated('update');
        $this->service->update($model, $data);

        return json(['code' => 10200, 'message' => '更新成功', 'data' => $model]);
    }

    /**
     * 用户管理 - 删除.
     */
    public function delete(int $id): Response
    {
        // $user = $this->service->get($id);
        // $this->service->delete($user);

        return json(['code' => 10200, 'message' => '删除成功', 'data' => ['id' => $id]]);
    }

    /**
     * 用户管理 - 启用.
     *
     * @throws NotFoundException
     */
    public function enable(int $id): Response
    {
        $model = $this->service->get($id);
        $model = $this->service->enable($model);

        return json(['code' => 10200, 'message' => '启用成功', 'data' => $model]);
    }

    /**
     * 用户管理 - 禁用.
     *
     * @throws NotFoundException
     */
    public function disable(int $id): Response
    {
        $model = $this->service->get($id);
        $model = $this->service->disable($model);

        return json(['code' => 10200, 'message' => '禁用成功', 'data' => $model]);
    }

    /**
     * 显示编辑资源表单页.
     */
    public function edit(int $id): void
    {
        //
    }

    /**
     * 显示创建资源表单页.
     */
    public function create(): void
    {
        //
    }
}

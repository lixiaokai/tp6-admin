<?php
declare (strict_types = 1);

namespace app\admin\controller\auth;

use app\admin\validate\UserValidate;
use app\common\controller\BaseController;
use app\common\exception\NotFoundException;
use app\common\exception\SaveErrorException;
use app\common\service\user\UserService;
use think\db\exception\DbException;
use think\Response;
use think\annotation\Inject;

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

        return json(['code' => 200, 'message' => '', 'data' => $res]);
    }

    /**
     * 用户管理 - 详情.
     *
     * @throws NotFoundException
     */
    public function read(int $id): Response
    {
        $model = $this->service->get($id);

        return json(['code' => 10200, 'message' => '', 'data' => $model]);
    }

    /**
     * 用户管理 - 创建.
     *
     * @throws SaveErrorException
     */
    public function save(UserValidate $validate): Response
    {
        $model = $this->service->create($validate->checked());

        return json(['code' => 10200, 'message' => '', 'data' => $model]);
    }

    /**
     * 用户管理 - 更新.
     * @throws NotFoundException|SaveErrorException
     */
    public function update(UserValidate $validate, int $id): Response
    {
        $model = $this->service->get($id);
        $data = $validate->scene('update')->checked();
        $this->service->update($model, $data);

        return json(['code' => 10200, 'message' => '', 'data' => $model]);
    }

    /**
     * 用户管理 - 删除.
     *
     * @throws NotFoundException
     */
    public function delete(int $id): Response
    {
        $user = $this->service->get($id);
        // $this->service->delete($user);

        return json(['code' => 10200, 'message' => '', 'data' => ['id' => $id]]);
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

        return json(['code' => 10200, 'message' => '', 'data' => $model]);
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

        return json(['code' => 10200, 'message' => '', 'data' => $model]);
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

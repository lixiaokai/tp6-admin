<?php
declare (strict_types = 1);

namespace app\admin\controller\auth;

use think\Request;
use think\Response;

class UserController
{
    /**
     * 显示资源列表
     *
     * @return Response
     */
    public function index()
    {
        echo __METHOD__;
    }

    /**
     * 显示创建资源表单页.
     *
     * @return Response
     */
    public function create()
    {
        echo __METHOD__;
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return Response
     */
    public function save(Request $request)
    {
        echo __METHOD__;
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return Response
     */
    public function read($id)
    {
        echo __METHOD__;
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        echo __METHOD__;
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        echo __METHOD__;
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        echo __METHOD__;
    }
}

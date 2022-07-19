<?php
declare(strict_types=1);

namespace app\miniApp\controller;

use app\common\controller\JsonController;
use app\miniApp\validate\AuthLoginValidate;
use app\miniApp\validate\AuthRefreshValidate;
use app\miniApp\resource\AuthTokenResource;
use think\Response;

/**
 * Auth - 控制器.
 */
class AuthController extends JsonController
{
    /**
     * 用户登录.
     */
    public function login(AuthLoginValidate $validate): Response
    {
        $data = $validate->validated();

        // Todo: 待实现
        return AuthTokenResource::make();
    }

    /**
     * 用户登出.
     */
    public function logout(): Response
    {
        // Todo: 待实现
        return $this->success('退出成功');
    }

    /**
     * 令牌刷新.
     *
     * 说明：使用旧的 token 换取新的 token.
     */
    public function refresh(AuthRefreshValidate $validate): Response
    {
        $data = $validate->validated();

        // Todo: 待实现
        return AuthTokenResource::make();
    }
}

<?php
declare(strict_types=1);

namespace app\index\controller;

use app\common\controller\BaseController;
use app\common\service\oauth\WechatOAuthService;
use app\index\validate\auth\AuthLoginValidate;
use think\annotation\Inject;
use think\Response;

/**
 * Auth - 控制器.
 */
class AuthController extends BaseController
{
    #[Inject]
    protected WechatOAuthService $service;

    /**
     * 用户登录.
     */
    public function login(AuthLoginValidate $validate): Response
    {
        $data = $validate->validated();

        return redirect('');
    }

    /**
     * 用户登出.
     */
    public function logout(): Response
    {
        // Todo: 待实现

        return redirect('');
    }
}

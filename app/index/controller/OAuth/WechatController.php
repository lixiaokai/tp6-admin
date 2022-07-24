<?php
declare(strict_types=1);

namespace app\index\controller\oauth;

use app\common\controller\BaseController;
use app\common\service\oauth\WechatOAuthService;
use app\index\validate\oauth\CodeValidate;
use think\annotation\Inject;
use think\Response;

/**
 * 微信登录 - 控制器.
 */
class WechatController extends BaseController
{
    #[Inject]
    protected WechatOAuthService $service;

    /**
     * 微信登录 - 跳转.
     */
    public function login(): Response
    {
        return redirect($this->service->getAuthorizationUrl(), 200);
    }

    /**
     * 微信登录 - 回调.
     */
    public function callback(CodeValidate $validate): Response
    {
        $data = $validate->validated();
        $oauthUser = $this->service->getUser($data['code']);

        return redirect($this->service->callback($oauthUser), 200);
    }
}

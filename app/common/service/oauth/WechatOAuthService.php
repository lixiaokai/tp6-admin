<?php
declare(strict_types=1);

namespace app\common\service\oauth;

use app\common\service\BaseService;
use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;
use EasyWeChat\OfficialAccount\Application;
use Overtrue\Socialite\Contracts\ProviderInterface;
use Overtrue\Socialite\Contracts\UserInterface;
use think\App;
use think\facade\Config;

/**
 * 服务 - 基类.
 */
class WechatOAuthService extends BaseService
{
    /**
     * 授权提供者.
     */
    protected ProviderInterface $OAuth;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct()
    {
        $config = Config::get('easyWechat.officialAccount.default');
        $this->OAuth = (new Application($config))->getOAuth();
    }

    /**
     * 获取 - 授权 url.
     */
    public function getAuthorizationUrl(): string
    {
        return $this->OAuth->redirect();
    }

    /**
     * 获取 - 微信用户信息.
     *
     * 1. 通过 code 换取 access_token.
     * 2. 通过 access_token 拉取用户信息.
     * 3. 返回用户接口类.
     */
    public function getUser(string $code): UserInterface
    {
        return $this->OAuth->userFromCode($code);
    }

    /**
     * 回调逻辑处理.
     */
    public function callback(UserInterface $user): string
    {
        // Todo: 登录逻辑

        return  'redirectOriginalUrl';
    }
}

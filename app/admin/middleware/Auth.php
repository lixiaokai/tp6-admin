<?php
declare(strict_types=1);

namespace app\admin\middleware;

use app\common\exception\NotFoundException;
use app\common\exception\UnauthorizedException;
use app\common\model\User;
use app\common\service\auth\JWTService;
use app\common\service\auth\UserService;
use Closure;
use think\annotation\Inject;
use think\App;
use think\Request;

/**
 * 认证 - 中间件.
 */
class Auth
{
    #[Inject]
    protected Request $request;

    #[Inject]
    protected UserService $userService;

    #[Inject]
    protected App $app;

    /**
     * 处理请求.
     *
     * @throws NotFoundException|UnauthorizedException
     */
    public function handle(Request $request, Closure $next)
    {
        $this->app->bind('user', $this->user());

        return $next($request);
    }

    /**
     * @throws NotFoundException|UnauthorizedException
     */
    protected function user(): User
    {
        $uid = $this->uid();
        return $this->userService->get($uid);
    }

    /**
     * @throws UnauthorizedException
     */
    protected function uid(): int
    {
        $token = JWTService::getToken($this->request);
        $jwt = JWTService::decode($token);

        return $jwt->uid;
    }
}

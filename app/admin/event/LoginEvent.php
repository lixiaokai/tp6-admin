<?php
declare(strict_types=1);

namespace app\admin\event;

use app\common\model\User;

/**
 * 登录 - 事件.
 */
class LoginEvent
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}

<?php
declare(strict_types=1);

namespace app\admin\listener;

use app\admin\event\LoginEvent;

/**
 * 登录事件 -监听.
 */
class LoginListener
{
    /**
     * 事件监听处理.
     *
     * 如果返回了 false，则表示监听中止，将不再执行该事件后面的监听。
     */
    public function handle(LoginEvent $event): bool
    {
        return true;
    }
}

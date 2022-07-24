<?php
declare(strict_types=1);

/**
 * 事件 event 定义文件.
 *
 * @see https://www.kancloud.cn/manual/thinkphp6_0/1037492
 */

return [
    // 事件监听
    'listen' => [
        app\admin\event\LoginEvent::class => [app\admin\listener\LoginListener::class],
    ],
];

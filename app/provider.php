<?php
declare (strict_types = 1);

/**
 * 容器 Provider 定义文件.
 *
 * 说明：服务提供定义文件只能全局定义，不支持在应用下单独定义.
 */

return [
    think\Request::class            => app\Request::class,
    think\exception\Handle::class   => app\ExceptionHandle::class,
];

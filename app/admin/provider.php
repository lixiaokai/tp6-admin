<?php
declare(strict_types=1);

/**
 * 容器 Provider 定义文件.
 *
 * 说明：
 * 1. 服务提供定义文件只能全局定义，不支持在应用下单独定义。
 * 2. 左边是原来的类，右边是新的类，意思就是用右边新的类来替换左边原来的类 ( 实现偷天换日 )。
 *
 * 例如：
 * 1. 依赖注入时可以注入接口类，然后在这里定义，实现实际注入的是右边新的类，
 *    这样当换换一种实现时，先实现，然后在这里配置上即可.
 *
 * @see https://www.kancloud.cn/manual/thinkphp6_0/1037489
 * @see https://www.kancloud.cn/thinkphp/thinkphp6-quickstart/1352493
 */

return [
    think\Request::class => app\common\request\Request::class,
    think\exception\Handle::class => app\common\exception\handler\ApiExceptionHandle::class,
];

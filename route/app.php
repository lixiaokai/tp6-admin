<?php
declare (strict_types = 1);

use think\facade\Route;

/**
 * 应用级 miss 路由.
 *
 * 说明：当 [ 应用 ] 访问不存在时被执行. <br/>
 * 例如：http://localhost:8000/myapp/index <br/>
 *      应用 myapp 不存在时，则会执行下面的定义.
 *
 *      如果是应用内部的控制器或方法不存在时，则执行应用中路由配置的 miss 方法，而不是全局路由配置的 miss 方法
 */
Route::miss(static fn() => '404 Not Found!');

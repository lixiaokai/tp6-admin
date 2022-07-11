<?php
declare (strict_types = 1);

use think\facade\Route;

/**
 * 优化：
 * 1. 对路由进行分组可以有效提高路由的匹配性能.
 */

// 该应用 miss 路由
Route::miss(static fn() => '404 Not Found!');

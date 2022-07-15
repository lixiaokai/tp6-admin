<?php
declare (strict_types = 1);

use think\facade\Route;

/**
 * 优化：
 * 1. 对路由进行分组可以有效提高路由的匹配性能.
 */

/**
 * 全局变量规则.
 */
Route::pattern([
    'name' => '\w+',
    'id'   => '\d+',
]);

// 不需要登录的路由
Route::group(static function () {

});

// 需要登录的路由
Route::group(static function () {
    // 首页
    Route::get('index','Index/index');

    // Auth
    Route::get('auth/user','auth.User/index');
    Route::get('auth/user/<id>','auth.User/read');
    Route::post('auth/user','auth.User/save');
});

// 该应用 miss 路由
Route::miss(static fn() => '404 Not Found!');

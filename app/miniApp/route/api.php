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
    Route::post('auth/login','Auth/login');                     // 登录
    Route::post('auth/refresh','Auth/refresh');                 // 刷新 token
});

// 需要登录的路由
Route::group(static function () {
    // 首页
    Route::get('index','Index/index');

    // Auth
    Route::post('auth/logout','Auth/logout');                   // 登出
});

// 该应用 miss 路由
Route::miss(static fn() => '404 Not Found!');

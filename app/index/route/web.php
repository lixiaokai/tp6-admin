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
    Route::get('index','Index/index');                          // 首页
    Route::get('auth/login','Auth/login');                      // 登录

    // 社会化登录
    Route::get('oauth/wechat/login','oauth.Wechat/login');       // 微信登录跳转
    Route::get('oauth/wechat/callback','oauth.Wechat/callback'); // 微信登录回调
});

// 需要登录的路由
Route::group(static function () {
    // Auth
    Route::post('auth/logout','Auth/logout');                   // 登出
});

// 该应用 miss 路由
Route::miss(static fn() => '404 Not Found!');

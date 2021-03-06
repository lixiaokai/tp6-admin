<?php
declare (strict_types = 1);

use app\admin\middleware\Auth;
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

    // Auth - 用户管理
    Route::get('auth/user','auth.User/index');                  // 列表
    Route::get('auth/user/:id','auth.User/read');               // 详情
    Route::post('auth/user','auth.User/save');                  // 创建
    Route::put('auth/user/:id','auth.User/update');             // 修改
    Route::put('auth/user/:id/enable','auth.User/enable');      // 启用
    Route::put('auth/user/:id/disable','auth.User/disable');    // 禁用
})->middleware(Auth::class);

// 该应用 miss 路由
Route::miss(static fn() => '404 Not Found!');

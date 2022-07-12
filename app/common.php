<?php
declare(strict_types=1);

/**
 * 应用公共文件
 */

use think\facade\Lang;

if (! function_exists('__')) {
    /**
     * 获取语言变量值
     * @param string $name 语言变量名
     * @param array  $vars 动态变量值
     * @param string $lang 语言
     * @return mixed
     */
    function __(string $name, array $vars = [], string $lang = ''): mixed
    {
        return Lang::get($name, $vars, $lang);
    }
}

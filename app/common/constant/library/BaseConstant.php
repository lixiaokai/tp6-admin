<?php
declare(strict_types=1);

namespace app\common\constant\library;

use app\common\exception\ConstantException;
use ReflectionException;
use think\App;
use think\facade\Lang;
use think\helper\Str;

/**
 * 枚举常量 - 基类.
 */
abstract class BaseConstant
{
    protected static array $container = [];

    /**
     * @param string $name 函数名
     * @param mixed $arguments 函数参数
     * @throws ConstantException|ReflectionException
     */
    public static function __callStatic(string $name, mixed $arguments)
    {
        if (! Str::startsWith($name, 'get')) {
            throw new ConstantException('该函数还未定义');
        }

        if (! isset($arguments) || count($arguments) === 0) {
            throw new ConstantException('参数不能为空');
        }

        $code = array_shift($arguments); // 1. 取 code | 2. 使得 $arguments 只剩下纯参数
        $name = strtolower(substr($name, 3)); // 取前面 get 剩下的

        $message = ConstantCollector::get(static::class, $code, $name);

        return Lang::get($message, $arguments);
    }
}

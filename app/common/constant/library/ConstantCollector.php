<?php
declare(strict_types=1);

namespace app\common\constant\library;

use ReflectionException;
use think\helper\Arr;

/**
 * 枚举常量 - 收集器.
 */
class ConstantCollector
{
    protected static array $container = [];

    /**
     * @throws ReflectionException
     */
    public static function get($className, $code, $key)
    {
        if (! isset(static::$container[$className])) {
            self::collectClass($className);
        }

        return static::$container[$className][$code][$key] ?? '';
    }

    public static function set(string $key, $value): void
    {
        Arr::set(static::$container, $key, $value);
    }

    /**
     * 收集 class.
     *
     * 说明：
     * 通过反射获取数据并设置数据.
     *
     * @throws ReflectionException
     */
    protected static function collectClass(string $className): void
    {
        $classConstants = (new \ReflectionClass($className))->getReflectionConstants();
        $data = AnnotationReader::getAnnotations($classConstants);

        self::set($className, $data);
    }
}

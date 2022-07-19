<?php
declare(strict_types=1);

namespace app\common\constant\library;

use think\helper\Arr;

/**
 * 枚举常量 - 收集器.
 */
class ConstantCollector
{
    protected static array $container = [];

    /**
     * 通过 code 获取对应 key 注解的值.
     *
     * @param string $className 枚举常量类名
     * @param string $code      常量属性值 ( 一般也是字段值 )
     * @param string $key       注解名，如 @Text("启用") key 既是 Text
     * @return string|array
     */
    public static function get(string $className, string $code, string $key): string|array
    {
        if (! isset(static::$container[$className])) {
            self::collectClass($className);
        }

        return static::$container[$className][$code][$key] ?? '';
    }

    public static function set(string $key, string|array $value): void
    {
        Arr::set(static::$container, $key, $value);
    }

    public static function getAll(string $className): array
    {
        if (! isset(static::$container[$className])) {
            self::collectClass($className);
        }

        return array_keys(static::$container[$className] ?? []);
    }

    /**
     * 收集 class.
     *
     * 说明：
     * 通过反射获取数据并设置数据.
     */
    protected static function collectClass(string $className): void
    {
        $classConstants = (new \ReflectionClass($className))->getReflectionConstants();
        $data = AnnotationReader::getAnnotations($classConstants);

        self::set($className, $data);
    }
}

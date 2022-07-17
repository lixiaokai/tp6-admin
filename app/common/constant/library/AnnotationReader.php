<?php
declare(strict_types=1);

namespace app\common\constant\library;

use ReflectionClassConstant;
use think\helper\Str;

/**
 * 注解 - 读取类.
 */
class AnnotationReader
{
    public static function getAnnotations(array $classConstants): array
    {
        $result = [];

        /** @var ReflectionClassConstant $classConstant */
        foreach ($classConstants as $classConstant) {
            $code = $classConstant->getValue();
            $docComment = $classConstant->getDocComment();
            // 不支持 float 和 bool，因为它将被转换为 int
            if ($docComment && (is_int($code) || is_string($code))) {
                $result[$code] = self::parse($docComment, $result[$code] ?? []);
            }
        }

        return $result;
    }

    protected static function parse(string $doc, array $previous = []): array
    {
        $pattern = '/\\@(\\w+)\\(\\"(.+)\\"\\)/U';
        if (preg_match_all($pattern, $doc, $result)) {
            if (isset($result[1], $result[2])) {
                $keys = $result[1];
                $values = $result[2];

                foreach ($keys as $i => $key) {
                    if (isset($values[$i])) {
                        $previous[Str::lower($key)] = $values[$i];
                    }
                }
            }
        }

        return $previous;
    }
}

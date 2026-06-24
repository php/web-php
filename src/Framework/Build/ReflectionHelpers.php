<?php

namespace phpweb\Framework\Build;

use ReflectionAttribute;
use ReflectionClass;
use ReflectionMethod;
use function array_map;

class ReflectionHelpers
{
    /**
     * @template T of object
     * @param ReflectionClass<object>|ReflectionMethod $reflection
     * @param class-string<T> $classId
     * @return list<T>
     */
    public static function getAttributes(ReflectionClass|ReflectionMethod $reflection, string $classId): array
    {
        return array_map(fn (ReflectionAttribute $attr) => $attr->newInstance(), $reflection->getAttributes($classId));
    }

    /**
     * @template T of object
     * @param class-string<T> $classId
     * @param ReflectionClass<object>|ReflectionMethod $reflection
     * @return T|null
     */
    public static function getAttribute(ReflectionClass|ReflectionMethod $reflection, string $classId): ?object
    {
        return array_first(self::getAttributes($reflection, $classId));
    }
}

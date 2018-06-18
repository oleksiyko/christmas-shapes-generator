<?php
namespace ShapeGenerator\entities;

class ShapeSizeEnum
{
    const SIZE_S = 'S';
    const SIZE_M = 'M';
    const SIZE_L = 'L';

    /**
     * @param string $size
     * @return bool
     */
    public static function isValid(string $size): bool {
        return in_array($size, self::getSizes());
    }

    /**
     * @return string[]
     */
    public static function getSizes(): array {
        return [
            self::SIZE_S,
            self::SIZE_M,
            self::SIZE_L,
        ];
    }

    /**
     * @return string
     */
    public static function getRandomSize(): string {
        $sizes = self::getSizes();

        return $sizes[array_rand($sizes)];
    }
}

<?php
namespace ShapeGenerator\handlers;

use ShapeGenerator\entities\ChristmasShape;
use ShapeGenerator\entities\ChristmasStar;
use ShapeGenerator\entities\ShapeSizeEnum;

class ChristmasStarHandler implements ChristmasShapeHandler
{
    /**
     * @param ChristmasShape $shape
     * @return bool
     */
    public function canHandle(ChristmasShape $shape): bool
    {
        return ($shape instanceof ChristmasStar);
    }

    /**
     * @param ChristmasShape $shape
     * @return string
     */
    public function handle(ChristmasShape $shape): string
    {
        $treePresentation = '';
        $starHeight = $this->getStarHeight($shape);
        $center = floor($starHeight / 2);
        $starWidth = 2 * $starHeight - 3;
        for ($i = 0; $i < $starHeight; $i++) {
            if ($i == 0 || $i == ($starHeight - 1)) {
                $char = '+';
                $charsCount = 1;
            } else {
                $char = 'x';
                $charsCount = $starWidth - 2 - abs($center - $i) * 4;
            }
            $borderChar = $i == $center ? '+' : ' ';
            $borderSize = ($starWidth - $charsCount)/2;
            $treePresentation .= str_repeat($borderChar, $borderSize)
                . str_repeat($char, $charsCount)
                . str_repeat($borderChar, $borderSize)
                . PHP_EOL;
        }

        return $treePresentation;
    }

    /**
     * @param ChristmasShape $shape
     * @return int
     */
    private function getStarHeight(ChristmasShape $shape): int
    {
        switch ($shape->getSize()) {
            case ShapeSizeEnum::SIZE_S:
                $height = 5;
                break;
            case ShapeSizeEnum::SIZE_M:
                $height = 7;
                break;
            case ShapeSizeEnum::SIZE_L:
                $height = 11;
                break;
            default:
                $height = 0;
                break;
        }

        return $height;
    }
}
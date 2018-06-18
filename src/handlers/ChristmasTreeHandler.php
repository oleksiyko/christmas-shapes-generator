<?php
namespace ShapeGenerator\handlers;

use ShapeGenerator\entities\ChristmasShape;
use ShapeGenerator\entities\ChristmasTree;
use ShapeGenerator\entities\ShapeSizeEnum;

class ChristmasTreeHandler implements ChristmasShapeHandler
{
    /**
     * @param ChristmasShape $shape
     * @return bool
     */
    public function canHandle(ChristmasShape $shape): bool
    {
        return ($shape instanceof ChristmasTree);
    }

    /**
     * @param ChristmasShape $shape
     * @return string
     */
    public function handle(ChristmasShape $shape): string
    {

        $treePresentation = '';
        $treeHeight = $this->getTreeHeight($shape);
        for ($i = 0; $i < $treeHeight; $i++) {
            if ($i == 0) {
                $char = '+';
                $charsCount = 1;
            } else {
                $char = 'x';
                $charsCount = 2 * $i - 1;
            }
            $borderSize = ($treeHeight * 2 - 3 - $charsCount)/2;
            $treePresentation .= str_repeat(' ', $borderSize)
                . str_repeat($char, $charsCount)
                . str_repeat(' ', $borderSize)
                . PHP_EOL;
        }

        return $treePresentation;
    }

    /**
     * @param ChristmasShape $shape
     * @return int
     */
    private function getTreeHeight(ChristmasShape $shape): int
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
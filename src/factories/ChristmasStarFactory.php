<?php
namespace ShapeGenerator\factories;

use ShapeGenerator\entities\ChristmasShape;
use ShapeGenerator\entities\ChristmasStar;

class ChristmasStarFactory implements ChristmasShapeFactory {
    /**
     * @param string $size
     * @return ChristmasShape
     */
    public function createShape(string $size): ChristmasShape
    {
        return new ChristmasStar($size);
    }
}
<?php
namespace ShapeGenerator\factories;

use ShapeGenerator\entities\ChristmasShape;
use ShapeGenerator\entities\ChristmasTree;

class ChristmasTreeFactory implements ChristmasShapeFactory {
    /**
     * @param string $size
     * @return ChristmasShape
     */
    public function createShape(string $size): ChristmasShape
    {
        return new ChristmasTree($size);
    }
}
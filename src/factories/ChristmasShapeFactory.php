<?php
namespace ShapeGenerator\factories;

use ShapeGenerator\entities\ChristmasShape;

interface ChristmasShapeFactory
{
    /**
     * @param string $size
     * @return ChristmasShape
     */
    public function createShape(string $size): ChristmasShape;
}
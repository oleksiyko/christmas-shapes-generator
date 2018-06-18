<?php
namespace ShapeGenerator\handlers;

use ShapeGenerator\entities\ChristmasShape;

interface ChristmasShapeHandler
{
    /**
     * @param ChristmasShape $shape
     * @return bool
     */
    public function canHandle(ChristmasShape $shape): bool;

    /**
     * @param ChristmasShape $shape
     * @return string
     */
    public function handle(ChristmasShape $shape): string;
}
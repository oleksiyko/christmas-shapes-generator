<?php
namespace ShapeGenerator;

use ShapeGenerator\factories\ChristmasStarFactory;
use ShapeGenerator\factories\ChristmasTreeFactory;
use ShapeGenerator\handlers\ChristmasStarHandler;
use ShapeGenerator\handlers\ChristmasTreeHandler;
use \InvalidArgumentException;

class Application {
    /**
     * @param string|null $size
     * @return string
     * @throws InvalidArgumentException
     */
    public static function run(?string $size): string
    {
        $generator = new ShapesGenerator();
        $generator->addShapeFactory(new ChristmasStarFactory());
        $generator->addShapeFactory(new ChristmasTreeFactory());
        $generator->addShapeHandler(new ChristmasStarHandler());
        $generator->addShapeHandler(new ChristmasTreeHandler());

        return $generator->generate($size);
    }
}
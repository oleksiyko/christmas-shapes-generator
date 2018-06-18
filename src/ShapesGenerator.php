<?php
namespace ShapeGenerator;

use ShapeGenerator\entities\ShapeSizeEnum;
use ShapeGenerator\factories\ChristmasShapeFactory;
use ShapeGenerator\handlers\ChristmasShapeHandler;
use \InvalidArgumentException;

class ShapesGenerator {
    const SHAPES_DELIMITER = PHP_EOL;

    /**
     * @var ChristmasShapeFactory[]
     */
    private $shapeFactories = [];

    /**
     * @var ChristmasShapeHandler[]
     */
    private $shapeHandlers = [];

    /**
     * @param ChristmasShapeFactory $shapeFactory
     */
    public function addShapeFactory(ChristmasShapeFactory $shapeFactory)
    {
        $this->shapeFactories[] = $shapeFactory;
    }

    /**
     * @param ChristmasShapeHandler $shapeHandler
     */
    public function addShapeHandler(ChristmasShapeHandler $shapeHandler)
    {
        $this->shapeHandlers[] = $shapeHandler;
    }

    /**
     * @param string|null $size
     * @return string
     * @throws InvalidArgumentException
     */
    public function generate(?string $size = null): string
    {
        $size = $this->resolveSize($size);
        $shapes = [];
        $shapesRepresentation = [];

        foreach ($this->shapeFactories as $factory) {
            $shapes[] = $factory->createShape($size);
        }

        foreach ($shapes as $shape) {
            foreach ($this->shapeHandlers as $handler) {
                if ($handler->canHandle($shape)) {
                    $shapesRepresentation[] = $handler->handle($shape);
                    break;
                }
            }
        }

        return implode(self::SHAPES_DELIMITER, $shapesRepresentation);
    }

    /**
     * @param string|null $size
     * @return string
     * @throws InvalidArgumentException
     */
    private function resolveSize(?string $size): string {
        if ($size === null) {
            $size = ShapeSizeEnum::getRandomSize();
        } else if (!ShapeSizeEnum::isValid($size)) {
            throw new InvalidArgumentException(sprintf('Size %s is not supported', $size));
        }

        return $size;
    }
}
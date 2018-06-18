<?php
namespace ShapeGenerator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use \InvalidArgumentException;
use ShapeGenerator\entities\ChristmasStar;
use ShapeGenerator\entities\ChristmasTree;
use ShapeGenerator\entities\ShapeSizeEnum;
use ShapeGenerator\factories\ChristmasStarFactory;
use ShapeGenerator\factories\ChristmasTreeFactory;
use ShapeGenerator\handlers\ChristmasStarHandler;
use ShapeGenerator\handlers\ChristmasTreeHandler;

class ShapesGeneratorTest extends TestCase
{
    /**
     * @var ChristmasTreeFactory|MockObject
     */
    private $christmasTreeFactory;

    /**
     * @var ChristmasStarFactory|MockObject
     */
    private $christmasStarFactory;

    /**
     * @var ChristmasTreeHandler|MockObject
     */
    private $christmasTreeHandler;

    /**
     * @var ChristmasStarHandler|MockObject
     */
    private $christmasStarHandler;

    /**
     * @var ShapesGenerator
     */
    private $shapesGenerator;

    public function setUp()
    {
        $this->christmasTreeFactory = $this->createMock(ChristmasTreeFactory::class);
        $this->christmasStarFactory = $this->createMock(ChristmasStarFactory::class);
        $this->christmasTreeHandler = $this->createMock(ChristmasTreeHandler::class);
        $this->christmasStarHandler = $this->createMock(ChristmasStarHandler::class);
        $this->shapesGenerator = new ShapesGenerator();
    }

    public function testGenerate()
    {
        $christmasTree = new ChristmasTree(ShapeSizeEnum::SIZE_M);
        $christmasStar = new ChristmasStar(ShapeSizeEnum::SIZE_M);
        $this->christmasTreeFactory
            ->expects($this->once())->method('createShape')
            ->will($this->returnValue($christmasTree));
        $this->christmasStarFactory
            ->expects($this->once())->method('createShape')
            ->will($this->returnValue($christmasStar));
        $this->shapesGenerator->addShapeFactory($this->christmasTreeFactory);
        $this->shapesGenerator->addShapeFactory($this->christmasStarFactory);
        $this->christmasTreeHandler
            ->expects($this->atLeastOnce())->method('canHandle')
            ->will($this->returnValueMap([[$christmasStar, false], [$christmasTree, true]]));
        $this->christmasStarHandler
            ->expects($this->atLeastOnce())->method('canHandle')
            ->will($this->returnValueMap([[$christmasStar, true], [$christmasTree, false]]));
        $this->christmasTreeHandler
            ->expects($this->once())->method('handle');
        $this->christmasStarHandler
            ->expects($this->once())->method('handle');
        $this->shapesGenerator->addShapeHandler($this->christmasTreeHandler);
        $this->shapesGenerator->addShapeHandler($this->christmasStarHandler);
        $this->shapesGenerator->generate();
        $this->expectException(InvalidArgumentException::class);
        $this->shapesGenerator->generate('D');
    }
}

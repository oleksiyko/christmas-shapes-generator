<?php
namespace ShapeGenerator\factories;

use PHPUnit\Framework\TestCase;
use ShapeGenerator\entities\ChristmasTree;
use ShapeGenerator\entities\ShapeSizeEnum;

class ChristmasTreeFactoryTest extends TestCase
{
    /**
     * @var ChristmasTreeFactory
     */
    private $christmasTreeFactory;

    public function setUp()
    {
        $this->christmasTreeFactory = new ChristmasTreeFactory();
    }

    public function testCreateShape()
    {
        $christmasTree = $this->christmasTreeFactory->createShape(ShapeSizeEnum::SIZE_M);
        $this->assertInstanceOf(ChristmasTree::class, $christmasTree);
        $this->assertEquals(ShapeSizeEnum::SIZE_M, $christmasTree->getSize());
    }
}
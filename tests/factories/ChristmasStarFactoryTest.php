<?php
namespace ShapeGenerator\factories;

use PHPUnit\Framework\TestCase;
use ShapeGenerator\entities\ChristmasStar;
use ShapeGenerator\entities\ShapeSizeEnum;

class ChristmasStarFactoryTest extends TestCase
{
    /**
     * @var ChristmasStarFactory
     */
    private $christmasStarFactory;

    public function setUp()
    {
        $this->christmasStarFactory = new ChristmasStarFactory();
    }

    public function testCreateShape()
    {
        $christmasStar = $this->christmasStarFactory->createShape(ShapeSizeEnum::SIZE_M);
        $this->assertInstanceOf(ChristmasStar::class, $christmasStar);
        $this->assertEquals(ShapeSizeEnum::SIZE_M, $christmasStar->getSize());
    }
}
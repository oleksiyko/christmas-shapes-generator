<?php
namespace ShapeGenerator\handlers;

use PHPUnit\Framework\TestCase;
use ShapeGenerator\entities\ChristmasStar;
use ShapeGenerator\entities\ChristmasTree;
use ShapeGenerator\entities\ShapeSizeEnum;

class ChristmasStarHandlerTest extends TestCase
{
    /**
     * @var ChristmasStarHandler
     */
    private $christmasStarHandler;

    public function setUp()
    {
        $this->christmasStarHandler = new ChristmasStarHandler();
    }

    public function testCanHandle()
    {
        $this->assertTrue($this->christmasStarHandler->canHandle(new ChristmasStar(ShapeSizeEnum::SIZE_M)));
        $this->assertFalse($this->christmasStarHandler->canHandle(new ChristmasTree(ShapeSizeEnum::SIZE_M)));
    }

    public function test()
    {
        $mediumChristmasStar = ''
            . '     +     ' . PHP_EOL
            . '     x     ' . PHP_EOL
            . '   xxxxx   ' . PHP_EOL
            . '+xxxxxxxxx+' . PHP_EOL
            . '   xxxxx   ' . PHP_EOL
            . '     x     ' . PHP_EOL
            . '     +     ' . PHP_EOL;

        $this->assertEquals(
            $mediumChristmasStar,
            $this->christmasStarHandler->handle(new ChristmasStar(ShapeSizeEnum::SIZE_M))
        );
    }
}
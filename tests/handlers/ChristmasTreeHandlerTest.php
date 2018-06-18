<?php
namespace ShapeGenerator\handlers;

use PHPUnit\Framework\TestCase;
use ShapeGenerator\entities\ChristmasStar;
use ShapeGenerator\entities\ChristmasTree;
use ShapeGenerator\entities\ShapeSizeEnum;

class ChristmasTreeHandlerTest extends TestCase
{
    /**
     * @var ChristmasTreeHandler
     */
    private $christmasTreeHandler;

    public function setUp()
    {
        $this->christmasTreeHandler = new ChristmasTreeHandler();
    }

    public function testCanHandle()
    {
        $this->assertTrue($this->christmasTreeHandler->canHandle(new ChristmasTree(ShapeSizeEnum::SIZE_M)));
        $this->assertFalse($this->christmasTreeHandler->canHandle(new ChristmasStar(ShapeSizeEnum::SIZE_M)));
    }

    public function test()
    {
        $mediumChristmasStar = ''
            . '     +     ' . PHP_EOL
            . '     x     ' . PHP_EOL
            . '    xxx    ' . PHP_EOL
            . '   xxxxx   ' . PHP_EOL
            . '  xxxxxxx  ' . PHP_EOL
            . ' xxxxxxxxx ' . PHP_EOL
            . 'xxxxxxxxxxx' . PHP_EOL;

        $this->assertEquals(
            $mediumChristmasStar,
            $this->christmasTreeHandler->handle(new ChristmasTree(ShapeSizeEnum::SIZE_M))
        );
    }
}
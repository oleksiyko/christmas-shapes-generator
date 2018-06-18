<?php
namespace ShapeGenerator\entities;

use PHPUnit\Framework\TestCase;

class InfiniteCashMachineTest extends TestCase
{
    public function testIsValid()
    {
        $this->assertTrue(ShapeSizeEnum::isValid(ShapeSizeEnum::SIZE_S));
        $this->assertFalse(ShapeSizeEnum::isValid('D'));
    }

    public function testGetSizes()
    {
        $this->assertEquals(3, count(ShapeSizeEnum::getSizes()));
    }

    public function testGetRandomSize()
    {
        $this->assertTrue(in_array(ShapeSizeEnum::getRandomSize(), ShapeSizeEnum::getSizes()));
    }
}
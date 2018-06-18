<?php
namespace ShapeGenerator\entities;

class ChristmasTree implements ChristmasShape
{
    /**
     * @var string
     */
    private $size;

    /**
     * ChristmasTree constructor.
     * @param string $size
     */
    public function __construct(string $size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }
}
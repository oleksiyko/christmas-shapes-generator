<?php
namespace ShapeGenerator\entities;

class ChristmasStar implements ChristmasShape
{
    /**
     * @var string
     */
    private $size;

    /**
     * ChristmasStar constructor.
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
<?php

class Building
{
    private $length;
    private $width;
    private $color;
    private $floors;
    public function __construct(float $length, float $width, string $color, int $floors)
    {
        $this->length = $length;
        $this->width = $width;
        $this->color = $color;
        $this->floors = $floors;
    }

    public function __tostring(): string
    {
        return "Колір = {$this->color}, Висота = {$this->length}м, Ширина = {$this->width}м, К-ть поверхів = {$this->floors}, Площа = {$this->getArea($this->length, $this->width, $this->floors)}м^2";
    }
    private function getArea(float $length, float $width, int $floors): float
    {
        return $length * $width * $floors;
    }
}

<?php

class Building
{
    private $height;
    private $width;
    private $color;
    private $floors;
    public function __construct(float $height, float $width, string $color, int $floors)
    {
        $this->height = $height;
        $this->width = $width;
        $this->color = $color;
        $this->floors = $floors;
    }

    public function __tostring(): string
    {
        return "Колір = {$this->color}, Висота = {$this->height}м, Ширина = {$this->width}м, К-ть поверхів = {$this->floors}, Площа = {$this->getArea($this->height, $this->width)}м^2";
    }
    private function getArea(float $height, float $width): float
    {
        return $height * $width;
    }
}

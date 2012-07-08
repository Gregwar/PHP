<?php

class Rectangle
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}

class Square extends Rectangle
{
    public function __construct($width)
    {
        parent::__construct($width, $width);
    }
}

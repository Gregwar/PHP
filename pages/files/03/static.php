<?php

class Example
{
    public static $counter = 0;

    public $number;

    public function __construct()
    {
        $this->number = ++self::$counter;
    }
}

$a = new Example; echo $a->number."\n"; //1
$b = new Example; echo $b->number."\n"; //2

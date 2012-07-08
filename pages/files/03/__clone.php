<?php

class Identified
{
    static $instances = 0;
    public $instance;

    public function __construct()
    {
        $this->instance = ++self::$instances;
    }

    public function __clone()
    {
        $this->instance = ++self::$instances;
    }
}

$a = new Identified;
$b = clone $a;
echo $a->instance."\n"; // 1
echo $b->instance."\n"; // 2

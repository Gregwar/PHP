<?php

class A
{
    public $attr = 1;
}

$a = new A;
$b = $a;
$b->attr = 2;
echo $a->attr."\n"; // 2
$b = null;
echo gettype($a)."\n"; // object
$c = &$a;
$c = null;
echo gettype($a)."\n"; // null

<?php

class A
{
    public $attr = 1;
}

$a = new A;
$a->attr = 5;
$b = clone $a;
$b->attr = 6;
echo $a->attr."\n"; // 5
echo $b->attr."\n"; // 6

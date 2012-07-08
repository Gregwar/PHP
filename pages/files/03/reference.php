<?php

class A
{
    public $attr = 1;
}

function func($a)
{
    $a->attr = 2;
}

$a = new A;
func($a);
echo $a->attr."\n"; // 2

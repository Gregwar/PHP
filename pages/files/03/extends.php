<?php

class A
{
    public $a = 12;
}

class B extends A
{
    public $b = 34;
}

$b = new B;
echo $b->a, "\n"; // 12
echo $b->b, "\n"; // 34

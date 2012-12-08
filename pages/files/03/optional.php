<?php

class A
{
    public function f($x = 42)
    {
        echo "x = $x\n";
    }
}

$a = new A;
$a->f(); // x = 42
$a->f(67); // x = 67

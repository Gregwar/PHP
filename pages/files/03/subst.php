<?php

class A
{
    public $attr = 1;
}

function f($a)
{
    echo $a->attr."\n";
}

$a = new A;
f($a); // 1
$a = array(12);
f($a); // Erreur

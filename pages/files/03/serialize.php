<?php

class A
{
    public $attr = 0;
}

if (file_exists('a.txt')) {
    $a = unserialize(
        file_get_contents('a.txt')
    );
} else {
    $a = new A;
}

$a->attr++;
echo $a->attr."\n";

file_put_contents('a.txt', serialize($a));

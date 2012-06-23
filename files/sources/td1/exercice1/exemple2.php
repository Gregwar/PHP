<?php

// PHP Permet de faire des références, on peut
// ainsi créer des variables qui ne sont que des
// alias
$a = 30;
$b = &$a;
$b += 12;

echo "a = $a\n"; // a = 42

// Les références peuvent aussi se faire en apellant
// des fonctions
function change(&$x)
{
    $x += 10;
}

$x = 32;
change($x);

echo "x = $x\n"; // x = 42

// Nous reparlerons de cela lorsque nous étudierons la
// programmation orienté objet en PHP

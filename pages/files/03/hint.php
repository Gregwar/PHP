<?php

function f(A $a)
{
    echo $a->attr."\n";
}

// Si l'argument passé en paramètre n'est pas 
// du type A, une erreur claire sera levée dès 
// l'appel à la méthode
f(array());

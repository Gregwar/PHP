<?php

/**
 * Retourne vrai si $x est pair
 */
function isEven($x)
{
    return ($x%2) == 0;
}

if (isEven(2)) {
    echo "2 est pair !\n";
}

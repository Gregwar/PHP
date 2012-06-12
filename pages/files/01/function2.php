<?php

/**
 * Appel la fonction de retour si $x
 * est pair
 */
function ifIsEven($x, Closure $callback)
{
    if (($x%2) == 0) {
	$callback();
    }
}

ifIsEven(2, function() {
    echo "2 est pair!\n";
});

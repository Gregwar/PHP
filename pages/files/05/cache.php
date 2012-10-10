<?php

$var = apc_fetch('var');

if ($var === false) {
    $var = rand();
    apc_add('var', $var);
}

echo "Var: $var\n";

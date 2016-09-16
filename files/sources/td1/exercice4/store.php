<?php

/**
 * Inclusion des fonctions de gestion du magasin
 */
require_once(__DIR__.'/store_functions.php');


/**
 *  Actions qu'il est possible d'effectuer
 */
$actions = [
    'list' => function() {
        storeList();
    },
    'add' => function($name = null, $quantity = null) {
        if ($name === null or $quantity === null) {
            echo "Arguments: name quantity\n";
        } else {
            storeAdd($name, $quantity);
        }
    },
];

/**
 * Récupère l'argument et apelle la fonction correspondante
 */
array_shift($argv);

if (!$argv || !isset($actions[$argv[0]]))
{
    echo "Usage: php store.php [action] <argument1 <argument2 ...>>\n";
    echo "Actions: ".implode(', ', array_keys($actions))."\n";
    exit(0);
}

$action = $actions[$argv[0]];
array_shift($argv);

call_user_func_array($action, $argv);


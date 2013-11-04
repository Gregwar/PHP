<?php
session_start();
include('Arena/autoload.php');

use Arena\Creature\Elf;
use Arena\Creature\Wizard;
use Arena\Fight\Fight;
use Arena\Fight\FightLoader;

$root = dirname($_SERVER['SCRIPT_NAME']);
if ($root == '/') {
    $root = '';
}

/**
 * Initialisation du combat
 */
function createFight()
{
    $legolas = new Elf('Legolas');
    $saruman = new Wizard('Saruman');

    return new Fight($legolas, $saruman);
}

/**
 * Initialisation/récupération du combat
 */
$loader = new FightLoader(sha1('arena|'.__DIR__));
$fight = $loader->loadFight() ?: createFight();

/**
 * Action
 */
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
    case 'attack':
        if (isset($_GET['name'])) {
            $fight->attack($_GET['name']);
        }
        break;
    case 'reset':
        $fight = createFight();
        break;
    }
}

$winner = $fight->getWinner();

$loader->saveFight($fight);

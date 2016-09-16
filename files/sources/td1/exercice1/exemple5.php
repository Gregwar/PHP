<?php

function show($team)
{
    echo "Team :\n";

    foreach ($team as $member)
    {
        echo "  * $member\n";
    }
}

// Pour utiliser le caractère ' dans une chaîne délimitée par ',
// on utilisera le caractère d'échappement '
$SG1 = ['Jack O\'Neil'];

// La notation [] = permet d'ajouter un élément dans un tableau
$SG1[] = 'Samantha Carter';

// Ele est équivalente à array_push()
array_push($SG1, 'Teal\'C', 'Daniel Jackson');

// Pour débugger, il est possible d'utiliser la fonction php
// var_dump($var) pour afficher le contenu d'une variable explicitement
show($SG1);

// Pour supprimer un élément, il faut apeller unset() sur l'entrée
// dans le tableau
$key = array_search('Daniel Jackson', $SG1);
unset($SG1[$key]);

$SG1[] = 'Jonas Quinn';

show($SG1);

// Il est également possible de changer la valeur d'une entrée
// par une autre
$key = array_search('Jonas Quinn', $SG1);
$SG1[$key] = 'Daniel Jackson';

show($SG1);

<?php

// En PHP, une chaîne de caractère peut être
// entourée de " ou de '
// Si vous l'entourez de ", les caractères échappés
// comme \n seront evalués
// Tandis qu'avec ' ils ne le seront pas
// Dans le cas général, il vaut mieux utiliser la
// notation ' si la chaîne ne contient rien d'échappé,
// ainsi l'interpréteur pourrait perdre moins de temps
// à analyser la chaîne
$str = 'Hello ';

// Pour concaténer, on utilisera l'opérateur "."
$str = $str . 'world!';

// La notation .= est un raccourci pour ajouter une chaîne
// à une autre
$str .= "\n";

echo $str; // Hello world!\n

// Enfin, notez que les caractères d'une chaine peuvent
// être récupéré avec la notation des tableaux [$i] :
for ($i=0; $i<strlen($str); $i++)
{
    echo '--> ' . $str[$i] . "\n";
}

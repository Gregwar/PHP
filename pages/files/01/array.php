<?php
// Le type array() en PHP est particulier, il
// peut être utilisé pour stocker une série de
// valeurs ordonées :
$nombres = array(4, 8, 15, 16, 23, 42);

echo 'Il y a ' . count($nombres) . " nombres\n";
// Il y a 6 nombres

// Ou des associations clé/valeur
$couleurs = array('pomme' => 'verte',
    'fraise' => 'rouge');

echo 'La pomme est ' . $couleurs['pomme'] . "\n";
// La pomme est verte

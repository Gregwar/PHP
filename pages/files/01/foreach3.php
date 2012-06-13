<?php

$sigles = array(
    'PHP' => 'Hypertext Preprocessor',
    'JS' => 'JavaScript',
    'HTML' => 'HyperText Markup Language',
);

// Itère à travers les clés et valeurs
foreach ($sigles as $sigle => $signification) {
    echo $sigle . " veut dire $signification\n";
}

<?php

$noms = array('eric cartman', 'stan march',
    'kyle broflovski', 'kenny mccormick');

// Affiche le contenu de la variable
var_dump($noms);

// Itère en modifiant
foreach ($noms as &$nom) {
    $nom = ucwords($nom);
}

// Les noms et prénoms auront leurs
// majuscules
var_dump($noms);

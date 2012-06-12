<?php

$competences = array('html', 'css', 'js');

echo "Mes compétences:\n";

// Itère sur un tableau
foreach ($competences as $competence) {
    echo "* $competence\n";
}

// Ajoute un élément au tableau
$competences[] = 'php';

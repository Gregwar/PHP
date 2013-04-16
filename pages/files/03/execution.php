<?php

// Création d'une vidéo "Matrix"
$matrix = new Video('Matrix');
// Création d'une photo "Joconde"
$joconde = new Photo('Joconde');
// Création d'une musique "Stairway to heaven"
$stairway = new Music('Stairway to heaven');
// Création d'une playlist "P1"
$p1 = new Playlist;
// Ajout de "Matrix" à "P1"
$p1->add($matrix);
// Ajout de "Joconde" à "P1"
$p1->add($joconde);
// Création d'une playlist "P2"
$p2 = new Playlist;
// Ajout de "Stairway to heaven" à "P2"
$p2->add($stairway);
// Ajout de "P1" à "P2"
$p2->add($p1);
// Affichage de P2
echo $p2;
// Lecture de matrix
$matrix->play();

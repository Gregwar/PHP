<?php

// Créé une image rouge de 100x100
$i = imagecreatetruecolor(100, 100);
imagefill($i, 0, 0, 0xff0000);

// Précise au navigateur du client que le contenu
// est une image jpeg, et non pas une page HTML
// (text/html est le type par défaut)
header('Content-type: image/jpeg');

// Envoie l'image au client et libère ses resources
imagejpeg($i);
imagedestroy($i);

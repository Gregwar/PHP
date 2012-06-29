<?php

// Pour supprimer un cookie, vous devez indiquer
// une date d'expiration dans le passé et utiliser
// une chaîne vide ou false en tant que valeur
setcookie('seen', false, time()-3600);

<?php

$sel = 'azerty';
$password = 'f50da7a1fb642fceef1657863e1e1858';
// admin

if ($password == md5($_GET['p'].$sel)) {
    echo "Bienvenue!";
} else {
    echo "Mauvais passe !";
}

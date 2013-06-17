<?php
$pdo = include('connection.php');
 
$insert = $pdo->prepare('INSERT INTO users 
        (firstname) VALUES (?)');

// Mauvais
$insert->execute(array('firstname' =>
    htmlspecialchars($_GET['user'])));

// Bon, l'échappement doit avoir lieu 
// plus tard au moment de l'affichage
$insert->execute(array('firstname' =>
    $_GET['user']));

<?php
$pdo = include('connection.php');

$insert = $pdo->prepare('INSERT INTO users 
    (firstname,lastname,age) VALUES (?,?,?)');

// Insère 10 Jean Durand de 40 ans
for ($i=0; $i<10; $i++) {
    $insert->execute(array('Jean', 'Durand',  40));
}

<?php
$pdo = include('connection.php');

// Mauvais: requête concaténée
$pdo->query('SELECT * FROM users WHERE 
    age > '.$_GET['age']); 

// Bon: reqûete préparée
$sql='SELECT * FROM users WHERE age > :age'; 
$query=$pdo->prepare($sql);
$query->execute(array('age' => $_GET['age']));

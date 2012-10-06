<?php
$pdo = include('connection.php');

// Commence une transaction
$pdo->beginTransaction();

// Actions
$pdo->exec('DELETE FROM users WHERE 
    age = 40');

$pdo->exec('INSERT INTO users 
    (firstname,lastname,age) VALUES
    ("Jean","Durand",40)');

// Commit our rollback, pour confirmer
// ou annuler
$pdo->commit();
//$pdo->rollback();

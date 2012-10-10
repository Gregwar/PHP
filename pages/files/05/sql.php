<?php
$pdo = include('connection.php');

$sql = 'SELECT * FROM users WHERE 
    login="admin" AND password="'.
    $_GET['password'] .'"';

// ...

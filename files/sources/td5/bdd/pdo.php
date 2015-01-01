<?php

$pdo = new \PDO(
    'mysql:dbname=sondage;host=localhost',
    'sondage', 'sondage'
);

$pdo->exec('SET CHARSET UTF8');

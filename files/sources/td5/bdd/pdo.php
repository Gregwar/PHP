<?php

try {
    $pdo = new \PDO(
        'mysql:dbname=sondage;host=localhost',
        'sondage', 'sondage'
    );
} catch (\PDOException $e) {
    header('Content-type: text/plain');
    echo "Impossible de se connecter a la base de donnees\n";
    die($e->getMessage());
}

$pdo->exec('SET CHARSET UTF8');

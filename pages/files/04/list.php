<?php
$pdo = include('connection.php');

$sql = 'SELECT * FROM users';

echo "Utilisateurs :\n";

foreach ($pdo->query($sql) as $row) {
    echo '* ';
    echo $row['firstname'] . ' ';
    echo $row['lastname'] . ' ';
    echo '(' . $row['age'] . ' ans)';
    echo "\n";
}

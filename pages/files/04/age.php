<?php
$pdo = include('connection.php');

$sql = 'SELECT * FROM users WHERE age > :age';

$query = $pdo->prepare($sql);
$query->execute(array('age' => 50));

echo "Utilisateurs qui ont plus de 50 ans :\n";

foreach ($query->fetchAll() as $row) {
    echo '* ';
    echo $row['firstname'] . ' ';
    echo $row['lastname'] . ' ';
    echo '(' . $row['age'] . ' ans)';
    echo "\n";
}

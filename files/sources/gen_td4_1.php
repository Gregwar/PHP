<?php

/**
 * Script pour générer les utilisateurs et les tickets du TD 4-1
 */

try {
    $pdo = new PDO(
        'mysql:dbname=store;host=127.0.0.1',
        'root', 
        'root'
    );
} catch (PDOException $exception) {
    echo 'Erreur: '.$exception->getMessage()
        ."\n";
    exit(1);
}

$firstNames = ['Jack', 'Mary', 'Jane', 'John', 'Bob', 'Yoann', 'Kevin', 'Clara', 'Malcolm', 'Renee', 'Paul', 'Jacob', 'Jeremy', 'Ben', 'Yann', 'Travis', 'Henry', 'Martin', 'Joanna', 'Emily', 'Jessica', 'Yuri', 'Stan', 'Eric', 'Tara', 'Patrick', 'Nicolas', 'Anthony', 'Carlos', 'Juan', 'Charles', 'Stanley', 'Mike', 'Elvis', 'Erika', 'Stacy', 'Hugo'];
$lastNames = ['Brown', 'Smith', 'Doe', 'Bauer', 'Wang', 'Pratz', 'Kraft', 'Hertz', 'Lagrange', 'Descartes', 'Walker', 'Strauss', 'Westford', 'Euler', 'Trudeau', 'Austin', 'Schmitz', 'McKormick', 'Farmer', 'Klein', 'Quartz', 'Pablo', 'Xavier', 'Jones', 'Rosana', 'Gratz'];

$pdo->exec('DELETE FROM ticket_entry');
$pdo->exec('DELETE FROM tickets');
$pdo->exec('DELETE FROM users');

$userInsert = $pdo->prepare('INSERT INTO users (firstname, lastname) VALUES (?, ?)');
$ticketInsert = $pdo->prepare('INSERT INTO tickets (date, user_id) VALUES (?, ?)');
$ticketEntryInsert = $pdo->prepare('INSERT INTO ticket_entry (ticket_id, product_id, quantity) VALUES (?, ?, ?)');

for ($u=0; $u<64; $u++) {
    $firstName = $firstNames[array_rand($firstNames)];
    $lastName = $lastNames[array_rand($lastNames)];
    $userInsert->execute([$firstName, $lastName]);
    $userId = $pdo->lastInsertId();
    echo $userId."\n";

    for ($t=0; $t<mt_rand(0, 16); $t++) {
        $date = strtotime('-'.mt_rand(0,32).' days');
        $ticketInsert->execute([date('Y-m-d H:i:s', $date), $userId]);
        $ticketId = $pdo->lastInsertId();

        $products = [];
        for ($p=1; $p<mt_rand(2, 16); $p++) {
            $query = $pdo->query('SELECT id FROM products ORDER BY RAND() LIMIT 1');
            $product = $query->fetch();
            $id = $product['id'];
            if (!isset($products[$id])) {
                $products[$id] = 1;
            } else {
                $products[$id] += 1;
            }
        }

        foreach ($products as $product => $quantity) {
            $ticketEntryInsert->execute([$ticketId, $product, $quantity]);
        }
    }
}
<?php

/**
 * Code utilisé pour générer data.php
 */

$firstNames = ['Bob', 'Bill', 'Greg', 'Jack', 'John', 'Ryan', 'Jacob', 'Aaron'];
$lastNames = ['Martin', 'Smith', 'Clinton', 'Doe'];

$data = [];

for ($i=0; $i<1000; $i++) {
    $firstName = $firstNames[array_rand($firstNames)];
    $lastName = $lastNames[array_rand($lastNames)];

    $data[] = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'age' => mt_rand(1, 80),
    ];
}

echo '<?php return ';
var_export($data);
echo ';';

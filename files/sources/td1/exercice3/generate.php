<?php

$firstNames = array('Bob', 'Bill', 'Greg', 'Jack', 'John', 'Ryan', 'Jacob', 'Aaron');
$lastNames = array('Martin', 'Smith', 'Clinton', 'Doe');

$data = array();

for ($i=0; $i<1000; $i++) {
    $firstName = $firstNames[array_rand($firstNames)];
    $lastName = $lastNames[array_rand($lastNames)];

    $data[] = array(
        'first_name' => $firstName,
        'last_name' => $lastName,
        'age' => mt_rand(1, 80),
    );
}

echo '<?php return ';
var_export($data);
echo ';';

<?php

$firstNames = ['Bob', 'Bill', 'Greg', 'Jack', 'John', 'Ryan', 'Jacob', 'Aaron'];
$lastNames = ['Martin', 'Smith', 'Clinton', 'Doe'];

$data = array();

for ($i=0; $i<500; $i++) {
    $f = $firstNames[array_rand($firstNames)];
    $l = $lastNames[array_rand($lastNames)];

    $data[] = array(
        'first_name' => $f,
        'last_name' => $l,
        'money' => mt_rand(500, 10000)
    );
}

echo '<?php return ';
var_export($data);
echo ';';

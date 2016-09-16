<?php

function colorOf($fruit)
{
    // Exemple de tableau, peut être facilement
    // mis en place et utilisé pour faire des
    // recherches ou des associations
    $colors = [
        'banana' => 'yellow',
        'orange' => 'orange',
        'cherry' => 'red',
    ];

    return $colors[$fruit];
}

echo 'Banana is ' . colorOf('banana') . "\n";

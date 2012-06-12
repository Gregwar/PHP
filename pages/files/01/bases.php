<?php
// les variables sont préfixées par $
// $a n'est pas typé
$a = 12; // entier
$a = 'hello'; // chaîne

// On peut tester l'existence d'une
// variable à l'éxécution
if (isset($a)) {
    echo $a . "\n"; // hello
}

// . est l'opérateur de concaténation
// + donnera toujours une réponse numérique
echo ('1'+'1') . "\n"; // 2

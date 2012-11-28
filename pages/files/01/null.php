<?php

// Mauvais: lève une erreur (notice)
// car a est non indéfini
if ($a != null) {
    //...
}

$a = null;

// isset() teste si une variable est
// définie ET qu'elle est différent
// de null
if (isset($a)) {
}


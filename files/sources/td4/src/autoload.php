<?php

/**
 * Charge une classe, loader générique
 */
spl_autoload_register(function($class)
{
    $filename = __DIR__ . '/' . implode('/', explode('\\', $class)).'.php';

    if (file_exists($filename)) {
        include($filename);
    }
});

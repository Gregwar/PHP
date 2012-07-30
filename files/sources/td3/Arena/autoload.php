<?php

/**
 * charge une classe 
 */
spl_autoload_register(function($class)
{
    if (strpos($class, 'Arena\\') === 0) {
        $file = __DIR__ . '/' . str_replace('\\', '/', substr($class, 6)) . '.php';

        if (file_exists($file)) {
            include($file);
        }
    }
});

<?php

/**
 * Charge une classe 
 */
spl_autoload_register(function($class)
{
    if (strpos($class, 'Router\\') === 0) {
        $file = __DIR__ . '/' . str_replace('\\', '/', substr($class, 6)) . '.php';

        if (file_exists($file)) {
            include($file);
        }
    }
});

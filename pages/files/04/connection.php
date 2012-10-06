<?php

/**
 * Créer une instance pour communiquer avec la base de données :
 * - DSN: Data Source Name
 * - Utilisateur
 * - Mot de passe
 */
return new PDO(
    'mysql:dbname=user;host=127.0.0.1',
    'user', 
    'pass'
);

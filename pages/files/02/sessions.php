<?php

// Initie le système de sessions de PHP, doit 
// être fait avant l'envoi de données
session_start();

if (isset($_SESSION['count'])) {
    $_SESSION['count']++;
} else {
    $_SESSION['count'] = 1;
}

echo 'Je t\'ai vu ' . $_SESSION['count'] . 
    ' fois';

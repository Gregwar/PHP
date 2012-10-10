<?php

try
{
    throw new Exception('Bad');
} 
catch (Exception $e)
{
    echo 'Erreur: ' . 
        $e->getMessage() . "\n";
}

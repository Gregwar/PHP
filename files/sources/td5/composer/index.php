<?php
include('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('templates/');

$twig = new Twig_Environment($loader, array(
        'cache' => 'cache',
    ));

echo $twig->render('index.html.twig', array(
    'name' => 'Fabien'
));

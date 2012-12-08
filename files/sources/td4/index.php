<?php

include('src/autoload.php');

// Rendu d'une page
function render($page, $variables = array())
{
    global $router;
    extract($variables);
    include(__DIR__ . '/templates/layout.php');
}

$router = new Router\Router;

// Page d'accueil
$router->register('home', '/', function() {
    render('home');
});

// Page d'un film
$router->register('film', '/film/*', function($id) {
    render('film');
});

$router->route();

<?php

include('src/autoload.php');

$router = new Router\Router;

$model = new Cinema\Model(
    'localhost',  // Hôte
    'example',    // Base de données
    'example',    // Utilisateur
    'example'     // Mot de passe
);

// Rendu d'une page
function render($page, $variables = array())
{
    global $router;
    extract($variables);
    include(__DIR__ . '/templates/layout.php');
}

// Page d'accueil
$router->register('home', '/', function() {
    render('home');
});

// Liste des films
$router->register('films', '/films', function() use ($model) {
    render('films', array('films' => $model->getFilms()));
});

// Fiche film
$router->register('film', '/film/*', function($id) {
    render('film');
});

$router->route();

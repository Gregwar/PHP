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
    render('films', array(
        'films' => $model->getFilms()
    ));
});

// Fiche film
$router->register('film', '/film/*', function($id) use ($model) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['nom']) && isset($_POST['note']) && isset($_POST['critique'])) {
            // A faire!
        }
    }

    render('film', array(
        'film' => $model->getFilm($id)
    ));
});

// Genres
$router->register('genres', '/genres', function() use ($model) {
    render('genres', array(
        'genres' => $model->getGenres()
    ));
});

// 404
$router->register('404', '*', function() {
    render('404');
});

$router->route();

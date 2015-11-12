<?php

$loader = include('vendor/autoload.php');
$loader->add('', 'src');

$app = new Silex\Application;
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app['model'] = new Cinema\Model(
    'localhost',  // Hôte
    'cinema',    // Base de données
    'root',    // Utilisateur
    'root'     // Mot de passe
);

// Page d'accueil
$app->match('/', function() use ($app) {
    return $app['twig']->render('home.html.twig');
})->bind('home');

// Liste des films
$app->match('/films', function() use ($app) {
    return $app['twig']->render('films.html.twig', array(
        'films' => $app['model']->getFilms()
    ));
})->bind('films');

// Fiche film
$app->match('/film/{id}', function($id) use ($app) {
    if ($app['request']->getMethod() == 'POST') {
        if (isset($_POST['nom']) && isset($_POST['note']) && isset($_POST['critique'])) {
            // XXX: A faire
        }
    }

    return $app['twig']->render('film.html.twig', array(
        'film' => $app['model']->getFilm($id),
        'casting' => $app['model']->getCasting($id),
    ));
})->bind('film');

// Genres
$app->match('/genres', function() use ($app) {
    return $app['twig']->render('genres.html.twig', array(
        'genres' => $app['model']->getGenres()
    ));
})->bind('genres');

// Fait remonter les erreurs
$app->error(function($error) {
    throw $error;
});

$app->run();

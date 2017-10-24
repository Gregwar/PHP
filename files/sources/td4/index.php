<?php

$loader = include('vendor/autoload.php');
$loader->add('', 'src');

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application;
$app->register(new Silex\Provider\AssetServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/views',
]);

// Fait remonter les erreurs
$app['debug'] = true;

$app['model'] = new Cinema\Model(
    'localhost',  // Hôte
    'cinema',    // Base de données
    'cinema',    // Utilisateur
    'cinema'     // Mot de passe
);

// Page d'accueil
$app->match('/', function() use ($app) {
    return $app['twig']->render('home.html.twig');
})->bind('home');

// Liste des films
$app->match('/films', function() use ($app) {
    return $app['twig']->render('films.html.twig', [
        'films' => $app['model']->getFilms()
    ]);
})->bind('films');

// Fiche film
$app->match('/fiche_film/{id}', function($id, Request $request) use ($app) {
    if ($request->getMethod() == 'POST') {
        $post = $request->request;
        if ($post->has('nom') && $post->has('note') && $post->has('critique')) {
            // XXX: A faire
        }
    }

    return $app['twig']->render('film.html.twig', [
        'film' => $app['model']->getFilm($id),
        'casting' => $app['model']->getCasting($id),
    ]);
})->bind('film');

// Genres
$app->match('/genres', function() use ($app) {
    return $app['twig']->render('genres.html.twig', [
        'genres' => $app['model']->getGenres()
    ]);
})->bind('genres');

$app->run();

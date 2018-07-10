<?php

$loader = include('vendor/autoload.php');
$loader->add('', 'src');

use Slim\Http\Request;
use Slim\Http\Response;

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'hostname' => 'localhost',
            'user' => 'cinema',
            'password' => 'cinema',
            'database' => 'cinema',
        ]
    ]
]);

// Enregistrement de Twig
$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

    return $view;
};

// Enregistrement de la base de données
$container['model'] = function($app) {
    $db = $app['settings']['db'];
    return new Cinema\Model($db['hostname'], $db['database'], $db['user'], $db['password']);
};

// Page d'accueil
$app->get('/', function(Request $request, Response $response, array $args) {
    return $this->view->render($response, 'home.html.twig');
})->setName('home');

// Liste des films
$app->get('/films', function(Request $request, Response $response, array $args) {
    return $this->view->render($response, 'films.html.twig', [
        'films' => $this->model->getFilms()
    ]);
})->setName('films');

// Fiche film
$app->get('/fiche_film/{id}', function(Request $request, Response $response, array $args) use ($app) {
    $id = (int)$args['id'];

    return $this->view->render($response, 'film.html.twig', [
        'film' => $this->model->getFilm($id),
        'casting' => $this->model->getCasting($id),
    ]);
})->setName('film');

$app->post('/fiche_film/{id}', function(Request $request, Response $response,array $args) {
    $post = $request->getParsedBody();
    
    throw new \Exception("A faire dans le TD!");

    return $response->withRedirect($this->router->pathFor('film', $args));
})->setName('film_critique');

// Genres
$app->get('/genres', function($request, $response, $args) {
    return $this->view->render($response, 'genres.html.twig', [
        'genres' => $this->model->getGenres()
    ]);
})->setName('genres');

$app->run();

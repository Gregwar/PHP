<?php
include('Router/autoload.php');

$router = new Router\Router;

// Rendu d'une page
function render($page, $variables)
{
    global $router;
    extract($variables);

    include(__DIR__ . '/templates/layout.php');
}

// Page d'accueil
$router->register('home', '/', function() {
    render('home');
});

// Page de salutation
$router->register('hello', '/hello/*', function($name) {
    render('hello', ['name' => $name]);
});

// Route par défaut dans le cas ou aucune autre n'a été trouvée
$router->fallback(function() {
    render('404');
});

try {
    $router->route();
} catch (\Exception $e)  {
    echo 'Erreur: ' . $e->getMessage();
}

<?php
include('Router/autoload.php');

$router = new Router\Router;

function render($page, $variables)
{
    global $router;

    foreach ($variables as $k => $v) {
        $$k = htmlspecialchars($v);
    }

    include(__DIR__ . '/templates/layout.php');
}

// Page d'accueil
$router->register('index', '/', function() {
    render('home');
});

// Page de salutation
$router->register('hello', '/hello/*', function($name) {
    render('hello', array('name' => $name));
});

// Page par défaut dans le cas échéant
$router->fallback(function() {
    render('404');
});

try {
    $router->route($_SERVER['PATH_INFO']);
} catch (\Exception $e)  {
    echo 'Erreur: ' . $e->getMessage();
}

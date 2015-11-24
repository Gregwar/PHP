<?php

$loader = include('vendor/autoload.php');
$loader->add('', 'src');

$app = new Silex\Application;

// App configuration
$app['config'] = require('config.php');

// Model
$app['model'] = $app->share(function() use ($app) {
    return new Model($app['config']['database']);
});

// Enabling debug
$app['debug'] = true;

// TWIG services
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Sessions
$app->register(new Silex\Provider\SessionServiceProvider());

// Loading controllers
include('controllers.php');

return $app;

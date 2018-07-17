<?php

use Cinema\Model;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$loader = include('vendor/autoload.php');
$loader->add('', 'src');

$app = include('app.php');

return ConsoleRunner::createHelperSet($app->getContainer()->model->getManager());
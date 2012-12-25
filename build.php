<?php

include('vendor/autoload.php');

$slidey = new Gregwar\Slidey\Slidey;

/**
 * Customizing template
 */
$slidey->template->set('mainTitle', 'PHP');
$slidey->template->set('footer', file_get_contents('license.htm'));
$slidey->template->addCss('css/style.css');

/**
 * Adding custom directories
 */
$slidey->copy('css');
$slidey->mkdir('files');
$slidey->copy('files/*.zip', 'files/');
$slidey->copy('static/favicon.ico');

$password = @include('password.php');

if ($password) {
    $slidey->enableInteractive($password, '/tmp/phpslidey');
}

$slidey->build('../php');

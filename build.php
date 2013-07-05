<?php

include('vendor/autoload.php');

$slidey = new Gregwar\Slidey\Slidey;

/**
 * Customizing template
 */
$slidey->setTitle('PHP');
$slidey->addCss('css/style.css');

/**
 * Adding custom directories
 */
$slidey->copy('css', 'css');
$slidey->copy('img', 'img');
$slidey->mkdir('files');
$slidey->copy(__DIR__.'/files/*.zip', 'files/');
$slidey->copy('favicon.ico');

/**
 * Interactive mode
 */
$password = @include('password.php');

if ($password) {
    $slidey->enableInteractive($password, '/tmp/phpslidey');
}

$slidey->build('../php');

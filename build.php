<?php

include('vendor/autoload.php');
include('phpnet.php');

use Gregwar\Slidey\Slidey;

$slidey = new Slidey;

$slidey
    ->setTitle('PHP')
    ->addReference(new PhpNet)
    ->copy('img')
    ->copy('css')
    ->mkdir('files')
    ->copy(__DIR__.'/files/*.zip', 'files/')
    ->copy(__DIR__.'/files/*.bat', 'files/')
    ->addCss('css/style.css')
    ->copy('favicon.ico')
    ;

$password = @include('password.php');
if ($password) {
    $slidey->enableInteractive($password, '/tmp/phpslidey');
}

$slidey->build('../php');

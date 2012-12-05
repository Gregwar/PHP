<?php

include('vendor/autoload.php');

$slidey = new Gregwar\Slidey\Slidey;

/**
 * Customizing template
 */
$slidey->template->mainTitle = 'PHP';
$slidey->template->addCss('css/style.css');
$slidey->template->footer = file_get_contents('license.htm');

/**
 * Adding custom directories
 */
$slidey->copy('css');
$slidey->mkdir('files');
$slidey->copy('files/*.zip', 'files/');
$slidey->copy('static/favicon.ico');

$slidey->build('../php');

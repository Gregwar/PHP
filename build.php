<?php

include('slidey/slidey.php');

$slidey = new Gregwar\Slidey\SlideyStandard;

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
$slidey->copy('files');
$slidey->copy('static/favicon.ico');

$slidey->build('../php');

<?php

include('image/Image.php');

include('slidey/slidey.php');

$slidey = new Gregwar\SlideyBuilder;

/**
 * Customizing template
 */
$slidey->template->mainTitle = 'PHP';
$slidey->template->addCss('css/style.css');
$slidey->template->footer = file_get_contents('license.htm');

/**
 * Adding custom directories
 */
$slidey->copyDirectory('css');
$slidey->copyDirectory('cache');

$slidey->build('../php');

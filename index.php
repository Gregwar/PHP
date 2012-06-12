<?php

include('slidey/slidey.php');

$slidey = new Gregwar\Slidey;

$slidey->template->mainTitle = 'PHP';
$slidey->template->addCss('css/style.css');
$slidey->template->footer = file_get_contents('license.php');

$slidey->process($_GET['page']);

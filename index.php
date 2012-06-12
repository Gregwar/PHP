<?php

include('slidey/slidey.php');

$slidey = new Gregwar\Slidey;

$slidey->template->mainTitle = 'PHP';
$slidey->template->addCss('css/style.css');

$slidey->process($_GET['page']);

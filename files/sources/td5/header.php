<?php
session_start();
include('bdd/pdo.php');
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Social Sondage</title>
        <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
    </head>
    <body>
        
    <h1>
        <img src="imgs/poll.png" />
        Social <span class="sondage">Sondage</span>
    </h1>
    <nav class="navbar navbar-default">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="register.php">Inscription</a></li>
            <li><a href="login.php">Identification</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
            <li><a href="polls.php">Sondages</a></li>
          </ul>
        </div>
    </nav> 

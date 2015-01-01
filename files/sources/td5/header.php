<?php
session_start();
include('bdd/pdo.php');
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Poller</title>
        <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        
    <h1><img src="imgs/poll.png" /> Sondages <span class="mania">Mania</span></h1>
    <nav class="navbar navbar-default">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="register.php">Inscription</a></li>
            <li><a href="login.php">Identification</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
            <li><a href="my-polls.php">Mes sondages</a></li>
            <li><a href="create.php">Nouveau sondage</a></li>
          </ul>
        </div>
    </nav> 

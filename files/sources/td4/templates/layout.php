<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cinéma</title>
    </head>
    <body>
        <h1>Cinéma</h1>
        <div class="menu">
            <a href="<?php echo $router->generate('home'); ?>">Accueil</a> -
            <a href="<?php echo $router->generate('films'); ?>">Films</a>
        </div>        

        <?php include(__DIR__.'/'.$page.'.php'); ?>
    </body>
</html>

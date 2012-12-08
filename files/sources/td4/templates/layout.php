<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Cinéma</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $router->generateStatic('css/style.css'); ?>" />
    </head>
    <body>
        <h1>Cinéma</h1>
        <div class="menu">
            <a href="<?php echo $router->generate('home'); ?>">Accueil</a>
            <a href="<?php echo $router->generate('films'); ?>">Films</a>
            <a href="<?php echo $router->generate('genres'); ?>">Genres</a>
        </div>        

        <div class="contents">
            <?php include(__DIR__.'/'.$page.'.php'); ?>
        </div>
    </body>
</html>

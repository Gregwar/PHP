<?php
include('controller.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Arena</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h1>Arena</h1>
        <h2>Combat</h2>

        <?php if ($winner) { ?>
            <?php echo $winner; ?> a gagné ! <a href="?action=reset">Réinitialiser</a>
        <?php } else { ?>
            <?php foreach ($fight->creatures as $creature) { ?>
                <div class="creature">
                <img src="img/<?php echo $creature->getName(); ?>.jpg" />
                <span class="name"><?php echo $creature; ?></span><br />
                <div class="life"><div class="life_inside" style="width:<?php echo $creature->getLife(); ?>px;"></div></div>
                </div>
            <?php } ?>

            <h2>Action</h2>
            C'est le tour de <?php echo $fight->getCreature(); ?>&nbsp;:
            <ul>
                <?php foreach ($fight->getCreature()->getAttacks() as $attack) { ?>
                    <li><a href="?action=attack&name=<?php echo $attack->getName(); ?>"><?php echo $attack->getName(); ?></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </body>
</html>

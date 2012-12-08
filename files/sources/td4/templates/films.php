<h2>Films</h2>

<p>
    <?php if (count($films)) { ?>
        <?php foreach ($films as $film) { ?>
        <div class="film">
            <h3><?php echo $film['nom']; ?></h3>
            <em>Genre: <?php echo $film['genre_nom']; ?></em><br />
            <a href="<?php echo $router->generate('film', array($film['id'])); ?>">Fiche film &raquo;</a>
        </div>
        <?php } ?>
    <?php } else { ?>
        Il n'y a aucun film!
    <?php } ?>
</p>

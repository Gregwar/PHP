<h2>Genres</h2>

<ul>
<?php foreach ($genres as $genre) { ?>
    <li><?php echo $genre['nom']; ?> (<?php echo $genre['nb_films']; ?> films)</li>
<?php } ?>
</ul>

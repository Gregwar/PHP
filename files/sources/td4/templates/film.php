<?php if (!$film) { ?>
<h2>Fiche film</h2>

Film non trouvé!
<?php } else { ?>
<div class="fiche">
    <img src="<?php echo $film['image']; ?>" />
    <h2><?php echo $film['nom']; ?> - Fiche film</h2>
    <b>Genre: <?php echo $film['genre_nom']; ?></b>
    <p class="description">
        <?php echo $film['description']; ?>
    </p>
</div>
<div class="commentaires">
<h2>Critiques</h2>
<em>A venir</em>
</div>
<div class="ajout">
    <h2>Ajouter votre critique</h2>
    <form method="post" />
        Nom: <br/><input type="text" name="nom" /><br />
        Note: <br/><input size="3" type="number" name="note" />/5<Br/>    
        Critique: <br/>
        <textarea rows="5" name="critique"></textarea>
        <hr/>
        <input type="submit" value="Envoyer" />
    </form>
</div>
<?php } ?>

<!-- Pas bon, car cet exemple contient 
de la logique -->
<?php if (userExists($_GET['id'])) { ?>
    Bienvenue <?php echo userName($_GET['id']); ?>
<?php } ?>

<!-- L'utilisateur doit être obtenu par un 
contrôleur puis passé à la template qui 
ne fait que de l'affichage -->
<?php if ($user) { ?>
    Bienvenue <?php echo $user->getName(); ?>
<?php } ?>

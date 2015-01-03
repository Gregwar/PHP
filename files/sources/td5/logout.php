<?php include('header.php'); ?>

<?php
if ($currentUser) {
    unset($_SESSION['user']);
?>
<script>document.location='logout.php';</script>
<?php
}
?>

<h2>Déconnexion</h2>

<div class="alert alert-success">
    Vous êtes maintenant déconnectés.
</div>

<?php include('footer.php'); ?>

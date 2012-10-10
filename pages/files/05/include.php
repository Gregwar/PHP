<!DOCTYPE html>
<html>
    <body>
        <h1>Titre</h1>
        <div class="menu">
            <a href="?p=home.php">Accueil</a>
            <a href="?p=books.php">Livres</a>
        </div>

        <?php include('pages/'.$_GET['p']); ?>
    </body>
</html>

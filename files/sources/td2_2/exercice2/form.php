<?php

function traitement($prenom)
{
    echo 'Vous vous nommez ' . htmlspecialchars($prenom);
    echo '<hr/>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title>Formulaire</title>
    </head>
    <body>
        <h1>Formulaire</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if (isset($_POST['prenom'])) 
    {
        // Le formulaire est valide et bien rempli, appel du traitement
        // sur les données
        traitement($_POST['prenom']);
    }
}
?>

        <form method="post">
            Votre prénom&nbsp;:
            <input type="text" name="prenom" /><br />
            <hr />
            <input type="submit" value="Envoyer" />
        </form>
    </body>
</html>

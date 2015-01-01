<?php
session_start();

if (isset($_GET['login']) && isset($_GET['pass'])) {
    if ($_GET['login'] == 'admin' && $_GET['pass'] == 'roxx') {
	$_SESSION['admin'] = true;
    } else {
	$error = 'Identifiant invalide: '.$_GET['login'];
    }
}

if (isset($_GET['logout'])) {
    unset($_SESSION['admin']);
    header('location: ?');
}

$admin = isset($_SESSION['admin']);

?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8" />
	<title>Page d'admin</title>
    </head>
    <body>
	<?php if ($admin) { ?>
	Bienvenue, admin !

	<a href="?logout=1">Déconnexion</a>
	<?php } else { ?>
        Vous n'êtes pas identifiés !<br />
        <?php if (isset($error)) { ?>
            <span style="color:red"><?php echo $error; ?></span>
        <?php } ?>

	<form>
	    Identifiant&nbsp;: <input type="text" name="login" /><br />
	    Mot de passe&nbsp;: <input type="password" name="pass" /></br />
	    <input type="submit" />
	</form>
	<?php } ?>
    </body>
</html>

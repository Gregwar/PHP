<html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'Ton nom es: '.$_POST['nom'];
}
?>
<form method="post">
    <input type="text" name="nom" /><br />
    <input type="submit" />
</form>
</html>

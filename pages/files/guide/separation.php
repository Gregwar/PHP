<ul>
<?php 
// Mauvais: une requête ne doit jamais
// être réalisée dans une page
$q = $pdo->query('SELECT * FROM users');
foreach ($q as $r) { ?>
    <li><?php echo $r['login'] ?></li>
<?php } ?>
</ul>

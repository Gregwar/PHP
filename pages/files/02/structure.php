<?php

$volumes = array('La communauté de l\'anneau', 
    'Les deux tours', 'Le retour du roi');

?>

Les volumes :
<ul>
    <?php foreach ($volumes as $volume) { ?>
        <li><?php echo $volume; ?></li>
    <?php } ?>
</ul>

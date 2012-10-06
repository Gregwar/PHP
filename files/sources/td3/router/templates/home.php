<h1>Bienvenue !</h1>

Page d'accueil<br >

<a href="<?php echo $router->generate('hello', array('Paul')); ?>">Bonjour Paul</a><br />
<a href="<?php echo $router->generate('hello', array('Pierre')); ?>">Bonjour Pierre</a>

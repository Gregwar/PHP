<?php $slidey->chapter('Les bases du PHP', 'bases-du-php'); ?>

<div class="slide">
<?php echo $slidey->part('Introduction : qu\'est-ce que PHP ?'); ?>
<h3>Présentation</h3>

<center>
    <img class="right" src="<?php echo \Gregwar\Image\Image::open('img/php.png')
	->resize(150)
	->guess(); ?>" title="Logo PHP" />
	</center>

<p class="textOnly">
    <b>PHP</b> est l'acronyme récursif de <b>PHP: Hypertext Preprocessor</b>, datant
de 1994. Il a été largement conçu et pensé pour réaliser des sites webs.<br />
    Cependant, c'est avant tout un langage de programmation et de scripting.<br />
</p>

<ul class="slideOnly">
    <li><b>PHP</b>: PHP, Hypertext Preprocessor</li>
    <li>Un langage de programmation avant tout</li>
</ul>

<div class="discover">
<b>PHP</b> est :

<ul>
    <li class="discover">Interprété</li>
    <li class="discover">Faiblement typé</li>	
    <li class="discover">Multi paradigmes (impératif, objet, fonctionnel etc.)</li>
    <li class="discover">Libre et gratuit</li>
    <li class="discover">Très répandu sur le marché</li>
    <li class="discover">Doté d'un grand jeu d'extension et de bibliothèques</li>
</ul>
</div>
</div>

<div class="slide">
    <h3>Prérequis</h3>
    <p>
	Avant d'aller plus loin, nous considérerons que vous avez des connaissances
en web, notamment en <b>HTML</b>, <b>CSS</b> et <b>JavaScript</b>. Il est également
nécéssaire d'avoir des connaissances en programmation impératives (variables, 
structures de contrôle, fonctions etc.). Il est préférable d'avoir déjà fait de la 
programmation orientée objet.
    </p>
    <p>
	En ce qui concerne le <b>PHP</b>, aucun prérequis n'est nécéssaire.
    </p>
</div>

<div class="slide">
<?php echo $slidey->part('Installation et utilisation'); ?>
<h3>Introduction</h3>
<p>
    Le langage <b>PHP</b> est très largement utilisé pour réaliser des sites webs,
il a même été conçu pour cela.
</p>
<p>
    Dans un premier temps, nous allons nous intérésser au langage en lui même ainsi
qu'à ses particularités.
</p>
</div>

<div class="slide">
<h3>Installation de l'intérpreteur</h3>
<p>
    L'ensemble de la documentation et des fichiers binaires de <b>PHP</b> peuvent 
etre trouvés sur le site officiel <a href="http://php.net">http://php.net</a>.
</p>
<p>
    Sous linux, vous trouverez l'interpreteur <b>PHP</b> dans les dépôts <b>apt</b> :
    <?php echo $slidey->highlight('files/01/apt.sh', 'html'); ?>
</p>
<p>
    Sous windows, vous trouverez les binaires à l'adresse suivante :<br />
    <a href="http://windows.php.net/download/">http://windows.php.net/download/</a>
</p>
</div>

<div class="slide">
<h3>Hello world</h3>
<p>
<div class="discover">
    Il est possible de faire un hello world simplement :
    <?php echo $slidey->highlight('files/01/hello_world_1.php'); ?>
</div>
</p>
<p>
<div class="discover">
    Ou encore en PHP brut :
    <?php echo $slidey->highlight('files/01/hello_world_2.php'); ?>
</div>
</p>
<p>
<div class="discover">
    Ou en version mixte :
    <?php echo $slidey->highlight('files/01/hello_world_3.php'); ?>
</div>
</p>
<p class="textOnly">
    Comme vous le voyez, l'interpreteur <b>PHP</b> n'évalue que le code délimité
par les balises <b>&lt;?php</b> et <b>?&gt;</b>, tout le reste est envoyé 
directement sur la sortie standard.<br />
    Ceci est assez pratique pour réaliser rapidement des "<b>templates</b>", sortes
de textes à trou dans lesquels le code vient s'insérer
</p>

</div>

<div class="slide">
<h3>Utilisation</h3>
<p>
    Pour utiliser l'interpreteur <b>PHP</b>, utilisez simplement la commande "php"
dans votre terminal :

    <?php echo $slidey->highlight('files/01/use.sh', 'html'); ?>
</p>
</div>

<div class="textOnly">
<p>
    Utiliser l'intérpréteur peut être très utile, il peut vous servir à faire des
tests simplement en écrivant des scripts directement. A terme, vous pourrez également
utiliser <b>PHP</b> comme langage de script, ce qui peut vous faire gagner du
temps pour manipuler des fichiers, automatiser des tâches etc.
</p>
<p>
    Dans ce chapitre, nous allons étudier le fonctionnement du langage. Nous parlerons
alors dans le chapitre suivant de comment se fait la liaison avec le web et notamment 
le protocole <b>HTTP</b>.
</p>
</div>

<div class="slide slideOnly">
<h3>Utilisation</h3>
<p>
    Utiliser l'intérpréteur peut servir à :
    <ul>
	<li>Faire des tests (pratique pour découvrir le langage)</li>
	<li>Utiliser PHP comme langage de script</li>
    </ul>
</p>
<p>
    Dans cette partie, nous utiliserons uniquement l'interpréteur en ligne de commande.
</p>
</div>

<div class="slide">
<?php echo $slidey->part('Présentation du langage'); ?>
<h3>Exemple basique</h3>
<p>
    <b>PHP</b> est faiblement typé :
    <?php echo $slidey->highlight('files/01/bases.php'); ?>
</p>

<div class="textOnly">
<p>
    Les variables se préfixent par le symbole <code>$</code> et ne sont pas typées, comme
ci-dessus, <code>$a</code> peut contenir aussi bien un entier qu'une chaîne. Son type
change en pleine exécution.
</p>
<p>
    Du fait que <b>PHP</b> soit intérprété, les variables, fonctions ou classes ne sont
connues qu'au moment de l'éxécution (pas de phase de compilation).
</p>
<p>
    Il est de ce fait possible de tester l'éxistence d'une variable au moment de l'éxécution
à l'aide de la fonction <code>isset();</code>
</p>
<p>
    L'opérateur de concaténation est le <code>.</code>, le <code>+</code> étant réservé
exclusivement pour les opérations mathématiques.
</p>
</div>
</div>

<div class="slide">
<h3>Les tableaux</h3>
<p>
    Les <code>array()</code> en <b>PHP</b> permettent de faire de nombreuses choses :

    <?php echo $slidey->highlight('files/01/array.php'); ?>
</p>

<div class="textOnly">
<p>
    On peut en effet les utiliser afin de stocker une suite de valeurs ordonnées et
accessibles grâce à la notation <code>[]</code>. Il est possible de connaître la taille
d'un tableau à l'aide de la fonction <b>PHP</b> <code>count()</code>.
</p>
<p>
    Avec cette même structure de donnée, il est également possible de créer des tableau
<b>associatifs</b>, qui font correspondre des clés avec des valeurs.
</p>
</div>
</div>

<div class="slide">
<h3 class="slideOnly">Les tableaux</h3>
<p>
    Un tableau peut bien entendu contenir des sous-tableaux :

    <?php echo $slidey->highlight('files/01/array2.php'); ?>
</p>
</div>

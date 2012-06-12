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

<div class="slide middleSlide slideOnly blackSlide">
    <h1>PHP</h1>
</div>

<div class="slide">
<?php echo $slidey->part('Présentation du langage'); ?>

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



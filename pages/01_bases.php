<?php $slidey->chapter('Les bases du PHP', 'bases-du-php', 1); ?>

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

<p class="textOnly">
    Ce type peut donc être utilisé à de nombreuses fins et permet de mettre rapidement en place
des données structurées, indexées et facile d'accès.
</p>
</div>

<div class="slide">
<h3>Les structures de contrôles</h3>
<p>
    <b>PHP</b> comporte les structures classiques :

    <?php echo $slidey->highlight('files/01/control.php'); ?>
</p>
</div>

<div class="slide">
<h3>Le switch/case</h3>
<p>
    <b>PHP</b> comporte également le <code>switch()/case</code> :

    <?php echo $slidey->highlight('files/01/switch.php'); ?>
</p>
<p class="textOnly">
    Notons que sans le mot clé <code>break</code> le code continue de s'éxécuter entre deux
cases (comme dans les cas <code>1</code> et <code>2</code> ci-dessus).
</p>
</div>

<div class="slide">
<h3>Break et continue</h3>
<p>
    Il est possible d'utiliser <code>break</code> et <code>continue</code> (qui servent
respectivement à sortir d'une boucle ou à passer à l'élément suivant) :

    <?php echo $slidey->highlight('files/01/break.php'); ?>
</p>
<p class="textOnly">
    Il est aussi possible d'utiliser ces mots clés suivi d'un entier numérique
qui permet de définir de combien de structure imbriqué l'on souhaite sortir ou
passer à l'itération suivante.
</p>
</div>

<div class="slide">
<h3>Itérations avec foreach</h3>
<p>
    Pour faciliter l'itération des tableaux, <b>PHP</b> propose la structure de contrôle
<code>foreach()</code> :

    <?php echo $slidey->highlight('files/01/foreach.php'); ?>
</p>
<p class="textOnly">
    Cette méthode permet de faciliter le parcours dans les tableaux, qui est fastidieux
lorsqu'il emploi une boucle <code>for</code> par exemple. Nous verrons plus tard qu'il est
également possible de créer ses propres objets itérables à l'aide de <code>foreach</code>.
</p>
</div>

<div class="slide">
<h3 class="slideOnly">Itérations avec modification</h3>
<p>
    A l'aide de la notation de référence <code>&amp;</code>, <b>PHP</b> vous permet d'itérer
sur un tableau tout en modifiant la valeur de son contenu :

    <?php echo $slidey->highlight('files/01/foreach2.php'); ?>
</p>
</div>

<div class="slide">
<h3 class="slideOnly">Itérations clé/valeur</h3>
<p>
    En utilisant <code>$key =&gt; $value</code>, nous pouvons itérer sur la clé <b>et</b>
la valeur en même temps :

    <?php echo $slidey->highlight('files/01/foreach3.php'); ?>
</p>
</div>

<div class="slide">
<h3>Fonctions</h3>
<p>
    <b>PHP</b> vous permet de définir des fonctions :

    <?php echo $slidey->highlight('files/01/function.php'); ?>
</p>
<p class="textOnly">
    La fonction suivante prend en paramètre <code>$x</code> et retourne vrai si il est 
pair. Le mot clé <code>return</code> peut être utilisé pour retourner une valeur ou sortir
d'une fonction qui ne retourne pas de valeur. Notons encore l'absence totale de typage,
la fonction <code>isEven()</code> ne fournit aucune indication sur son type de retour
ou de paramètres.
</p>
</div>

<div class="slide">
<h3 class="slideOnly">Fonctions (exemple plus avancé)</h3>
<p>
    Voici un exemple plus avancé qui utilise deux concepts introduits dans <b>PHP 5.3</b> :

    <?php echo $slidey->highlight('files/01/function2.php'); ?>
</p>
<div class="textOnly">
<p>
    Ici, une fonction <b>anonyme</b> est utilisée, elle est passée en paramètre à la fonction
<code>ifIsEven</code> qui peut l'apeller comme une fonction normale via <code>$callback()</code>.
Ce système est extrèmement utile dans le cas de programmation événementielle par exemple, on pourra
manipuler des références de fonctions comme des variables "normales", et les placer dans des tableaux
ou des attributs de classe.
</p>
<p>
    De plus, le type du paramètre <code>$callback</code> est précisé à <b>PHP</b>, c'est ce que l'on
apelle le <b>type hinting</b>, ou indication de type. Ainsi, l'intérpréteur provoquera une erreur dans
le cas ou le paramètre serait du mauvais type, ce qui peut permettre d'éviter les erreurs. Le type utilisé
est <code>Closure</code> et correspond au type des fonctions anonymes.
</p>
</div>
</div>

<div class="slide">
<?php echo $slidey->part('Inclusion de fichiers'); ?>
    <h3>Les fonctions include et require</h3>
<p>
    Il est possible d'inclure un autre fichier dans un script <b>PHP</b>, à l'aide des fonctions <code>include()</code>
et <code>require()</code>, ou leur version assurant l'inclusion unique <code>include_once()</code> et <code>require_once()</code> :

    <?php echo $slidey->highlight('files/01/include.php'); ?>
</p>
<div class="textOnly">
<p>
    Dans le cas de <code>include</code>, si le fichier inclus n'existe pas, seul un warning sera levé par l'interpreteur,
tandis que dans le cas de <code>require</code>, une erreur fatale arrêtera l'exécution du script.
</p>
<p>
    <b>PHP</b> étant interprété, il est possible d'inclure des fichiers dont le nom est connu de manière dynamique,
en faisant attention à la provenance du dit fichier. En effet, le fichier inclus sera évalué par l'interpréteur et 
peut exécuter du code sur la machine qui l'éxécute.
</p>
</div>
</div>

<div class="slide">
    <h3>Quelques constantes utiles</h3>
<p>
    <b>PHP</b> met à notre disposition des <a href="http://fr.php.net/manual/en/language.constants.predefined.php">"constantes
magiques"</a> qui peuvent s'avérer très utile pour l'inclusion :
</p>
<table>
    <tr>
	<th>Nom</th>
	<th>Utilité</th>
    </tr>
    <tr>
	<td class="bold">__DIR__</td>
	<td>Le répértoire du script actuel</td>
    </tr>
    <tr>
	<td class="bold">__FILE__</td>
	<td>Le nom du script actuel</td>
    </tr>
    <tr>
	<td class="bold">__LINE__</td>
	<td>La ligne actuelle dans le script</td>
    </tr>
    <tr>
	<td class="bold">__FUNCTION__</td>
	<td>La fonction actuelle</td>
    </tr>
</table>
</div>

<?php echo $slidey->annex('annex/td1.php'); ?>

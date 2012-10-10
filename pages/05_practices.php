<?php echo $slidey->chapter('Bonnes pratiques', 'bonnes-pratiques', 5); ?>

<div class="slide">
<?php echo $slidey->part('Travailler proprement'); ?>
<h3>Introduction</h3>

<p>
    Le langage <b>PHP</b> peut être très vite maîtrisé. En revanche, l'apprentissage
des méthodes et l'organisation sont plus complexes et primordiales dans l'écriture
d'une application web.
</p>

<p>
    Dans cette partie, nous survolerons un ensemble de bonnes pratiques fortement liées 
au développement d'application <b>PHP</b>.
</p>
</div>

<div class="slide">
<h3>Encodage des caractères</h3>
<p class="textOnly">
    L'encodage utf-8 est actuellement le jeu d'encodage le plus répandu et recommandé,
surtout dans des applications multilingues.
 L'encodage des caractères doit être uniformisé dès le début, car il concerne autant les 
pages webs que le contenu de la base de données, et qu'une mauvaise gestion peut vite se
conclure par des problèmes d'affichages.
</p>
<p class="textOnly">
    Les développeurs qui travaillent sur un projet doivent s'assurer que leur encodage
est similaire, et spécifier cet encodage dans la balise <code>meta</code> des pages HTML&nbsp;:
</p>

<?php echo $slidey->highlight('files/05/utf.php', 'html5'); ?>

<p class="textOnly">
    Notez que dans le cas d'une requête ajax, l'encodage des caractères n'est pas précisé
car la page HTML peut être partielle. Dans ce cas là, il est possible de le préciser dans 
les en-têtes HTTP&nbsp;:
</p>

<hr class="slideOnly" />
<?php echo $slidey->highlight('files/05/encoding.php', 'html'); ?>
</div>

<div class="slide">
<h3>Echappement</h3>

<img style="float:right" src="<?php echo $slidey->image('img/magicQuotes.gif')->jpeg(); ?>" />

<p class="textOnly">
    Pendant longtemps, <b>PHP</b> a comprit une option très controversée nommée 
les <em>magic quotes</em>. Ce système échappait automatiquement les données qui parvenaient
à l'application web concernée (en ajoutant des \ devant les "). 
</p>
<p class="textOnly">
    Mécanisme souvent à l'origine de problèmes qui se traduisent par l'apparition de \
involontaires, ce système se voulait protecteur contre les failles liées notamment aux
injections SQL. Aujourd'hui, il est obselète et désactivé par défaut, il est fortement
conseillé de le désactiver (php.ini)&nbsp;:
</p>

<?php echo $slidey->highlight('files/05/quotes.php', 'ini'); ?>
</div>

<div class="slide">
<h3>Tests unitaires</h3>
<p class="textOnly">
    Entre autre grâce à <a href="http://www.phpunit.de/manual/current/en/">PHPUnit</a>,
il est très facile d'écrire des tests unitaires en <b>PHP</b>, ce qui permet&nbsp;:
</p>
<ul>
    <li class="discover">Assurer la non-regréssion d'un projet</li>
    <li class="discover">Empêcher les bugs de se reproduire</li>
    <li class="discover">Disposer d'un jeu de tests convaicant</li>
    <li class="discover">Tester l'environement d'une application (avant un déploiement en production par exemple)</li>
    <li class="discover">Sécuriser le développement en équipe</li>
    <li class="discover">Eprouver la robustesse de l'application</li>
</ul>
<p class="discover">
    Il est pour cela important de disposer de code <b>découpé en composants</b>. Ecrire les tests
pendant (voire avant) le développement est une bonne chose.
</p>
</div>

<div class="slide">
<h3 class="slideOnly">Tests unitaires: exemple</h3>
<p class="textOnly">
    Voici un exemple de test écrit avec PHPUnit&nbsp;:
</p>

<?php echo $slidey->highlight('files/05/test.php'); ?>
</div>

<div class="slide">
<h3 class="slideOnly">Tests unitaires: exécution</h3>
<p class="textOnly">
    Pour l'exécuter, simplement lancer <code>phpunit</code>&nbsp;:
</p>

<?php echo $slidey->highlight('files/05/phpunit.php', 'html'); ?>
</div>

<div class="slide">
<h3>Serveur d'intégration</h3>
<p>
    Un serveur d'intégration est une application généralement couplée au système de versionnement
(tels que <em>git</em> ou <em>svn</em>), et qui vérifie continuellement que les tests unitaires
et standards de codages sont respectés.
</p>
<p>
    Il permet de provoquer des alertes dans le cas d'une mauvaise manipulation et de sensibiliser
une équipe de développeurs à la fragilité de l'application.
</p>
</div>

<div class="slide">
<?php echo $slidey->part('Les performances'); ?>
<h3>Contexte</h3>
<p>
    N'oubliez pas que <b>PHP</b> est un langage interprété. Son utilisation doit donc
se limiter à des tâches de gestion. Il ne peut pas être utilisé pour faire du calcul
très rapide par exemple.
</p>
<p>
    <b>PHP</b> offre la possibilité d'écrire des extensions en C et de créer un <em>binding</em>,
ou association entre le C et le <b>PHP</b>, cette option est vivement recommandée en cas
d'application à haute performance impliquant du calcul gourmand.
</p>
<p>
    La plupart des fonctions et bibliothèques standard bénéficient d'ailleurs d'une bonne
rapidité car sont écrites en C.
</p>
</div>

<div class="slide">
<h3>APC</h3>
<p>
    <b>APC</b> est un mécanisme de mise en cache du bytecode <b>PHP</b>.<span class="textOnly">
En clair, il permet d'éviter au serveur de relire et de ré-analyser le code source d'une application
à chaque requête en gardant un version condensée du script en mémoire.
</span>.
</p>
<p>
    Il est vivement conseillé d'utiliser <b>APC</b>, qui sera bientôt natif dans <b>PHP</b>, et qui
en augmente les performances quasi systématiquement sans surcoût de développement.
</p>
<p>
    Sous linux, il peut être installé via le paquet <code>php-apc</code>.
</p>
<p>
    <b>APC</b> offre également d'autre possibilités tels que le stockage de valeurs en cache (voir
ci-dessous).
</p>
</div>

<div class="slide">
<h3>Utilisation de cache</h3>
<p class="textOnly">
    Certaines opérations sont effectuées de manière réccurente (accès à la base de données,
à des fichiers, calculs etc.). Au lieu d'être recalculées à chaque fois, des données peuvent
être mises en cache à l'aide de mécanismes tels que <a href="http://php.net/apc">APC</a>
ou <a href="http://php.net/memcache">Memcache</a>. 
</p>
<p class="textOnly">
    Ces systèmes offrent un magasin de clé/valeur stocké directement dans la RAM, et disposant
d'un temps d'accès extrêmement faible. Ainsi, il est par exemple possible de stocker une valeur
et d'y accéder plus tard. Cependant, ce stockage est totalement volatile et nous ne sommes pas
sûr de pouvoir récupérer notre valeur (il ne s'agit que de cache). Aussi, il est important de
faire attention aux inconsistences que ces systèmes peuvent provoquer, les données n'étant
plus récupérées depuis la base de données par exemple. Voici un exemple d'utilisation du
magasin <b>APC</b>&nbsp;:
</p>

<?php echo $slidey->highlight('files/05/cache.php'); ?>
</div>

<div class="slide">
<?php echo $slidey->part('Sécurité'); ?>
<h3>HTTPS</h3>
</div>

<div class="slide">
<h3>Upload de fichiers</h3>
</div>

<div class="slide">
<h3>Atention à l'inclusion</h3>
</div>

<div class="slide">
<h3>Failles XSS</h3>
</div>

<div class="slide">
<h3>Failles CSRF</h3>
</div>

<div class="slide">
<h3>Injection SQL</h3>
</div>

<div class="slide">
<h3>Hachage des mots de passes</h3>
</div>




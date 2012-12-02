<?php echo $slidey->chapter('TD3', 'td3'); ?>

<h2>Préparation</h2>
<p>
    Vous trouverez l'ensemble du code de ce TD dans <a href="files/td3.zip">td3.zip</a>.
Vous aurez besoin de déployer son contenu sur un espace web disposant de l'intérpréteur
<b>PHP</b>. 
</p>

<?php echo $slidey->part('Exercice 1 : une arène'); ?>

Lisez et déployez le code du dossier <code>arena/</code>.
Pensez à créer un répértoire <code>data</code> avec les droits en écriture 
(<code>chmod 777 data</code> par exemple).

<h3>Compréhension</h3>
<p>
    Tout d'abord, testez et lisez le code source.
</p>

<?php $n = 1; ?>

<p>
    <b><?php echo $n++; ?>. Persistence</b><br />
    Comment les données du combat sont t-elles persistées d'une requête sur l'autre ?<br />
    Quels sont les avantages/défauts de cette technique ?
</p>

<p>
    <b><?php echo $n++; ?>. Opérateur ?:</b><br />
    Remarquez l'utilisation de l'opérateur <code>?:</code>, à quoi sert t-il ?
</p>

<p>
    <b><?php echo $n++; ?>. Chargement des classes</b><br />
    Remarquez que les fichiers des classes (comme <code>Arena\Creature\Elf.php</code>)
ne sont jamais inclus nulle part explicitement.<br />
    En lisant le code et en regardant notamment la documentation de 
<a href="http://fr2.php.net/manual/fr/function.spl-autoload-register.php">
spl_autoload_register()</a>, découvrez comment l'inclusion est faite.<br />
    <br />
    Ce système permet de bénéficier d'une grande souplesse lors de l'écriture de code 
et d'éviter beaucoup de problèmes tout en bénéficiant d'une inclusion "fainéante", c'est
à dire uniquement des classes utilisées dans l'application.
</p>

<h3>Quelques modifications</h3>

<?php $n = 1; ?>

<p>
    <b><?php echo $n++; ?>. Ajout de la description des attaques</b><br />
    Ajouter une description aux attaques à l'aide d'une méthode <code>getDescription()</code> que
vous surchargerez dans chaque classe. La description devra être visible à coté des
actions réalisables.
</p>

<p>
    <b><?php echo $n++; ?>. Ajout d'une créature</b><br />
    En vous inspirant des créatures déjà existantes, ajoutez une créature <code>Vampire</code>
disposant des attaques <code>Tackle</code> et <code>Vampirism</code>.
</p>
<p>
    Pour tester, vous pourrez alors changer l'initialisation du combat (cf <code>createFight</code>
dans <code>controller.php</code>) pour remplacer un des combattant par un vampire.
</p>

<h3>Incorporation d'un logger</h3>

<p>
    Comme vous pourrez l'observer, les attaques sont actuellement muettes, nous aimerions pouvoir
logger ce qu'elles font afin d'afficher un message explicitant ce qui s'est passé. Pour cela, modifiez
le code de <code>Fight</code> pour qu'il puisse accepter un logger comme cela&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/logger.php'); ?>

<p>
    Par la suite, chaque attaque pourra retourner une chaîne décrivant le mouvement (vous êtes libres
d'ajouter quelques règles) qui sera loggée par le fighter. Modifier alors la page en utilisant la 
méthode <code>getEntries()</code> sur le logger pour afficher l'ensemble des actions effectuées.
</p>

<p>
    Attention, votre logger ne doit pas être sérialisé ! Il faudra pour cela utiliser la méthode magique
<code><a href="http://php.net/__sleep">__sleep()</a></code> de <b>PHP</b>
</p>

<?php echo $slidey->part('Exercice 2 : Le routeur'); ?>

Un routeur est un composant clé dans une application web, car il est responsable de l'attribution
des requêtes à une certaine méthode (ou contrôlleur. Lisez le code contenu dans le dossier <code>router/</code>.

<h3>Compréhension</h3>

<?php $n = 1; ?>

<b><?php echo $n++; ?>. PATH_INFO</b><br />
<p>
    A l'aide de la page de documentation de la variable <a href="http://php.net/_SERVER">$_SERVER</a>,
comprenez ce qu'est le <code>PATH_INFO</code> et comment il fonctionne.
</p>

<b><?php echo $n++; ?>. Arguments</b><br />
<p>
    A quoi sert le <code>\</code> devant <code>\Closure</code> ? Indice : enlevez le et observez les
erreurs.
</p>

<b><?php echo $n++; ?>. $$</b><br />
<p>
    Observez de plus près la méthode <code>render()</code>, à quoi sert la notation <code>$$</code> ?
</p>

<b><?php echo $n++; ?>. call_user_func_array</b><br />
<p>
    Dans <code>Rule.php</code>, la méthode <code>call_user_func_array()</code> est utilisée, lisez sa documentation
pour en comprendre le fonctionnement.
</p>

<h3>Intégration</h3>

<p>
    Créez un nouveau dossier en copiant <code>arena/</code> et incluez y le routeur pour effectuer les
actions au lieu d'utiliser les paramètres <code>GET</code>.
</p>

<p>
    <em>Note: il ne vous est pas demandé d'utiliser des templates, mais uniquement de mettre en place
le routeur dans le code de l'exercice précédent, cette intégration peut en fait être réalisée en quelques
minutes.</em>
</p>

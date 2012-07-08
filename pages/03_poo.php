<?php echo $slidey->chapter('Programation orientée objet', 'programation-orientee-objet', 3); ?>

<div class="slide">
<?php echo $slidey->part('Présentation'); ?>
<h3>Pourquoi faire de l'objet ?</h3>

<p class="textOnly">
    L'objet est un paradigme de programmation très répandu et qui a fait ses preuves dans de
nombreux projets. Son utilisation n'apporte pas de fonctionnalités au langage, c'est à dire
que tout ce que l'on peut faire en utilisant la pogramation orientée objet peut être fait
sans, cependant l'objet apporte beaucoup de choses en <b>simplicité de compréhension</b>,
<b>maintenance</b>, <b>factorisation et découpage de code</b>, <b>travail collaboratif</b>
ou encore en <b>conception</b>. Toutes ces qualité font de l'objet un mécanisme indispensable
à maîtriser pour tout développeur <b>PHP</b>.
</p>

<ul class="slideOnly">
    <li class="discover">Simplicité de compréhension</li>
    <li class="discover">Maintenance</li>
    <li class="discover">Factorisation et découpage de code</li>
    <li class="discover">Travail collaboratif</li>
    <li class="discover">Conception</li>
</ul>

<p class="textOnly">
    Presque toutes les bibliothèques et frameworks que vous serez amenés à utiliser se basent 
sur le paradigme objet.
</p>

</div>

<div class="slide">
<h3>Classes et instanciation</h3>

<p class="textOnly">
    En <b>PHP</b>, voici à quoi ressemble une classe :
</p>

<?php echo $slidey->highlight('files/03/class.php'); ?>

<p class="textOnly">
    Remarquez que&nbsp;:
</p>

<ul class="textOnly">
    <li>Les attributs peuvent être <b>initialisés</b> directement dans leur définition</li>
    <li>Les <b>modifieurs</b> <code>private</code>, <code>protected</code> et <code>public</code> sont présents,
comme dans beaucoup d'autre langages</li>
    <li>Le <b>constructeur</b> se définit à l'aide de la fonction magique <code>__construct()</code></li>
    <li>Les <b>attributs et méthodes</b> de classes sont accessibles par l'opérateur <code>-&gt;</code>, le point
étant réservé pour la concaténation de chaines</li>
</ul>

<p class="textOnly">
    Un objet de cette classe s'instanciera alors de la manière suivante&nbsp;:
</p>

<div class="discover">
    <hr class="slideOnly" />

    <?php echo $slidey->highlight('files/03/instance.php'); ?>
</div>
</div>

<div class="slide">
<h3>Méthodes et attributs statiques</h3>

<p>
    En <b>PHP</b>, il est possible de rendre des méthodes et des attributs statiques à l'aide du modifieur 
<code>static</code>&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/static.php'); ?>

<p class="textOnly">
    Les attributs et méthodes statiques ne sont pas spécifiques à une instance mais <b>globaux</b>.
Dans l'exemple ci-dessus, l'attribut <code>$counter</code> n'est pas répété dans <code>$a</code>
et dans <code>$b</code> mais n'est présent qu'une seule fois, ce qui explique que les valeurs 
sont différentes.
</p>

</div>

<div class="slide">
<h3>Héritage</h3>

<p>
    L'héritage s'écrit avec "<code>extends</code> (classe mère)"&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/extends.php'); ?>

</div>

<div class="slide">
<h3 class="slideOnly">Classe mère</h3>
<p class="textOnly">
    L'accès aux méthodes et aux attributs de la classe mère peut se faire à l'aide du mot clé
<code>parent</code>&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/parent.php'); ?>
</div>

<div class="slide">
<h3>Interfaces</h3>
<p class="textOnly">
    En <b>PHP</b>, les interfaces se déclarent comme une classe à l'aide du mot clé <code>interface</code>,
elles ne contiennent que des prototypes de méthodes. Une classe peut implémenter une interface avec
la notation "<code>implements</code> (interface)"&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/interface.php'); ?>

</div>

<div class="slide">
<h3>Remarques</h3>
<p class="textOnly">
    <b>PHP</b> ne supporte pas le polymorphisme, méthodes ayant le même nom mais des prototypes
différents, vous pouvez cependant utiliser des paramètres optionnels et non typés
</p>
<p class="textOnly">
    Il n'y a pas d'héritage multiple en <b>PHP</b>
</p>

<ul class="slideOnly">
    <li>Pas de <b>polymorphisme</b> possible, mais les arguments peuvent être optionnels et non typés</li>
    <li>Pas d'héritage multiple</li>
</ul>

</div>

<div class="slide">
<?php echo $slidey->part('Problèmes fréquents'); ?>
<h3>Références</h3>
<p class="textOnly">
    Lorsque l'on passe un objet en argument d'une fonction, on ne passe pas une copie de cette objet
mais une référence vers l'objet (à ne pas confondre avec une référence vers la variable qui décrit l'objet).
Ainsi, toute modification se fera directement sur l'objet&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/reference.php'); ?>
</div>

<div class="slide">
<h3 class="slideOnly">Attention aux références</h3>
<p class="textOnly">
    Attention à ne pas confondre référence vers un objet et référence entre les variables, regardons
l'exemple suivant&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/reference2.php'); ?>

<p class="textOnly">
    Dans ce cas, la ligne <code>$b = $a</code> fait en sorte que la variable <code>$b</code> référence
le même objet que <code>$a</code>. Ainsi la modification de l'attribut sur <code>$b-&gt;attr</code> est aussi
visible sur <code>$a-&gt;attr</code>. En revanche, la variable <code>$b</code> est bien <b>différente</b>
de <code>$a</code>, c'est pourquoi l'affecter à <code>null</code> ne change nullement la valeur de <code>$a</code>;
En revanche, l'utilisation de l'opérateur de référence <code>&amp;</code> pour créer la variable <code>$c</code>
fait en sorte que <code>$c</code> soit un <b>alias</b> de <code>$a</code>, il référencera alors non pas seulement
le même objet mais aussi la <b>même variable</b>.
</p>
</div>

<div class="slide">
<h3>Clonage</h3>
<p class="textOnly">
    Si vous souhaitez créer une <b>copie</b> d'un objet, vous pouvez utiliser le mécanisme de
<b>clonage</b> de cet objet. <b>PHP</b> vous propose pour cela d'utiliser le mot clé <code>clone</code>. 
</p>

<?php echo $slidey->highlight('files/03/clone.php'); ?>

</div>

<div class="slide">
<h3 class="slideOnly">Clonage personnalisé</h3>
<p class="textOnly">
    Son comportement peut cependant être non trivial et soulève souvent des questions&nbsp;: Faut t-il 
cloner également les objets référencés&nbsp;? Est-ce que toute les propriétés doivent être clonées&nbsp;?
Pour répondre à ces questions, il vous est possible d'écrire votre propre méthode de clonage, avec 
le nom "magique" <code>__clone()</code>&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/__clone.php'); ?>

</div>

<div class="slide">
<h3>Substitution</h3>

<p class="textOnly">
    <b>PHP</b> étant interprété, les types ne sont connus qu'au moment de l'execution.
Ainsi, lorsque vous écrivez une méthode, les paramètres ne sont pas typés. Cela peut 
s'avérer pratique pour la substitution, mais aussi provoquer des problèmes très innatendus&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/subst.php'); ?>

</div>

<div class="slide">
<h3 class="slideOnly">Type hinting</h3>
<p class="textOnly">
    Depuis <b>PHP 5.3</b>, un mécanisme permet d'éviter ce genre d'erreur fréquente (passage
d'argument du mauvais type), il s'agit du <em>type hinting</em> (ou indication de type)&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/hint.php'); ?>

<p class="textOnly">
    Le type indiqué dans les paramètres de la fonction peut être le type de la classe mère ou
d'une interface qui doit être implémentée par l'objet passé. Il est fortement recommandé
de mettre une indication de type le plus souvent possible dans vos prototype de fonctions
et de méthodes afin d'éviter les erreurs obscures qui peuvent survenir lors du passage d'un
objet du mauvais type.
</p>

</div>

<div class="slide">
<h3>Espaces de nom</h3>
<p class="textOnly">
    Souvent, la création de classes et d'interface engendre un problème de nommage, car il 
peut devenir difficile d'éviter les problèmes de collisions de noms (deux classes ayant le
même nom). Depuis <b>PHP 5.3</b>, il est possible d'utiliser des espaces de nom (ou 
<code>namespace</code>) pour éviter ce problème.
</p>

<p>
    Par exemple, si le fichier <code>alice/image.php</code> contient&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/alice/image.php'); ?>

<p>
    On pourra l'utiliser comme cela&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/use.php'); ?>

<p class="textOnly">
    Ainsi, la classe de Alice ne "pollue" pas l'espace de nom global mais est disponible 
sous <code>Alice\Image</code>, si quelqu'un d'autre souhaite écrire un classe de gestion
d'images, il pourra le faire en utilisant un autre espace de nom.
</p>

</div>

<div class="slide">
<h3 class="slideOnly">Multiples classes de même nom</h3>
<p class="textOnly">
    Si Bob écrit à son tour une classe <code>Image</code> et la place sous l'espace de
noms <code>Bob\Image</code>, il sera possible d'utiliser les deux soit à l'aide de la
déclaration entière du nom des classes&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/both.php'); ?>

<p class="textOnly">
    Ou encore à l'aide des alias&nbsp;:
</p>

<div class="discover">
<hr class="slideOnly" />

<?php echo $slidey->highlight('files/03/alias.php'); ?>
</div>

</div>

<div class="slide">
<?php echo $slidey->part('Pour aller plus loin'); ?>
<h3>Sérialisation</h3>
<p class="textOnly">
    Contrairement aux types "basiques" (nombres, chaînes, tableaux...), les objets peuvent
s'avérer complexes à représenter sous forme de chaîne de caractère pour être sauvegardé dans
un fichier, un cookie ou encore une variable de session par exemple. Pour cela, vous pouvez
utiliser la <b>sérialisation</b>. Les fonctions <b>PHP</b> <a href="http://php.net/serialize">
<code>serialize()</code></a> et <a href="http://php.net/unserialize"><code>unserialize()</code>
</a> permettent de représenter un objet sous forme de chaîne de caractères et, inversement,
d'obtenir un objet à partir d'une chaîne sérialisée&nbsp;:
</p>

<?php echo $slidey->highlight('files/03/serialize.php'); ?>
</div>

<div class="slide">
<h3>Les méthodes magiques</h3>

<p class="textOnly">
    Il existe en <b>PHP</b> des <a href="http://fr.php.net/manual/en/language.oop5.magic.php">
méthodes dites "<em>magiques</em>"</a>. Ces dernières peuvent par exemple permettre de
surcharger l'accès à un attribut même s'il n'existe pas&nbsp;:
</p>

<table>
    <tr>
	<th>Nom</th>
	<th>Utilité</th>
    </tr>
    <tr>
	<td class="bold">__get($name)</td>
	<td>Apellé lors de l'accès en lecture à un attribut non-existant</td>
    </tr>
    <tr>
	<td class="bold">__set($name, $value)</td>
	<td>Apellé lors de l'accès en écriture à un attribut non-existant</td>
    </tr>
    <tr>
	<td class="bold">__call($method, $args)</td>
	<td>Apellé lors de l'appel à une méthode non-existante</td>
    </tr>
</table>


</div>


<?php echo $slidey->chapter('TD2', 'td2'); ?>

<p>
    Dans ce TD, nous allons travailler avec <b>PHP</b> et un serveur web qui nous permettra
de faire la "paserelle" entre les données <b>HTTP</b> et <b>PHP</b>.
</p>

<p>
    Avant de commencer, vous pouvez installer un serveur sur une machine personelle. Sous Debian/Ubuntu,
vous pouvez installer les paquets <code>apache2</code>  et <code>libapache2-mod-php5</code>.
    Sous Windows, il est préférable d'utiliser un outil tel que <b>WAMP</b>, que vous pourrez trouver
sur le site <a href="http://www.wampserver.com/">wampserver.com</a>.
</p>

<p>
    Les fichiers relatifs à ce TD sont disponibles dans l'archive <a href="files/td2.zip">td2.zip</a>.
</p>


<?php echo $slidey->part('Exercice 1 : Les commodités de PHP'); ?>

<p>
    Comme vu en dans le chapitre HTTP, les variables GET sont passées en paramètre d'une page comme ceci:
</p>

<p>
<code>
    http://www.domain.com/path/to/resource.php?<b>a=1337&amp;b=42</b>
</code>
</p>

<p>
    Ces variables peuvent être récupérées à l'aide du tableau <code>$_GET</code>.
</p>

<?php $n = 1; ?>

<p>
    <b><?php echo $n++; ?>. Factorisation</b><br />

    Examniez le code fournit dans le dossier <code>exercice1/</code>, il est constitué de plusieurs pages HTML, ce qui est problématique,
car le code des en-têtes contenant le style et le menu est à chaque fois recopié&nbsp;! A l'aide de PHP, créez une unique page web
qui contiendra toutes ces pages.</b><br /><br />

    Vous pourrez utiliser les variables GET pour que le contenu de la page soit modifié en fonction du paramètre passé
dans l'URL.
</p>

<p>
    <b><?php echo $n++; ?>. Evolution</b><br />

    Rajouter des pages à ce site pourrait devenir pénible, car la page principale <b>PHP</b> que vous avez créé va grossir et grossir.
Quelle(s) solution(s) pourrait t-on utiliser pour pouvoir utiliser plusieurs fichiers tout en évitant la duplication de code&nbsp;? Appliquez
et testez votre idée sur cet exemple. Apellez votre encadrant pour qu'il vérifie votre code.
</p>

<?php echo $slidey->part('Exercice 2 : Les formulaires'); ?>

<p>
    Les formulaires représentent une très grande partie du développement d'un site web. 
</p>

<?php $n = 1; ?>

<p>
    <b><?php echo $n++; ?>. Compréhension</b>

    Lisez et testez le script <code>exercice2/form.php</code> de l'archive. Comment est detecté le fait que des données ont été
postées ? A quoi correspond ce test vis à vis du protocole HTTP ? Pourquoi la fonction <a href="http://php.net/htmlspcialchars">
<code>htmlspecialchars()</code></a> est utilisée ici ?
</p>

<p>
    <b><?php echo $n++; ?>. Ajout d'un champ</b><br />

    Ajoutez un champ <code>nom</code> au formulaire. Lorsque le formulaire est soumis, si les deux champs sont remplis,
la page devra indiquer: <code>"Vous vous nommez [Prénom] [Nom]"</code>.
</p>

<p>
    <b><?php echo $n++; ?>. Un peu de validation</b><br />

    Ajoutez maintenant un champ <code>email</code>. N'oubliez surtout pas comment fonctionne le protocole <b>HTTP</b>, même en
utilisant le type de champ HTML5 <code>email</code>, le client pourra toujours transmettre des données arbitraires via une
requête <code>POST</code>. C'est pour cela qu'il <u>faut impérativement</u> vérifier coté serveur que l'adresse fournie est
bien formée, vous pourrez utiliser la fonction <b>PHP</b> <a href="http://php.net/filter_var"><code>filter_var()</code></a>.
</p>

<?php echo $slidey->part('Exercice 3 : Sécurisation'); ?>

<p>
    Le dossier <code>exercice3/</code> contient une page web dont l'accès devrait être sécurisé. A l'aide d'un formulaire et
des sessions <b>PHP</b>, sécurisez l'accès à la page pour que les utilisateurs présents dans le fichier <code>users.php</code>
puissent s'idientifier avec leurs mots de passe. Pour inclure <code>users.php</code>, vous pourrez utiliser la notation&nbsp;:
</p>

<?php echo $slidey->highlight('files/02/include_return.php'); ?>

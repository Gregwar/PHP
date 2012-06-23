<?php echo $slidey->chapter('HTTP', 'http', 2); ?>

<div class="slide">
<?php echo $slidey->part('Introduction au protocole HTTP'); ?>

<h3>HTTP</h3>

<p>
    Lorsque vous naviguez sur internet, vous utilisez un <b>navigateur</b> qui
agit en fait comme un <b>client HTTP (HyperText Transfer Protocol)</b>. Ce protocole
permet d'accéder à des resources distantes.
</p>
<p class="center">
    <img src="<?php echo $slidey->image('img/browsers.jpg')
                ->resize(500); ?>" />
</p>
</div>

<div class="slide">
<h3 class="slideOnly">Serveur HTTP</h3>

<p>
    De l'autre coté, des serveurs <b>HTTP</b> (ou serveurs web) sont à l'écoute
permanente de requêtes et répondent à leurs clients. On nommera par exemple <b>Apache</b>,
<b>Nginx</b> ou <b>Lighttpd</b>
</p>

<p class="center">
    <img src="<?php echo $slidey->image('img/apache.png')
                        ->resize(250); ?>" />
    <img src="<?php echo $slidey->image('img/nginx.gif')
                        ->resize(250); ?>" />
    <img src="<?php echo $slidey->image('img/lighttpd.png')
                        ->resize(250); ?>" />
</p>

</div>

<div class="slide">
<h3>URL</h3>
<p class="textOnly">
    Une resource peut être désignée par une adresse, que l'on nomme <b>URL (Unified
Resource Location)</b>, ou <b>URI (Unified Resource Identifier)</b>. Cette <b>URL</b>
est de la forme :
</p>
<p class="important">
       <b>http://www.domain.com/path/to/resource.htm</b>
</p>
<p>
    Ou :
    <ul>
        <li><b>http</b> est le protocole utilisé</li>
        <li><b>www.domain.com</b> est le nom d'hôte</li>
        <li><b>path/to/resource.htm</b> est la resource demandée</li>
    </ul>
</p>

</div>

<div class="slide">
<h3 class="textOnly">Processus HTTP</h3>
<h3 class="slideOnly">Requête HTTP</h3>
<p class="textOnly">
    Lors de l'accès à une page web, le navigateur effectue plusieurs opérations, il
résoud le nom d'hôte et ouvre une connexion avec le serveur web. Il utilise pour cela
le protocole <b>HTTP</b> basé sur la couche <b>TCP/IP</b> de la machine.
</p>
<p class="textOnly">
    Il envoie ensuite une <b>requête HTTP</b>, qui est constituée d'un ensemble d'en-têtes
et éventuellement de données pouvant contenir :
</p>
<p class="slideOnly">
    Une <b>requête HTTP</b> formée par un navigateur ou client peut contenir :
</p>
<ul>
    <li>Le nom de la resource demandée</li>
    <li>Le nom d'hôte du serveur</li>
    <li>Les cookies</li>
    <li>Des informations supplémentaires sur le client, l'heure locale, les langues et formats acceptés etc.</li>
    <li>Eventuellement des données (e.x: formulaires, envoi de fichier etc.)</li>
</ul>

</div>

<div class="slide">
<h3 class="slideOnly">Réponse HTTP</h3>
<p class="textOnly">
    Le serveur utilise alors les éléments fournis par le client pour tenter de localiser
la resource demandée et lui répond en lui transférant sous une forme très ressemblante
des en-têtes et éventuellement des données :
</p>
<p class="slideOnly">
    Une <b>réponse HTTP</b> formée par un serveur peut contenir :
</p>
<ul>
    <li>Un code de réponse (200, 404, 403, 302...)</li>
    <li>Des définitions de cookies</li>
    <li>Un type de contenu (html, jpeg, css ...)</li>
    <li>Eventuellement des données</li>
    <li>Des informations supplémentaires sur le serveur, le mode de connexion, etc.</li>
</ul>
</div>

<div class="slide">
<h3 class="slideOnly">Exemple</h3>
<p class="textOnly">
    Voici un exemple de <b>requête/réponse HTTP</b>, les lignes préfixées par <code>&gt;</code>
sont les messages envoyés par le client et celles préfixées par <code>&lt;</code> sont celles
reçues :
</p>
<?php echo $slidey->highlight('files/02/http.txt', 'html'); ?>
<p class="textOnly">
    Ce protocole est très simple et lisible par un humain. Il est très important d'avoir connaissance
de <b>HTTP</b> pour développer une application web. Certain plugins (Firebug, HTTPFox, Tamper data...)
permettent de visualiser les échanges et/ou de faire des statistiques sur le trafic.
</p>
<p class="slideOnly">
    <ul>
        <li class="discover">Protocole <b>très simple</b>, lisible par un humain.</li>
        <li class="discover">Important à connaître pour <b>comprendre ce que l'on développe</b>.</li>
        <li class="discover">Utilisation de plugins tels que <b>Firebug</b> ou <b>HTTPFox</b> recommandée.</li>
    </ul>
</p>
</div>

<div class="slide">
<?php echo $slidey->part('CGI'); ?>
<h3 class="slideOnly">Présentation</h3>

<p class="textOnly">
    Le principe du <b>CGI (Common Gateway Interface)</b> est d'ajouter une fonctionnalité à un serveur web afin qu'il exécute
un programme au lieu de simplement transférer une resource statique.
</p>

<p class="slideOnly">
    <b>CGI: Common Gateway Interface</b>
</p>

<p class="textOnly">
    De la même manière que vous avez exécuté <b>PHP</b> en ligne de commande, le "binding" <b>CGI</b>
permettra d'éxécuter <b>PHP</b> au moment ou une resource est demmandée par un client. Ainsi, le code
que vous aurez écrit sera exécuté et pourra accéder lui même à un ensemble de resource pour rendre
le contenu de la page dynamique, c'est à dire différent selon l'utilisateur, la base de données etc.
</p>

<p class="center">
    <img src="<?php echo $slidey->image('img/cgi.gif')->forceResize(900); ?>" />
</p>
</div>

<div class="slide">
<h3 class="slideOnly">Résumé</h3>
<p>
    La "passerelle" <b>CGI</b> va alors exécuter un programme ou un script <b>sur le serveur</b> en
lui passant les données liées à la requêtes.
</p>
<p class="discover">
    Ce programme pourra alors intéragir avec les en-têtes <b>HTTP</b> qui seront envoyées en réponse
ainsi que sur le contenu de la réponse.
</p>
<p class="discover">
    Dans le cas de <b>PHP</b>, l'intérpréteur sera executé sur le script demandé.
</p>
</div>

<div class="slide">
<?php echo $slidey->part('PHP et HTTP'); ?>
<h3>Fonctionnement</h3>
<p>
    En général, les scripts php sont identifiés par leur extension <code>.php</code>. Lorsque
le serveur web se voit demander un fichier de ce type, il exécute l'interpréteur au lieu de
transmettre son contenu vers le client.
</p>
<p>
    Dans le cas d'Apache, le paquet <code>libapache2-mod-php5</code> contient la passerelle
Apache/PHP:
</p>
<?php echo $slidey->highlight('files/02/mod.txt', 'html'); ?>
</div>

<div class="slide">
<h3 class="slideOnly">Exemple</h3>
<p>
    Par exemple, si le fichier <code>date.php</code> se trouve sur le serveur web et contient
le script suivant :
</p>

<?php echo $slidey->highlight('files/02/date.php'); ?>

<div class="discover">
<p>
    Lorsque le client demandera la resource <code>/date.php</code>, si le serveur est équipé
du mod <b>PHP</b>, il recevra une réponse du style :
</p>

<?php echo $slidey->highlight('files/02/date.html'); ?>

</div>

<p class="discover">
    Toute sortie standard sera automatiquement envoyée en tant que données de la réponse <b>HTTP</b>.
</p>

<p class="textOnly">
    Notez ici tout l'interêt de pouvoir ouvrir et fermer les balises <code>&lt;?php ?&gt;</code>, cela vous permet
alors d'utiliser <b>PHP</b> uniquement aux emplacements dynamique de votre page web et de rédiger le reste
normalement.
</p>
</div>

<div class="slide">
<h3>Variables superglobales</h3>

<p>
    La paserelle <b>PHP</b> met à votre disposition des variables spéciales nommées <a href="http://php.net/superglobals">
superglobales</a>. Elles contiennent des informations sur la requête en cours :
</p>
<ul>
    <li class="discover"><code>$_SERVER</code>: Contient les informations sur la requête <b>HTTP</b></li>
    <li class="discover"><code>$_GET</code>: Variables GET</li>
    <li class="discover"><code>$_POST</code>: Variables POST</li>
    <li class="discover"><code>$_COOKIES</code>: Cookies définis</li>
    <li class="discover"><code>$_SESSION</code>: Données de la session</li>
</li>
</div>

<div class="slide">
<h3 class="slideOnly">Attention à la sécurité</h3>
<p class="warning">
    <b>Attention:</b> Les valeurs de ces variables sont, pour la plupart, fournies par l'utilisateur,
on ne peut donc pas compter sur leur présence, leur format ou leur valeur d'un point de vue sécurité.
</p>
</div>

<div class="slide">
<h3>Données GET</h3>

<p class="textOnly">
    Les données "GET" sont des paramètres passées à la page. Il s'agit d'une manière de 
transmettre une petite quantité d'informations directement dans une <b>URL</b> :
</p>

<p class="important">
    http://monsite.com/page.php?<u>x=42&amp;y=1337</u>
</p>

<p class="textOnly">
    Depuis le code source <b>PHP</b>, ces variables seront accessibles directement dans le
tableau <code>$_GET</code> :
</p>

<?php echo $slidey->highlight('files/02/get.php'); ?>

<p>
    <code>x=42&amp;y=1337</code> est ce que l'on apelle une <em>Query String</em></code>
</p>

</div>



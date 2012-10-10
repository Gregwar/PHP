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
    <li>La méthode, le nom de la resource demandée et la version du protocole</li>
    <li>
        Des en-têtes pouvant contenir :
        <ul>
            <li>Le nom d'hôte du serveur</li>
            <li>Les cookies</li>
            <li>Des informations sur le navigateur</li>
            <li>Les langues et formats acceptés</li>
            <li>Le type et contenu des données (si présentes)</li>
            <li>etc.</li>
        </ul>
    </li>
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
    <li>Un code de réponse (200, 404, 403, 302...) et la version du protocole</li>
    <li>
        Des en-têtes pouvant inclure :
        <ul>
            <li>Des définition de cookies</li>
            <li>Un type et une taille de contenue</li>
            <li>Des informations sur le serveur, le type de connexion</li>
            <li>etc.</li>
        </ul>
    </li>
    <li>Eventuellement des données</li>
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
<h3 class="slideOnly">Exemple de structure</h3>

<p class="textOnly">
    Il est par exemple parfaitement possible d'ouvrir et de fermer des structures de contrôles et de poursuivre
le document comme ceci&nbsp;:
</p>

<?php echo $slidey->highlight('files/02/structure.php'); ?>

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

<div class="slide">
<h3>Les formulaires</h3>

<p class="textOnly">
    Les formulaires représentent à eux seuls une partie très importante du développement d'un site
web. De manière générale, ils constituent la plus grosse partie de l'intéraction entre l'utilisateur
et les données stockées sur le serveur.
</p>

<p class="textOnly">
    Afin de proposer un formulaire à ses utilisateurs, il faut d'abord leur envoyer le formulaire
lui même, ce dernier peut être représenté facilement en HTML :
</p>

<?php echo $slidey->highlight('files/02/form.html', 'html5'); ?>

<center>
    <img src="<?php echo $slidey->image('img/form.jpg')->forceResize(900); ?>" />
</center>

</div>

<div class="slide">
<h3 class="slideOnly">GET vs POST</h3>
<p class="textOnly">
    L'attribut <code>method</code> de la balise <code>&lt;form&gt;</code> peut être définit à
<code>get</code> ou à <code>post</code>. Ce choix détermine la manière dont les données du formulaire
vont être transmise au serveur, dans le cas de <code>get</code>, les paramètres seront passés dans
l'<b>URL</b> comme vu précédemment :
</p>

<?php echo $slidey->highlight('files/02/form_get.txt', 'html'); ?>

<p class="textOnly">
    Dans le cas de <code>post</code>, les donnée seront alors transmises dans la partie "données"
de la requête. Cette méthode est largement préférable pour l'écriture de formulaires&nbsp;:
</p>

<hr class="slideOnly" />

<?php echo $slidey->highlight('files/02/form_post.txt', 'html'); ?>

<p class="textOnly">
    Comme vous le constatez, la méthode <b>HTTP</b> utilisée est alors <code>POST</code>
</p>

</div>

<div class="slide">
<h3 class="slideOnly">Récupération des valeurs POST</h3>
<p class="textOnly">
    Lors de la récéption d'une requête <code>POST</code>, <b>PHP</b> mettra à votre disposition 
le tableau superglobal <code>$_POST</code> qui contiendra les associations clé/valeurs postées
par l'utilisateur&nbsp;:
</p>

<?php echo $slidey->highlight('files/02/post.php'); ?>
</div>

<div class="slide">
<h3>Les en-têtes</h3>

<p class="textOnly">
    Comme vu précédemment, le serveur <b>HTTP</b>, tout comme le client, inclut des en-têtes lors
de sa réponse. Ces en-têtes peuvent indiquer le type des données contenues, leur longueur, l'encodage,
l'heure du serveur, des cookies et un très grand nombre d'informations. Elles sont sous cette forme&nbsp;:
</p>

<?php echo $slidey->highlight('files/02/headers.txt', 'html'); ?>

<p class="textOnly">
    En <b>PHP</b>, il est possible de les modifier à l'aide de la fonction 
<a href="http://php.net/header"><code>header()</code></a>. Exemple
typique, lorsque vous désirez transmettre des données qui doivent être comprise par le client comme étant
d'un autre type que celui définit par défaut (<code>text/html</code>), comme par exemple une image&nbsp;:
</p>

<div class="discover">
<hr class="slideOnly" />

<?php echo $slidey->highlight('files/02/headers.php'); ?>
</div>

</div>

<div class="slide">
<h3>Utilité des en-têtes</h3>
<p>
    Les en-têtes peuvent servir à de nombreuses choses, généralement, on les utilise pour :
</p>
<ul>
    <li class="discover">Modifier le type du fichier envoyé (<code>Content-type</code>)</li>
    <li class="discover">Rediriger le client (<code>Location</code>)</li>
    <li class="discover">Faire télécharger le fichier au client (<code>Content-Disposition</code>)</li>
    <li class="discover">Contrôler l'expiration (<code>Expires</code>)</li>
    <li class="discover">Changer le code de réponse</li>
    <li class="discover">etc.</li>
</ul>
</div>

<div class="slide">
<h3 class="slideOnly">Attention à header()</h3>

<p class="warning">
    <b>Attention&nbsp;:</b> lorsque vous envoyez des données, le serveur commence à répondre au client
et lui transmet "au fur et à mesure" la réponse. Ce qui signifie que la méthode <code>header()</code>
provoquera une erreur si vous l'apellez après avoir envoyé un élément de données au client.
<p>
</div>

<div class="slide">
<h3>Les cookies</h3>

<p class="textOnly">
    Les cookies sont des clé/valeurs stockés par le <b>client HTTP</b>. Lors de la réponse d'un serveur,
un certain nombre de définitions de cookies peuvent avoir lieu à l'aide de l'en-tête <code>Set-cookie</code>.
Ces valeurs sont fournies plus tard par le client à chaque requête avec l'en-tête <code>Cookie</code>.
</p>

<p>
    Les cookies peuvent <span class="textOnly">donc</span> être définis grâce à l'en-tête <code>Set-cookie</code>,
mais <b>PHP</b> mets à notre disposition la fonction <a href="http://php.net/setcookie"><code>setcookie()</code>
</a>, moins brute&nbsp;:
</p>

<?php echo $slidey->highlight('files/02/cookies.php'); ?>

</div>

<div class="slide">
    <h3 class="slideOnly">Suppression de cookies</h3>
<p>
    Les cookies peuvent être supprimés de la manière suivante&nbsp;:
</p>

<?php echo $slidey->highlight('files/02/cookies_delete.php'); ?>

</div>

<div class="slide">
    <h3 class="slideOnly">Attention aux cookies</h3>
<p class="warning">
    <b>Attention 1&nbsp;:</b> comme <code>header()</code>, <code>setcookie()</code> doit être effectué avant
tout envoi de données.
</p>

<p class="warning discover">
    <b>Attention 2&nbsp;:</b> définir une chaîne de caractère vide ou la valeur <code>false</code> dans votre
cookie essaiera de le supprimer, si vous souhaitez stocker un booléen, utilisez <code>0</code> et <code>1</code>.
</p>
<p class="warning discover">
    <b>Attention 3&nbsp;:</b> <u>n'ayez <b>pas</b> confiance</u> en les valeurs que vous obtenez dans le
tableau <code>$_COOKIE</code>, il peut contenir <u>tout ce que l'utilisateur souhaite</u>. En effet, même
si le serveur définit les clients, ils sont stockés en clair et modifiable à volonté par le client. 
</p>
</div>

<div class="slide">
<h3>Les sessions</h3>

<p class="textOnly">
    Imaginez que vous deviez créer un système d'identification pour sécuriser l'accès à un site web,
les cookies pourraient être utilisés mais les données ne peuvent pas être stockés "en clair", étant donné
que l'utilisateur a parfaitement accès à leur contenu.
</p>

<p class="slideOnly">
    <b>Problème&nbsp;: créer un système d'identification&nbsp;?</b>
</p>

<p class="textOnly">
    Pour répondre à ce problème, <b>PHP</b> vous propose une surcouche aux cookies nommée sessions. Les
sessions sont constituées d'un jeton généré aléatoirement (par exemple: <code>aa244c586762dce6f29530fd87192d89</code>).
Ce jeton permet de "reconnaître" le visiteur. Ainsi, lorsqu'un client fournit son jeton (que l'on nomme
généralement identifiant de session, ou <em>sessid</em>), le serveur consulte une base de données ou
un fichier dont le nom contient le jeton et y retrouve des informations. Contrairement aux informations
stockées dans les cookies, celles des sessions ne peuvent pas être modifiées ou même connues du visiteur et
sont donc sécurisées.
</p>

<p class="slideOnly discover">
    Principe des sessions&nbsp;:

    <ul class="slideOnly">
        <li class="discover">"Jeton" de sécurité: <em>sessid</em></li>
        <li class="discover">Base de donnée ou fichiers coté serveur</li>
    </ul>

    <span class="discover">
    Ainsi, les données sont sécurisées car elles ne peuvent pas être modifiées arbitrairement par le client
    </span>
</p>

</div>

<div class="slide">
    <h3 class="slideOnly">Utilisation des sessions</h3>

<p>
    L'utilisation de tout ce mécanisme se fait <b>automatiquement</b> à l'aide de la fonction <b>PHP</b>
<a href="http://php.net/session_start"><code>session_start()</code></a> et du tableau <code>$_SESSION</code>&nbsp;:
</p>

<div class="discover">
<?php echo $slidey->highlight('files/02/sessions.php'); ?>
</div>

<p class="textOnly">
    Ce compteur ne peut pas être faussé par le client, ou plus exactement il ne peut pas être amené à une
valeur arbitraire. En revanche, le client peut choisir de supprimer son cookie de session, c'est à dire
jeter son jeton de sécurité, le compteur repartira alors à 0.
</p>

</div>

<div class="slide">
<?php echo $slidey->part('TD'); ?>

<?php echo $slidey->annex('tds/td2.php'); ?>
</div>

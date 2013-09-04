.. slide:: middleSlide

HTTP
====

.. slide::

Introduction au protocol HTTP
-----------------------------

HTTP
~~~~

Lorsque vous naviguez sur internet, vous utilisez un **navigateur** qui
agit en fait comme un **client HTTP (HyperText Transfer Protocol)**. Ce protocole
permet d'accéder à des resources distantes.

.. center::
    .. image:: /img/browsers.jpg
        :width: 500
        :class: center

.. slide::

Serveur HTTP
~~~~~~~~~~~~

De l'autre coté, des serveurs **HTTP** (ou serveurs web) sont à l'écoute
permanente de requêtes et répondent à leurs clients. On nommera par exemple **Apache**,
**Nginx** ou **Lighttpd**

.. center::
    .. image:: /img/apache.png
        :width: 250

    .. image:: /img/nginx.gif
        :width: 250

    .. image:: /img/lighttpd.png
        :width:250

.. slide::

URL
~~~

.. textOnly::
    Une resource peut être désignée par une adresse, que l'on nomme **URL (Unified
    Resource Location)**, ou **URI (Unified Resource Identifier)**. Cette **URL**
    est de la forme :

.. important::
       **http://www.domain.com/path/to/resource.htm**

Ou :

* **http** est le protocole utilisé
* **www.domain.com** est le nom d'hôte
* **path/to/resource.htm** est la resource demandée

.. slide::

Requête HTTP
~~~~~~~~~~~~

.. textOnly::
    Lors de l'accès à une page web, le navigateur effectue plusieurs opérations, il
    résoud le nom d'hôte et ouvre une connexion avec le serveur web. Il utilise pour cela
    le protocole **HTTP** basé sur la couche **TCP/IP** de la machine.

    Il envoie ensuite une **requête HTTP**, qui est constituée d'un ensemble d'en-têtes
    et éventuellement de données pouvant contenir :

.. slideOnly::
    Une **requête HTTP** formée par un navigateur ou client peut contenir :

* La méthode, le nom de la resource demandée et la version du protocole* 
*  Des en-têtes pouvant contenir :
        * Le nom d'hôte du serveur
        * Les cookies
        * Des informations sur le navigateur 
        * Les langues et formats acceptés
        * Le type et contenu des données (si présentes)
        * etc.
* Eventuellement des données (e.x: formulaires, envoi de fichier etc.)

.. slide::

Réponse HTTP
~~~~~~~~~~~~

.. textOnly::
    Le serveur utilise alors les éléments fournis par le client pour tenter de localiser
    la resource demandée et lui répond en lui transférant sous une forme très ressemblante
    des en-têtes et éventuellement des données:
    
.. slideOnly::
    Une **réponse HTTP** formée par un serveur peut contenir :

* Un code de réponse (200, 404, 403, 302...) et la version du protocole
* Des en-têtes pouvant inclure:
        * Des définition de cookies
        * Un type et une taille de contenue
        * Des informations sur le serveur, le type de connexion
        * etc.
* Eventuellement des données

.. slide::

Exemple
~~~~~~~

Voici un exemple de **requête/réponse HTTP**, les lignes préfixées par ``>``
sont les messages envoyés par le client et celles préfixées par ``<`` sont celles
reçues:

.. code-block:: text

    http://gregwar.com/hello.txt

    > GET /hello.txt HTTP/1.1
    > Host: gregwar.com
    > 
    < HTTP/1.1 200 OK
    < Content-Length: 13
    < Content-Type: text/plain
    < 
    < Hello world!

.. textOnly::
    Ce protocole est très simple et lisible par un humain. Il est très important d'avoir connaissance
    de **HTTP** pour développer une application web. Certain plugins (Firebug, HTTPFox, Tamper data...)
    permettent de visualiser les échanges et/ou de faire des statistiques sur le trafic.

* Protocole **très simple**, lisible par un humain.
* Important à connaître pour **comprendre ce que l'on développe**.
* Utilisation de plugins tels que **Firebug** ou **HTTPFox** recommandée.

.. slide::

CGI
---

Présentation
~~~~~~~~~~~~

.. textOnly::
    Le principe du **CGI (Common Gateway Interface)** est d'ajouter une fonctionnalité à un serveur web afin qu'il exécute
    un programme au lieu de simplement transférer une resource statique.

.. slideOnly::
    **CGI: Common Gateway Interface**

.. textOnly::
    De la même manière que vous avez exécuté **PHP** en ligne de commande, le "binding" **CGI**
    permettra d'éxécuter **PHP** au moment ou une resource est demmandée par un client. Ainsi, le code
    que vous aurez écrit sera exécuté et pourra accéder lui même à un ensemble de resource pour rendre
    le contenu de la page dynamique, c'est à dire différent selon l'utilisateur, la base de données etc.

.. center::
    .. image:: img/cgi.gif
        :width: 900

.. slide::

Résumé
~~~~~~

La "passerelle" **CGI** va alors exécuter un programme ou un script **sur le serveur** en
lui passant les données liées à la requêtes.

Ce programme pourra alors intéragir avec les en-têtes **HTTP** qui seront envoyées en réponse
ainsi que sur le contenu de la réponse.

.. discover::
    Dans le cas de **PHP**, l'intérpréteur sera executé sur le script demandé.

.. slide::

PHP et HTTP
-----------

Fonctionnement
~~~~~~~~~~~~~~

En général, les scripts php sont identifiés par leur extension ``.php``. Lorsque
le serveur web se voit demander un fichier de ce type, il exécute l'interpréteur au lieu de
transmettre son contenu vers le client.

Dans le cas d'Apache, le paquet ``libapache2-mod-php5`` contient la passerelle
Apache/PHP::

    t   libapache2-mod-php5 - server-side, HTML-embedded scripting language (Apache 2 module)


.. slide::

Exemple
~~~~~~~

Par exemple, si le fichier ``date.php`` se trouve sur le serveur web et contient
le script suivant::

    Bonjour, il est <?php echo date('H:i:s'); ?> !

.. discover::
    Lorsque le client demandera la resource ``/date.php``, si le serveur est équipé
    du mod **PHP**, il recevra une réponse du style::

        Bonjour, il est 13:37:42 !

.. discover::
    Toute sortie standard sera automatiquement envoyée en tant que données de la réponse **HTTP**.

.. textOnly::
    .. note::
        Notez ici tout l'interêt de pouvoir ouvrir et fermer les balises ``<?php ?>``, cela vous permet
        alors d'utiliser **PHP** uniquement aux emplacements dynamique de votre page web et de rédiger le reste
        normalement.

.. slide::

Exemple de structure
~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Il est par exemple parfaitement possible d'ouvrir et de fermer des structures de contrôles et de poursuivre
    le document comme ceci:

::

    <?php

    $volumes = array('La communauté de l\'anneau', 
        'Les deux tours', 'Le retour du roi');

    ?>

    Les volumes :
    <ul>
        <?php foreach ($volumes as $volume) { ?>
            <li><?php echo $volume; ?></li>
        <?php } ?>
    </ul>

.. slide::

Variables superglobales
~~~~~~~~~~~~~~~~~~~~~~~

La paserelle **PHP** met à votre disposition des variables spéciales nommées :method:`superglobales <superglobals>`.
Elles contiennent des informations sur la requête en cours :

* ``$_SERVER``: Contient les informations sur la requête **HTTP**
* ``$_GET``: Variables GET
* ``$_POST``: Variables POST
* ``$_COOKIES``: Cookies définis
* ``$_SESSION``: Données de la session

.. slide::

Attention à la sécurité
~~~~~~~~~~~~~~~~~~~~~~~

.. warning::
    **Attention:** Les valeurs de ces variables sont, pour la plupart, fournies par l'utilisateur,
    on ne peut donc pas compter sur leur présence, leur format ou leur valeur d'un point de vue sécurité.

.. slide::

Données GET
~~~~~~~~~~~

.. textOnly::
    Les données "GET" sont des paramètres passées à la page. Il s'agit d'une manière de 
    transmettre une petite quantité d'informations directement dans une **URL**:

.. important::
    http://monsite.com/page.php?<u>x=42&amp;y=1337</u>

.. textOnly::
    Depuis le code source **PHP**, ces variables seront accessibles directement dans le
    tableau ``$_GET`` :

::

    <?php

    var_dump($_GET);

    /* 
     array(2) {
      ["x"]=>
      string(2) "42"
      ["y"]=>
      string(4) "1337"
    }
    */

``x=42&y=1337`` est ce que l'on apelle une *Query String*

.. slide::

Les formulaires
~~~~~~~~~~~~~~~

.. textOnly::
    Les formulaires représentent à eux seuls une partie très importante du développement d'un site
    web. De manière générale, ils constituent la plus grosse partie de l'intéraction entre l'utilisateur
    et les données stockées sur le serveur.

.. textOnly::
    Afin de proposer un formulaire à ses utilisateurs, il faut d'abord leur envoyer le formulaire
    lui même, ce dernier peut être représenté facilement en HTML:

.. code-block:: html5

    <form method="post">
        Votre prénom :
        <input type="text" name="firstname" /><br />
        Votre nom : 
        <input type="text" name="lastname" /><br />

        <input type="submit" value="Envoyer" />
    </form>

.. center::

    .. image:: /img/form.jpg
        :width: 900

.. slide::

GET vs POST
~~~~~~~~~~~

.. textOnly::
    L'attribut ``method`` de la balise ``<form>`` peut être définit à
    ``get`` ou à ``post``. Ce choix détermine la manière dont les données du formulaire
    vont être transmise au serveur, dans le cas de ``get``, les paramètres seront passés dans
    l'**URL** comme vu précédemment:

.. code-block:: text

    > GET /form.html?firstname=Marty&lastname=McFly HTTP/1.1
    > ...
    >

.. textOnly::
    Dans le cas de ``post``, les donnée seront alors transmises dans la partie "données"
    de la requête. Cette méthode est largement préférable pour l'écriture de formulaires:

.. code-block:: text

    > POST /form.html HTTP/1.1
    > Content-Type: application/x-www-form-urlencoded
    > Content-Length: 30
    > 
    > firstname=Marty&lastname=McFly

.. textOnly::
    Comme vous le constatez, la méthode **HTTP** utilisée est alors ``POST``

.. slide::

Récupération des valeurs POST
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Lors de la récéption d'une requête ``POST``, **PHP** mettra à votre disposition 
    le tableau superglobal ``$_POST`` qui contiendra les associations clé/valeurs postées
    par l'utilisateur:

::

    <?php

    var_dump($_POST); 

    /*
    array(2) {
      ["firstname"]=>
      string(5) "Marty"
      ["lastname"]=>
      string(5) "McFly"
    }
    */

.. slide::

Les en-têtes
~~~~~~~~~~~~

.. textOnly::
    Comme vu précédemment, le serveur **HTTP**, tout comme le client, inclut des en-têtes lors
    de sa réponse. Ces en-têtes peuvent indiquer le type des données contenues, leur longueur, l'encodage,
    l'heure du serveur, des cookies et un très grand nombre d'informations. Elles sont sous cette forme:

.. code-block:: text

    HTTP/1.1 200 OK
    Server: Apache
    Content-Type: text/html
    Date: Fri, 21 Dec 2012 03:53:16 GMT
    Content-Length: 334

    (data)

.. textOnly::
    En **PHP**, il est possible de les modifier à l'aide de la fonction 
    :method:`header`. Exemple
    typique, lorsque vous désirez transmettre des données qui doivent être comprise par le client comme étant
    d'un autre type que celui définit par défaut (``text/html``), comme par exemple une image:

.. discover::

    ::

        <?php

        // Créé une image rouge de 100x100
        $i = imagecreatetruecolor(100, 100);
        imagefill($i, 0, 0, 0xff0000);

        // Précise au navigateur du client que le contenu
        // est une image jpeg, et non pas une page HTML
        // (text/html est le type par défaut)
        header('Content-type: image/jpeg');

        // Envoie l'image au client et libère ses resources
        imagejpeg($i);
        imagedestroy($i);    

.. slide::

Utilité des en-têtes
~~~~~~~~~~~~~~~~~~~~

Les en-têtes peuvent servir à de nombreuses choses, généralement, on les utilise pour :

* Modifier le type du fichier envoyé (``Content-type``)
* Rediriger le client (``Location``)
* Faire télécharger le fichier au client (``Content-Disposition``)
* Contrôler l'expiration (``Expires``)
* Changer le code de réponse
* etc.

.. slide::

Attention à header()
~~~~~~~~~~~~~~~~~~~~

.. warning::
    **Attention:** lorsque vous envoyez des données, le serveur commence à répondre au client
    et lui transmet "au fur et à mesure" la réponse. Ce qui signifie que la méthode ``header()``
    provoquera une erreur si vous l'apellez après avoir envoyé un élément de données au client.

.. slide::

Les cookies
~~~~~~~~~~~

.. textOnly::
    Les cookies sont des clé/valeurs stockés par le **client HTTP**. Lors de la réponse d'un serveur,
    un certain nombre de définitions de cookies peuvent avoir lieu à l'aide de l'en-tête ``Set-cookie``.
    Ces valeurs sont fournies plus tard par le client à chaque requête avec l'en-tête ``Cookie``.

    Les cookies peuvent <span class="textOnly">donc</span> être définis grâce à l'en-tête ``Set-cookie``,
    mais **PHP** mets à notre disposition la fonction :method:`setcookie`
    moins brute:

::

    <?php

    if (isset($_COOKIE['seen']))
    {
        echo "J'ai l'impression de vous connaitre";
    }
    else
    {
        echo "Tiens, un nouveau visage !";

        // Definit le cookie seen à 1, qui expire 
        // dans une heure (=3600 secondes)
        setcookie('seen', 1, time()+3600);
    }

.. slide::

Suppression de cookies
~~~~~~~~~~~~~~~~~~~~~~
    
Les cookies peuvent être supprimés de la manière suivante::

    <?php

    // Pour supprimer un cookie, vous devez indiquer
    // une date d'expiration dans le passé et utiliser
    // une chaîne vide ou false en tant que valeur
    setcookie('seen', false, time()-3600);

.. slide::

Attention aux cookies
~~~~~~~~~~~~~~~~~~~~~

.. warning::
    **Attention 1:** comme ``header()``, ``setcookie()`` doit être effectué avant
    tout envoi de données.

.. warning::
    .. discover::
        **Attention 2:** définir une chaîne de caractère vide ou la valeur ``false`` dans votre
        cookie essaiera de le supprimer, si vous souhaitez stocker un booléen, utilisez ``0`` et ``1``.

.. warning::
    .. discover::
        **Attention 3:** **n'ayez **pas** confiance** en les valeurs que vous obtenez dans le
        tableau ``$_COOKIE``, il peut contenir **tout ce que l'utilisateur souhaite**. En effet, même
        si le serveur définit les clients, ils sont stockés en clair et modifiable à volonté par le client. 

.. slide::

Les sessions
~~~~~~~~~~~~

.. textOnly::
    Imaginez que vous deviez créer un système d'identification pour sécuriser l'accès à un site web,
    les cookies pourraient être utilisés mais les données ne peuvent pas être stockés "en clair", étant donné
    que l'utilisateur a parfaitement accès à leur contenu.

.. slideOnly::
    **Problème: créer un système d'identification ?**

.. textOnly::
    Pour répondre à ce problème, **PHP** vous propose une surcouche aux cookies nommée sessions. Les
    sessions sont constituées d'un jeton généré aléatoirement (par exemple: ``aa244c586762dce6f29530fd87192d89``).
    Ce jeton permet de "reconnaître" le visiteur. Ainsi, lorsqu'un client fournit son jeton (que l'on nomme
    généralement identifiant de session, ou *sessid*), le serveur consulte une base de données ou
    un fichier dont le nom contient le jeton et y retrouve des informations. Contrairement aux informations
    stockées dans les cookies, celles des sessions ne peuvent pas être modifiées ou même connues du visiteur et
    sont donc sécurisées.

.. slideOnly::
    Principe des sessions:

    * "Jeton" de sécurité: *sessid** 
    * Base de donnée ou fichiers coté serveur* 

    .. discover::
        Ainsi, les données sont sécurisées car elles ne peuvent pas être modifiées arbitrairement par le client

.. slide::

Utilisation des sessions
~~~~~~~~~~~~~~~~~~~~~~~~

L'utilisation de tout ce mécanisme se fait **automatiquement** à l'aide de la fonction **PHP**
:method:`session_start` et du tableau ``$_SESSION``:

:: 

    <?php

    // Initie le système de sessions de PHP, doit 
    // être fait avant l'envoi de données
    session_start();

    if (isset($_SESSION['count'])) {
        $_SESSION['count']++;
    } else {
        $_SESSION['count'] = 1;
    }

    echo 'Je t\'ai vu ' . $_SESSION['count'] . 
        ' fois';


.. textOnly::
    Ce compteur ne peut pas être faussé par le client, ou plus exactement il ne peut pas être amené à une
    valeur arbitraire. En revanche, le client peut choisir de supprimer son cookie de session, c'est à dire
    jeter son jeton de sécurité, le compteur repartira alors à 0.

.. slide::

TD 2
----

* :doc:`tds/td2`


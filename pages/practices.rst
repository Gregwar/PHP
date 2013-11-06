.. slide:: middleSlide

Bonnes pratiques
================

.. slide::

Travailler proprement
---------------------

Introduction
~~~~~~~~~~~~

Le langage **PHP** peut être très vite maîtrisé. En revanche, l'apprentissage
des méthodes et l'organisation sont plus complexes et primordiales dans l'écriture
d'une application web.

Dans cette partie, nous survolerons un ensemble de bonnes pratiques, en "vrac", fortement liées
au développement d'application **PHP**.

.. slide::

Encodage des caractères
~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    L'encodage UTF-8 est actuellement le jeu d'encodage le plus répandu et recommandé,
    surtout dans des applications multilingues.
    L'encodage des caractères doit être uniformisé dès le début, car il concerne autant les 
    pages webs que le contenu de la base de données, et qu'une mauvaise gestion peut vite se
    conclure par des problèmes d'affichages.
    
    Les développeurs qui travaillent sur un projet doivent s'assurer que leur encodage
    est similaire, et spécifier cet encodage dans la balise ``meta`` des pages HTML:

.. code-block:: html5

    <head>
        <meta charset="utf-8" />
        <!-- ... -->
    </head>

.. textOnly::
    .. note::
        Notez que dans le cas d'une requête AJAX, l'encodage des caractères n'est pas précisé
        car la page HTML peut être partielle. Dans ce cas là, il est possible de le préciser dans 
        les en-têtes HTTP:

        .. code-block:: no-highlight
            Content-type: text/html; charset=utf-8

.. slideOnly::
    .. discover::
        .. slideOnly::
            ----------------

        .. code-block:: no-highlight
            Content-type: text/html; charset=utf-8

.. slide::

.. _escape:

Echappement
~~~~~~~~~~~

.. image:: /img/magicQuotes.gif
    :style: float:right

.. textOnly::
    Pendant longtemps, **PHP** contenais une option très controversée nommée
    les *magic quotes*. Ce système échappait automatiquement les données qui parvenaient
    à l'application web concernée (en ajoutant des \ devant les " par exemple).
    
    Mécanisme souvent à l'origine de problèmes qui se traduisent par l'apparition de \
    involontaires, ce système se voulait protecteur contre les failles liées notamment aux
    injections SQL. Aujourd'hui, il est obselète et désactivé par défaut, il est fortement
    conseillé de le désactiver (``php.ini``):

.. code-block:: ini
    magic_quotes_gpc = Off

.. slide::

Tests
~~~~~

.. textOnly::
    Entre autre grâce à `PHPUnit <http://www.phpunit.de/manual/current/en/>`_,
    il est très facile d'écrire des tests unitaires en **PHP**, ce qui permet:

.. discoverList::

* Assurer la non-regréssion d'un projet
* Empêcher les bugs de se reproduire
* Couvrir les cas limites
* Tester l'environement d'une application (avant un déploiement en production par exemple)
* Sécuriser le développement en équipe
* Eprouver la robustesse de l'application

.. textOnly::
    Il est pour cela important de disposer de code **découpé en composants**. Ecrire les tests
    pendant (voire avant) le développement est une bonne chose.

.. slide::

Tests: exemple
~~~~~~~~~~~~~~

.. textOnly::
    Voici un exemple de test écrit avec **PHPUnit**:

::

    <?php

    class Calculator
    {
        public static function add($a, $b)
        {
            return $a + $b;
        }
    }

    class Test extends \PHPUnit_Framework_TestCase
    {
        public function testAdd()
        {
            for ($i=0; $i<10; $i++) {
                $this->assertEquals(
                    2*$i, Calculator::add($i, $i)
                );
            }
        }
    }

.. slide::

Tests: exécution
~~~~~~~~~~~~~~~~

.. textOnly::
    Pour l'exécuter, simplement lancer ``phpunit``:

.. code-block:: no-highlight

    $ phpunit test.php
    PHPUnit 3.6.3 by Sebastian Bergmann.

    .

    Time: 0 seconds, Memory: 2.75Mb

    OK (1 test, 10 assertions)


.. slide::

Serveur d'intégration
~~~~~~~~~~~~~~~~~~~~~

Un serveur d'intégration est une application généralement couplée au système de versionnement
(tels que *git* ou *svn*), et qui vérifie continuellement que les tests unitaires
et standards de codages sont respectés.

Il permet de provoquer des alertes dans le cas d'une mauvaise manipulation et de sensibiliser
une équipe de développeurs à la fragilité de l'application.

.. slide::

Les performances
----------------

.. image:: /img/apc-monitor.png
    :class: right

Contexte
~~~~~~~~

N'oubliez pas que **PHP** est un langage interprété. Son utilisation doit donc
se limiter à des tâches de gestion. Il ne peut pas être utilisé pour faire du calcul
très rapide par exemple.
    
**PHP** offre la possibilité d'écrire des extensions en C et de créer un *binding*,
ou association entre le C et le **PHP**, cette option est vivement recommandée en cas
d'application à haute performance impliquant du calcul gourmand.

La plupart des fonctions et bibliothèques standard bénéficient d'ailleurs d'une bonne
rapidité car sont écrites en C.

.. slide::

APC
~~~

**APC** est un mécanisme de mise en cache du bytecode **PHP**.

.. textOnly::
    En clair, il permet d'éviter au serveur de relire et de ré-analyser le code source d'une application
    à chaque requête en gardant un version condensée du script en mémoire.
    
Il est vivement conseillé d'utiliser **APC**, qui sera bientôt natif dans **PHP**, et qui
en augmente les performances quasi systématiquement sans surcoût de développement.

Sous linux, il peut être installé via le paquet ``php-apc``.

**APC** offre également d'autre possibilités tels que le stockage de valeurs en cache (voir
ci-dessous).

.. slide::

Utilisation de cache
~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Certaines opérations sont effectuées de manière réccurente (accès à la base de données,
    à des fichiers, calculs etc.). Au lieu d'être recalculées à chaque fois, des données peuvent
    être mises en cache à l'aide de mécanismes tels que :method:`APC`
    ou :method:`Memcache`. 

    Ces systèmes offrent un magasin de clé/valeur stocké directement dans la RAM, et disposant
    d'un temps d'accès extrêmement faible. Ainsi, il est par exemple possible de stocker une valeur
    et d'y accéder plus tard. Cependant, ce stockage est totalement volatile et nous ne sommes pas
    sûr de pouvoir récupérer notre valeur (il ne s'agit que de cache). Aussi, il est important de
    faire attention aux inconsistences que ces systèmes peuvent provoquer, les données n'étant
    plus récupérées depuis la base de données par exemple. Voici un exemple d'utilisation du
    magasin **APC**:

::

   <?php

    $var = apc_fetch('var');

    if ($var === false) {
        $var = rand();
        apc_add('var', $var);
    }

    echo "Var: $var\n"; 

.. slide::

Sécurité
--------

HTTPS
~~~~~

.. image:: /img/cadenas.jpg
    :style: float:right

.. textOnly::
    Comme vous le savez, les données transmises via **HTTP** sont envoyées en clair sur le
    réseau. Ces données peuvent éventuellement être interceptées à l'aide de plusieurs attaques et
    du sniffing réseau. Un attaquant peut ainsi récupérer les mots de passes, mais aussi les
    cookies de ses victimes, c'est à dire leur jeton d'identification. Il peut ainsi se faire passer
    pour eux. **HTTPS** est une solution transparente puisqu'elle ne change en rien le code **PHP**.

.. slide::

Visibilité des fichiers
~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Parfois, il arrive que votre serveur web soit temporairement mal configuré, lors par exemple
    d'une migration ou d'un bug. A ce moment là, les fichiers sources de votre code **PHP** pourraient
    par exemple ne pas être interprétés et être téléchargeables par les visiteurs tel quels. Cela pose
    évidemment d'énorme problèmes car ces fichiers contiennent le mot de passe pour accéder à la base
    de données, et beaucoup de choses secrètes. Pour minimiser ce risque, il est conseillé d'aborder
    une architecture de répértoire séparant le code **PHP** pur et dur de la partie visible par vos
    visiteurs:

.. code-block:: no-highlight

    Exemple d'architecture :

    app/
     |- web/           Documents visibles
     |   |- index.php  Page "frontale"
     |   |- css/
     |   |- img/
     |   -
     |
     |- src/            Documents invisibles
     |   |- config.php  Configuration
     |   |- autoload.php
     |   |- ...
     -   -

.. Fix for the colors in vi ||

.. slide::

Upload de fichiers
~~~~~~~~~~~~~~~~~~

.. textOnly::
    Certaines application web autorisent l'upload de fichier, pour récupérer des photos, vidéos etc.
    Cette pratique doit être scrupuleusement surveillée car une faille dans l'upload pourrait permettre
    à un attaquant d'exécuter du code **PHP** arbitraire. Et il faut faire attention, car le code
    **PHP** a très souvent le droit d'accéder au système via :method:`shell_exec`
    par exemple. Si l'utilisateur upload le fichier suivant :

::

    <?php

    /**
     * Execute la commande passée en argument
     * et affiche son résultat
     */
    echo shell_exec($_GET['c']);

.. textOnly::
    Et que le serveur le place "bêtement" dans un dossier, le serveur web pourrait
    l'interprêter, ce qui serait dangereux.

    Dans ce cas là, il est recommandé de:

.. discoverList::
* Vérifier que le contenu du fichier a bien une forme attendu
* Nommer les fichiers automatiquement à partir de valeurs aléatoire et d'extension imposées
* Désactiver l'interpreteur **PHP** dans les endroits sensibles

.. slide::

Inclusion
~~~~~~~~~

.. textOnly::
    Sur des petits site web, il arrive parfois que le routeur soit fait de manière très artisanale de cette
    manière:

::

    <!DOCTYPE html>
    <html>
        <body>
            <h1>Titre</h1>
            <div class="menu">
                <a href="?p=home.php">Accueil</a>
                <a href="?p=books.php">Livres</a>
            </div>

            <?php include('pages/'.$_GET['p']); ?>
        </body>
    </html>

.. textOnly::
    Cette manière de faire est dangereuse. Elle permet à l'utilisateur d'inclure n'importe quel fichier
    présent sur le serveur, voire d'interpréter du code arbitraire. Il faut dans ce cas exercer un contrôle 
    très précis sur le nom de la page.

.. slide:: redSlide fullSlide slideOnly

.. div:: importantText
    DON'T DO 
    THAT!

.. slide::

Failles XSS
~~~~~~~~~~~

.. textOnly::    
    Imaginons le formulaire suivant:

::

    <html>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo 'Ton nom es: '.$_POST['nom'];
    }
    ?>
    <form method="post">
        <input type="text" name="nom" /><br />
        <input type="submit" />
    </form>
    </html>

.. textOnly::
    L'utilisateur pourra saisir n'importe quelle valeur, elle sera affichée dans la page. Le problème, c'est que 
    le code HTML sera lui aussi interprété. Par exemple, si l'utilisateur saisit ``<u>test</u>``,
    le mot "test" apparaîtra en souligné. Ainsi, un utilisateur mal intentionné pourra par exemple injecter du code
    Javascript dans la page, et aura accès entre autre à la variable ``document.cookie`` qui contient le
    cookie du navigateur exécutant le code. En s'arrangeant pour qu'une victime se rende sur son lien, il pourra alors
    récupérer son cookie et s'identifier à sa place.

    La solution est d'échapper systématiquement toutes les variables affichées à l'aide de la fonction
    :method:`htmlspecialchars`. Cette opération est fastidieuse
    et risquée, car le moindre oubli pourrait ouvrir une brèche sur l'application ainsi créée. Pour palier à cela,
    certains moteurs de templates offrent la possibilité d'échapper tout par défaut.

.. slide:: redSlide fullSlide slideOnly

.. div:: importantText
    DON'T DO 
    THAT!

.. slide::

.. _csrf:

Failles CSRF
~~~~~~~~~~~~

.. textOnly::
    Imaginez la page suivante:

.. code-block:: html

    <!DOCTYPE html>
    <html>
        <body>
            ...
            <a href="destroy.php">
                Détruire mon compte
            </a>
        </body>
    </html>

.. textOnly::
    Et si, à l'instar de l'attaquant XSS, quelqu'un vous envoyait un e-mail ou vous faisait cliquer sur un lien
    pointant vers ``destroy.php``? Vous détruiriez votre compte
    sans même vous en aperçevoir. C'est ce que l'on apelle une faille CSRF (Cross Site ReFerencing). Les formulaires
    soumis à l'aide de POST peuvent également être victime de ces attaques.

    Pour éviter cela, il est nécessaire de générer un jeton CSRF et de le stocker dans la session, puis de le
    placer dans un champ caché (*input hidden*) du formulaire. Au moment de la requête, si le jeton fournit 
    par l'utilisateur est égal à celui contenu dans la session, c'est bien qu'il est passé par le site pour obtenir 
    son formulaire.

.. slide:: redSlide fullSlide slideOnly

.. div:: importantText
    DON'T DO 
    THAT!

.. slide::

.. _sqlinjection:

Injection SQL
~~~~~~~~~~~~~

.. textOnly::
    Comme il a été expliqué plus tôt, dans le chapitre sur la base de données, il est très mauvais de créer
    des requêtes SQL par concaténation de chaîne de caractères. Prenons par exemple:

::

    <?php
    $pdo = include('connection.php');

    $sql = 'SELECT * FROM users WHERE 
        login="admin" AND password="'.
        $_GET['password'] .'"';

    // ...

.. discover::
    Si l'utilisateur saisit le mot de passe suivant:

    ``" OR "1"="1``

.. discover::
    La requête deviendra alors:

.. discover::
    ``SELECT * FROM users WHERE login="admin" AND password="" OR "1"="1"``

.. textOnly::
    Ce qui est toujours vrai. Il faut donc éviter absolument de générer des requêtes à la main et toujours
    utiliser le mécanisme de préparation des requêtes.

.. slide:: redSlide fullSlide slideOnly

.. div:: importantText
    PREPAREZ 
    VOS 
    REQUÊTES 

.. discover::
    !!!

.. slide::

Hachage des mots de passes
~~~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Il faut parfois penser au pire, et même au jour ou votre base de données aura été piratée et
    téléchargée par un utilisateur mal intentionné. Si les mots de passe des utilisateurs sont stockés
    en clair, il sera facile pour un attaquant d'essayer d'utiliser ces mots de passe pour accéder à la
    messagerie, au compte bancaire ou à tout autre service sur lesquels vos utilisateurs sont inscrits.
    Pour vous protéger, vous pouvez utiliser une fonction de hachage:

::

    <?php

    $sel = 'azerty';
    $password = 'f50da7a1fb642fceef1657863e1e1858';
    // admin

    if ($password == md5($_GET['p'].$sel)) {
        echo "Bienvenue!";
    } else {
        echo "Mauvais passe !";
    }

.. textOnly::
    Dans cet exemple, le mot de passe (admin) n'apparaît pas en clair dans le code source et ne
    peut d'ailleurs être retrouvé que par force brute.

.. slide::

.. _mvc:

Framework & bibliothèques
-------------------------

Architecture MVC
~~~~~~~~~~~~~~~~

.. textOnly::
    Très souvent, vous serez confronté à un environnement respectant le patron de conception **MVC**,
    ce qui correspond à un découpage du code en trois grande parties:
        * Le **modèle**, responsable de communiquer avec la base de données et de gérer la persistence
    des données
        * La **vue**, qui sert à représenter les données pour l'utilisateur (notion de *template*)
        * Les **contrôleurs**, qui coordonnent le modèle et la vue

.. center::
    .. image:: /img/MVC.jpg

.. textOnly::
    Ce principe est très célèbre et répandu, presque tous les frameworks le respectent. Vous trouverez une multitude
    d'informations sur internet à ce sujet.

.. slide::

Les ORM
~~~~~~~

.. textOnly::
    Comme vu précédemment, les ORM sont des outils très répandus pour manipuler la base de données. Il est grandement
    recommandé d'en utiliser un dès que la base de données prend de l'ampleur. Voici un exemple très simple impliquant le
    gestionnaire d'entités de Doctrine2:

::

    <?php

    $user = new User;
    $user->setName('Bob');

    $em->persist($user);
    $em->flush();

.. slide::

Les moteurs de template
~~~~~~~~~~~~~~~~~~~~~~~
    
Les moteurs de templates sont des outils permettant d'écrire le code d'une vue sous une forme différente 
du PHP brut. Ils permettent notamment:

.. discoverList::
    * L'échappement systématique des variables
    * L'héritage et la surcharge de templates
    * Une syntaxe plus légère
    * Des optimisations, mises en cache etc.

.. discover::

    .. code-block:: jinja
        {% for user in users %}
            * {{ user.name }}
        {% else %}
            No user have been found.
        {% endfor %} 

.. slide::

Composer
~~~~~~~~

.. textOnly::
    Composer est un outil de gestion des dépendances en **PHP**, il vous permet de spécifier de quel(s)
    autre(s) projet(s) votre projet dépend, et ainsi de créer des "paquets", un peu comme ``apt`` par
    exemple. Il peut être obtenu ici: `Télécharger composer <http://getcomposer.org/download/>`_.
    
    Vous pouvez alors spécifier les dépendances de votre application dans un fichier au format ``JSON``,
    comme par exemple:

.. code-block:: no-highlight

    {
        "require": {
            "twig/twig": "1.*",
            "gregwar/image": "dev-master"
        }
    }

.. textOnly::
    Ainsi, composer installera pour vous les deux bibliothèques et générera un fichier ``autoload.php``
    que vous pourrez directement utiliser pour profiter des composants:

.. discover::

    .. slideOnly::
        -------------------

    .. code-block:: no-highlight

        $ composer.phar install

        Loading composer repositories with package information
        Installing dependencies
          - Installing gregwar/image (dev-master 38bfba2)
            Cloning 38bfba2fa6bea50317e29b469f2a2a8068eec3ba

          - Installing twig/twig (v1.11.1)
            Downloading: 100%

        Writing lock file
        Generating autoload files

.. slide::

TD 5
----

.. important::
    :doc:`tds/td5`


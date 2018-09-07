.. slide:: middleSlide

Les bases du PHP
================

.. slide::

Introduction: qu'est-ce que PHP?
------------------------------------

Présentation
~~~~~~~~~~~~

.. image:: /img/php.png
    :class: right

.. textOnly::
    **PHP** est l'acronyme récursif de **PHP: Hypertext Preprocessor**, datant
    de *1994*. Il a été largement conçu et pensé pour réaliser des sites webs. 
    Cependant, c'est avant tout un langage de programmation et de scripting. 

.. slideOnly::
    * **PHP**: PHP, Hypertext Preprocessor
    * Un langage de programmation avant tout

.. discover::
    **PHP** est :

    .. discoverList::
    * Interprété
    * Faiblement typé	
    * Multi paradigmes (impératif, objet, fonctionnel etc.)
    * Libre et gratuit
    * Très répandu sur le marché
    * Doté d'un grand jeu d'extensions et de bibliothèques

.. slide::

Histoire
~~~~~~~~

**Le web en 1993 (C)**

.. center::
    .. image:: img/web_in_c.png

.. slide:: 

**PHP 1**

.. center::
    .. image:: img/php_1994.png

.. textOnly::
    PHP (à l'origine Personal Home Pages) est inventé pour rendre l'écriture de pages web plus facile, le langage
    ressemble alors plus à un langage de templates

.. slide::

**Rasmus Lerdorf (@rasmus)**

.. center::
    .. image:: /img/rasmus.jpg

.. textOnly::
    Il est le créateur de **PHP**. Son approche du développement est très
    pragmatique. 

.. important::

    *«I've never thought of PHP as more than a simple tool to solve problems.»*

.. slide::

**Fabien Potencier (@fabpot)**

.. center::
    .. image:: /img/potencier.jpg

.. textOnly::
    C'est le fondateur de *SensioLabs*, entreprise responsable du framework
    Symfony, Silex, de Twig et bien d'autres.

    C'est un français, et l'un des membres les plus célèbres de la communauté
    PHP à ce jour.

.. slide::

Prérequis
~~~~~~~~~

Avant d'aller plus loin, nous considérerons que vous avez des connaissances
en web, notamment en **HTML**, **CSS** et **JavaScript**.

.. discover::
    Il est également nécessaire d'avoir des connaissances en programmation impératives (variables,
    structures de contrôle, fonctions etc.).

.. discover::
    Il est très grandement conseillé d'avoir déjà fait de la
    programmation orientée objet.

.. discover::
    En ce qui concerne le **PHP**, aucun prérequis n'est nécessaire.

.. slide::

Installation et utilisation
-------------------------------

Introduction
~~~~~~~~~~~~

Le langage **PHP** est très largement utilisé pour réaliser des sites webs,
il a même été conçu pour cela.

Dans un premier temps, nous allons nous intérésser au langage en lui même, sans
faire de web en particulier.

.. slide::

Installation de l'interpréteur
----------------------------------

L'ensemble de la documentation et des fichiers binaires de **PHP** peuvent
être trouvés sur le site officiel `php <http://php.net>`_ .

Sous linux, vous trouverez l'interpreteur **PHP** dans les dépôts **apt** :

.. code-block:: no-highlight
    php-cli - command-line interpreter for the php5 scripting language

Sous windows, vous trouverez les binaires à l'adresse suivante: 
`http://windows.php.net/download/ <http://windows.php.net/download/>`_

.. slide::

Hello world!
~~~~~~~~~~~~

.. discover::
    Il est possible de faire un hello world simplement::

        Hello world !

.. discover::
    Ou encore en PHP brut::

        <?php

        echo "Hello world !\n";

.. discover::
    Ou en version mixte::

        Hello <?php echo 'world'; ?> !


.. textOnly::
    Comme vous le voyez, l'interpreteur **PHP** n'évalue que le code délimité
    par les balises **<?php** et **?>**, tout le reste est envoyé
    directement sur la sortie standard. 
    Ceci est assez pratique pour réaliser rapidement des "**templates**", sortes
    de textes à trou dans lesquels le code vient s'insérer

.. slide::

Utilisation
~~~~~~~~~~~

Pour utiliser l'interpreteur **PHP**, utilisez simplement la commande ``php``
dans votre terminal:

.. discover::
    ::

        $ cat hello_world.php
        <?php

        echo "Hello world!\n";

        $ php hello_world.php
        Hello world!
        $ 

.. discover::
    Il est également possible d'utiliser **PHP** en mode interactif pour réaliser
    des tests, à l'aide de la commande ``php -a``.

.. textOnly::
    Utiliser l'interpréteur peut être très utile, il peut vous servir à faire des
    tests simplement en écrivant des scripts directement. A terme, vous pourrez également
    utiliser **PHP** comme langage de script, ce qui peut vous faire gagner du
    temps pour manipuler des fichiers, automatiser des tâches etc.

    Dans ce chapitre, nous allons étudier le fonctionnement du langage. Nous parlerons
    alors dans le chapitre suivant de comment se fait la liaison avec le web et notamment 
    le protocole **HTTP**.

.. slide::

.. image:: /img/terminal.png
    :class: right

.. slideOnly::
    Utilisation (suite)
    ~~~~~~~~~~~~~~~~~~~

    Utiliser l'interpréteur peut servir à :

    * Faire des tests (pratique pour découvrir le langage)
    * Utiliser PHP comme langage de script

    Dans cette partie, nous utiliserons uniquement l'interpréteur en ligne de commande.

.. slide::

Présentation du langage
---------------------------

Exemple basique
~~~~~~~~~~~~~~~

**PHP** est faiblement typé::

    <?php
    // Les variables sont préfixées par $
    // Il n'y a pas de typage explicite de $a
    $a = 12; // entier
    $a = 'hello'; // chaîne

    // On peut tester l'existence d'une
    // variable à l'exécution
    if (isset($a)) {
        echo $a . "\n"; // hello
    }

    // . est l'opérateur de concaténation
    // + donnera toujours une réponse numérique
    echo ('1'+'1') . "\n"; // 2


.. textOnly::
    Les variables se préfixent par le symbole ``$`` et ne sont pas typées explicitement, comme
    ci-dessus, ``$a`` peut contenir aussi bien un entier qu'une chaîne. Son type
    change en pleine exécution.

    Du fait que **PHP** soit interprété, les variables, fonctions ou classes ne sont
    connues qu'au moment de l'exécution (pas de phase de compilation).
        
    Il est de ce fait possible de tester l'existence d'une variable au moment de l'exécution
    à l'aide de la fonction ``isset();``
        
    L'opérateur de concaténation est le ``.``, le ``+`` étant réservé
    exclusivement pour les opérations mathématiques.

.. _arrays:

.. slide::

Les tableaux
~~~~~~~~~~~~

Les ``array`` (``[]``) en **PHP** permettent de faire de nombreuses choses::

    <?php
    // Le type array en PHP est particulier, il
    // peut être utilisé pour stocker une série de
    // valeurs ordonées :
    $nombres = [4, 8, 15, 16, 23, 42];

    echo 'Il y a ' . count($nombres) . " nombres\n";
    // Il y a 6 nombres

    // Ou des associations clé/valeur
    $couleurs = ['pomme' => 'verte',
        'fraise' => 'rouge'];

    echo 'La pomme est ' . $couleurs['pomme'] . "\n";
    // La pomme est verte


.. textOnly::
    On peut en effet les utiliser afin de stocker une suite de valeurs ordonnées et
    accessibles grâce à la notation ``[]``. Il est possible de connaître la taille
    d'un tableau à l'aide de la fonction **PHP** ``count()``.

    Avec cette même structure de donnée, il est également possible de créer des tableau
    **associatifs**, qui font correspondre des clés avec des valeurs.

.. slide::

.. slideOnly::
    Les tableaux (suite)
    ~~~~~~~~~~~~~~~~~~~~

Un tableau peut bien entendu contenir des sous-tableaux::

    <?php

    // Les points A, B et C avec leurs
    // coordonnées
    $points = [
        'A' => [12.2, 3.1],
        'B' => [0, 32],
        'C' => [99, -1],
    ];

.. textOnly::
    Ce type peut donc être utilisé à de nombreuses fins et permet de mettre rapidement en place
    des données structurées, indexées et facile d'accès.

.. slide::

.. slideOnly::
    Les tableaux (suite)
    ~~~~~~~~~~~~~~~~~~~~

Il est possible d'utiliser ``isset()`` pour tester la présence d'une clé,
``unset()`` pour enlever une clé::

    <?php
    // Création du tableau a
    $a = ['x' => 123];

    // Ajout
    $a['y'] = 456;
    
    // Vérification
    isset($a['x']); // Vrai
    isset($a['z']); // Faux

    // Suppression de y
    unset($a['y']);

.. slide::

.. slideOnly::
    Les tableaux (suite)
    ~~~~~~~~~~~~~~~~~~~~

De même pour les tableaux non associatifs::

    <?php
    // Création du tableau a
    $a = [1, 2, 3];

    // Ajout
    $a[] = 4;
    
    // Taille
    echo count($a)."\n";

    // Suppression
    array_shift($a);
    array_pop($a);

.. slide::

Les structures de contrôles
~~~~~~~~~~~~~~~~~~~~~~~~~~~

**PHP** comporte les structures classiques::

    <?php

    if ($a < 1) {
        // Faire quelque chose
    } else {
        // Faire autre chose
    }

    $x = 0;
    while ($x < 10) {
        // $x de 0 à 9
        $x++;
    }

    for ($i=0; $i<10; $i++) {
        // $i de 0 à 9
    }

.. slide::

Valeur null
~~~~~~~~~~~

**PHP** propose une valeur spéciale ``null``, qu'il ne faut pas confondre
avec ``false``, ni avec l'absence même de définition d'une variable::

    <?php

    // Mauvais: lève une erreur (notice)
    // car a est non indéfini
    if ($a != null) {
        //...
    }

    $a = null;

    // isset() teste si une variable est
    // définie ET qu'elle est différent
    // de null
    if (isset($a)) {
    }

.. slide::

Comparaison
~~~~~~~~~~~

**PHP** propose deux opérations de comparaisons, avec ``==`` et ``!=``
ou avec ``===`` et ``!==``. Les ``==`` comparent les variables sans
prendre en compte le type, alors que ``===`` le prend en compte::

    <?php

    if (0 == null) {
        echo "0 == null!\n";
    }

    if (0 === null) {
        echo "0 === null!\n";
    }

.. textOnly::
    En fait, les valeurs ``""``, ``null``, ``false`` ou encore ``0``
    sont par exemple équivalentes en comparaison laxiste, mais pas en strict.

    En utilisant ``===`` ou ``!==``, les types des valeurs seront également comparés.

.. slide::

Le switch/case
~~~~~~~~~~~~~~

**PHP** comporte également le ``switch()/case``::

    <?php

    switch ($i) {
    case 0:
        echo "i vaut zéro\n";
        break;
    case 1:
    case 2:
        echo "i vaut un ou deux\n";
        break;
    default:
        echo "i n'est pas égal à 0, 1 ou 2\n";
    }

.. textOnly::
    Notons que sans le mot clé ``break`` le code continue de s'exécuter entre deux
    cases (comme dans les cas ``1`` et ``2`` ci-dessus).

.. slide::

Break et continue
~~~~~~~~~~~~~~~~~

Il est possible d'utiliser ``break`` et ``continue`` (qui servent
respectivement à sortir d'une boucle ou à passer à l'élément suivant)::

    <?php

    $x = 0;
    while (true) {
        if ($x == 30) {
            break;
        }
        $x++;
    }

    echo "x=$x\n"; // x=30

    for ($i=0; $i<100; $i++) {
        if ($i == 50) {
            continue;
        }

        // Tous les $i sauf 50
    }


.. textOnly::
    Il est aussi possible d'utiliser ces mots clés suivi d'un entier numérique
    qui permet de définir de combien de structure imbriqué l'on souhaite sortir ou
    passer à l'itération suivante.

.. slide::

Itérations avec foreach
~~~~~~~~~~~~~~~~~~~~~~~

Pour faciliter l'itération des tableaux, **PHP** propose la structure de contrôle
``foreach()``::

    <?php

    $competences = ['html', 'css', 'js'];

    echo "Mes compétences:\n";

    // Itère sur un tableau
    foreach ($competences as $competence) {
        echo "* $competence\n";
    }

    // Ajoute un élément au tableau
    $competences[] = 'php';

.. textOnly::
    Cette méthode permet de faciliter le parcours dans les tableaux, qui est fastidieux
    lorsqu'il emploi une boucle ``for`` par exemple. Nous verrons plus tard qu'il est
    également possible de créer ses propres objets itérables à l'aide de ``foreach``.

.. slide::

Itérations avec modification
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

A l'aide de la notation de référence ``&``, **PHP** vous permet d'itérer
sur un tableau tout en modifiant la valeur de son contenu::
   
    <?php

    $noms = ['eric cartman', 'stan march',
        'kyle broflovski', 'kenny mccormick'];

    // Affiche le contenu de la variable
    var_dump($noms);

    // Itère en modifiant
    foreach ($noms as &$nom) {
        $nom = ucwords($nom);
    }

    // Les noms et prénoms auront leurs
    // majuscules
    var_dump($noms);

.. slide::

Itérations clé/valeur
~~~~~~~~~~~~~~~~~~~~~

En utilisant ``$key => $value``, nous pouvons itérer sur la clé **et**
la valeur en même temps::

    <?php

    $sigles = [
        'PHP' => 'Hypertext Preprocessor',
        'JS' => 'JavaScript',
        'HTML' => 'HyperText Markup Language',
    ];

    // Itère à travers les clés et valeurs
    foreach ($sigles as $sigle => $signification) {
        echo "$sigle veut dire $signification\n";
    }

.. slide::

Fonctions
~~~~~~~~~

**PHP** vous permet de définir des fonctions::

    <?php

    /**
     * Retourne vrai si $x est pair
     */
    function isEven($x)
    {
        return ($x%2) == 0;
    }

    if (isEven(2)) {
        echo "2 est pair !\n";
    }


.. textOnly::
    La fonction suivante prend en paramètre ``$x`` et retourne vrai si il est 
    pair. Le mot clé ``return`` peut être utilisé pour retourner une valeur ou sortir
    d'une fonction qui ne retourne pas de valeur. Notons encore l'absence totale de typage,
    la fonction ``isEven()`` ne fournit aucune indication sur son type de retour
    ou de paramètres.

.. slide::

Fonctions (exemple plus avancé)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Voici un exemple plus avancé qui utilise deux concepts introduits dans **PHP 5.3**::

    <?php

    /**
     * Appel la fonction de retour si $x
     * est pair
     */
    function ifIsEven($x, Closure $callback)
    {
        if (($x%2) == 0) {
            $callback();
        }
    }

    ifIsEven(2, function() {
        echo "2 est pair!\n";
    });


.. textOnly::
    Ici, une fonction **anonyme** est utilisée, elle est passée en paramètre à la fonction
    ``ifIsEven`` qui peut l'appeler comme une fonction normale via ``$callback()``.
    Ce système est extrêmement utile dans le cas de programmation événementielle par exemple, on pourra
    manipuler des références de fonctions comme des variables "normales", et les placer dans des tableaux
    ou des attributs de classe.
        
    De plus, le type du paramètre ``$callback`` est précisé à **PHP**, c'est ce que l'on
    appelle le **type hinting**, ou indication de type. Ainsi, l'interpréteur provoquera une erreur dans
    le cas ou le paramètre serait du mauvais type, ce qui peut permettre d'éviter les erreurs. Le type utilisé
    est ``Closure`` et correspond au type des fonctions anonymes.

.. slide:: darkSlide fullSlide slideOnly codeLeft

::

    <?php
    // PHP 5.4
    $actions = [ 
        'sayHello' => function() {
            echo "Hello!\n";
        },  
        'quit' => function() {
            die("Quitting\n");
        }   
    ];

    $toDo = ['sayHello', 'quit'];
    foreach ($toDo as $task) {
        $actions[$task]();
    }


.. slide::

Inclusion de fichier
------------------------

Les fonctions include et require
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Il est possible d'inclure un autre fichier dans un script **PHP**, à l'aide des fonctions ``include()``
et ``require()``::

    <?php

    /**
     * Incluera le contenu de security.php
     * provoque une erreur fatale en cas d'erreur
     */
    require_once('security.php');

    /**
     * Incluera le contenu du fichier 
     * math.php, ne provoque qu'un warning
     * en cas d'erreur
     */
    include_once('math.php');


.. textOnly::
    Dans le cas de ``include``, si le fichier inclus n'existe pas, seul un warning sera levé par l'interpreteur,
    tandis que dans le cas de ``require``, une erreur fatale arrêtera l'exécution du script.

    **PHP** étant interprété, il est possible d'inclure des fichiers dont le nom est connu de manière dynamique,
    en faisant attention à la provenance du dit fichier. En effet, le fichier inclus sera évalué par l'interpréteur et 
    peut exécuter du code sur la machine qui l'exécute.

.. slide::

Quelques constantes utiles
~~~~~~~~~~~~~~~~~~~~~~~~~~

**PHP** met à notre disposition des `constantes magiques <http://fr.php.net/manual/en/language.constants.predefined.php>`_
qui peuvent s'avérer très utiles pour l'inclusion:

+------------------+----------------------------------+
| **Nom**          |  **Utilité**                     |
+------------------+----------------------------------+
| ``__DIR__``      |  Le répértoire du script actuel  |
+------------------+----------------------------------+
| ``__FILE__``     |  Le fichier du script actuel     |
+------------------+----------------------------------+
| ``__LINE__``     |  La ligne actuelle dans le script|
+------------------+----------------------------------+
| ``__FUNCTION__`` |  Le nom de la fonction actuelle  |
+------------------+----------------------------------+

.. slide::

Problèmes liés à l'inclusion
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Lors de l'inclusion d'un fichier, la fonction ``include`` (ou ``require``) va chercher à plusieurs endroits
(dans le ``include_path``, dans le dossier du script qui include, dans le dossier de travail, etc.)

.. discover::
    Pour clarifier son comportement, il est généralement recommandé d'utiliser ``__DIR__`` pour désigner un répértoire relatif au
    répértoire actuel::

        <?php

        /**
         * Inclus le fichier math.php qui se situe dans
         * le même répértoire que celui du script
         *
         * Permet d'éviter les ambiguités
         */
        include_once(__DIR__.'/math.php');

.. Sondages

.. slide:: slideOnly

::

        // Qu'est-ce qui sera affiché?
        echo '1'+1;

.. poll::

* Affiche ``11``
* Affiche ``2``
* Provoque une erreur

.. slide:: slideOnly

::

    // Que fait ce code?
    echo 'a'+1;

.. poll::

* Affiche ``a1``
* Affiche ``b``
* Affiche ``1``
* Affiche ``0``
* Provoque une erreur

.. slide:: slideOnly

::

    // Vrai ou faux?
    if ('123' == 123) {
    }

.. poll::

* Vrai
* Faux

.. slide:: slideOnly

::

    $a = [17, 42, 23 87, 12];
    // Que faut t-il mettre à la place
    // des ??? pour afficher 42?
    echo $a[???];

.. poll::

* 0
* 1
* 2
* 42

.. slide:: slideOnly

::

    // Vrai ou faux?
    if (-12 !== '-12') {
    }

.. poll::

* Vrai
* Faux

.. slide:: slideOnly

::
    
    // Vrai ou faux?
    if (0 == 'foo') {
    }

.. poll::

* Vrai
* Faux

.. slide:: slideOnly

::

        $tab = [1, 2, 3];
        for ($i in $tab) {
            echo $i;
        }

.. poll::

* Affiche les nombres 1, 2, 3
* Provoque une erreur

.. slide:: slideOnly

::
    
        // Comment afficher ces noms?
        $tab = [
            'Jack' => 'Bauer',
            'Allison' => 'Taylor',
        ];
        // A)
        foreach ($tab as $f => $l) echo $f.' '.$l;
        // B)
        foreach ($tab as $f, $l) echo $f.' '.$l;
        // C)
        foreach ($tab as $v) echo $v[0].' '.$v[1];

.. poll::

* Solution A
* Solution B
* Solution C

.. slide:: slideOnly

::

    $tab = [];
    $tab[3] = 8;
    $tab[1] = 3;
    $tab[8] = 12;
    $tab[2] = 4;
    echo $tab[$tab[$tab[1]]];

.. poll::

* Affiche ``8``
* Affiche ``3``
* Affiche ``12``
* Provoque une erreur

.. slide:: slideOnly

::

    $tab = [];
    for ($i=0; $i<100; $i++) {
        $tab[$i] = $i*$i;
    }
    echo $tab[$tab[10]];

.. poll::

* Affiche ``100``
* Affiche ``10000``
* Provoque une erreur

.. slide:: slideOnly

::

    $tab = [
        [12, 13], [2 => [3, [42], [3]], 42 => 3], -1
    ];

Quelle solution vaut ``42``?

.. poll::

* ``$tab[1][0][1][2]``
* ``$tab[0][1][2][1]``
* ``$tab[1][1][0]``
* ``$tab[1][2][1][0]``

.. TD

.. slide::

.. redirection-title:: tds/td1

TD 1
----

.. toctree::

    tds/td1

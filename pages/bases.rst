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
    de 1994. Il a été largement conçu et pensé pour réaliser des sites webs. 
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
        * Doté d'un grand jeu d'extension et de bibliothèques


.. slide::

Prérequis
~~~~~~~~~

Avant d'aller plus loin, nous considérerons que vous avez des connaissances
en web, notamment en **HTML**, **CSS** et **JavaScript**. Il est également
nécessaire d'avoir des connaissances en programmation impératives (variables, 
structures de contrôle, fonctions etc.). Il est préférable d'avoir déjà fait de la 
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

Dans un premier temps, nous allons nous intérésser au langage en lui même ainsi
qu'à ses particularités.

.. slide::

Installation de l'intérpreteur
----------------------------------

L'ensemble de la documentation et des fichiers binaires de **PHP** peuvent 
etre trouvés sur le site officiel `php <http://php.net>`_ .

Sous linux, vous trouverez l'interpreteur **PHP** dans les dépôts **apt** :

.. code-block:: txt
    php5-cli - command-line interpreter for the php5 scripting language

Sous windows, vous trouverez les binaires à l'adresse suivante: 
`http://windows.php.net/download/ <http://windows.php.net/download/>`_

.. slide::

Hello world!
~~~~~~~~~~~~

Il est possible de faire un hello world simplement::

    Hello world !

.. discover::
    Ou encore en PHP brut::

        <?php

        echo "Hello world !\n";

.. discover::
    Ou en version mixte::

        <?php 

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

.. code-block:: txt

    $ cat hello_world.php
    <?php

    echo "Hello world!\n";

    $ php hello_world.php
    Hello world!
    $ 

Il est également possible d'utiliser **PHP** en mode interactif pour réaliser
des tests, à l'aide de la commande ``php -a``.

.. textOnly::
    Utiliser l'intérpréteur peut être très utile, il peut vous servir à faire des
    tests simplement en écrivant des scripts directement. A terme, vous pourrez également
    utiliser **PHP** comme langage de script, ce qui peut vous faire gagner du
    temps pour manipuler des fichiers, automatiser des tâches etc.

    Dans ce chapitre, nous allons étudier le fonctionnement du langage. Nous parlerons
    alors dans le chapitre suivant de comment se fait la liaison avec le web et notamment 
    le protocole **HTTP**.

.. slide::

.. slideOnly::
    Utilisation (suite)
    ~~~~~~~~~~~~~~~~~~~

Utiliser l'intérpréteur peut servir à :

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
    // les variables sont préfixées par $
    // $a n'est pas typé
    $a = 12; // entier
    $a = 'hello'; // chaîne

    // On peut tester l'existence d'une
    // variable à l'éxécution
    if (isset($a)) {
        echo $a . "\n"; // hello
    }

    // . est l'opérateur de concaténation
    // + donnera toujours une réponse numérique
    echo ('1'+'1') . "\n"; // 2


.. textOnly::
    Les variables se préfixent par le symbole ``$`` et ne sont pas typées, comme
    ci-dessus, ``$a`` peut contenir aussi bien un entier qu'une chaîne. Son type
    change en pleine exécution.

    Du fait que **PHP** soit intérprété, les variables, fonctions ou classes ne sont
    connues qu'au moment de l'éxécution (pas de phase de compilation).
        
    Il est de ce fait possible de tester l'éxistence d'une variable au moment de l'éxécution
    à l'aide de la fonction ``isset();``
        
    L'opérateur de concaténation est le ``.``, le ``+`` étant réservé
    exclusivement pour les opérations mathématiques.

.. slide::

Les tableaux
~~~~~~~~~~~~

Les ``array()`` en **PHP** permettent de faire de nombreuses choses::

    <?php
    // Le type array() en PHP est particulier, il
    // peut être utilisé pour stocker une série de
    // valeurs ordonées :
    $nombres = array(4, 8, 15, 16, 23, 42);

    echo 'Il y a ' . count($nombres) . " nombres\n";
    // Il y a 6 nombres

    // Ou des associations clé/valeur
    $couleurs = array('pomme' => 'verte',
        'fraise' => 'rouge');

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
    $points = array(
        'A' => array(12.2, 3.1),
        'B' => array(0, 32),
        'C' => array(99, -1),
    );

.. textOnly::
    Ce type peut donc être utilisé à de nombreuses fins et permet de mettre rapidement en place
    des données structurées, indexées et facile d'accès.

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
ou avec ``===`` et ``!==``, qui sont respectivement "laxiste" et "strictes"::

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
    Notons que sans le mot clé ``break`` le code continue de s'éxécuter entre deux
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

    for ($i=0; $i=100; $i++) {
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

    $competences = array('html', 'css', 'js');

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

A l'aide de la notation de référence ``&amp;``, **PHP** vous permet d'itérer
sur un tableau tout en modifiant la valeur de son contenu::
   
    <?php

    $noms = array('eric cartman', 'stan march',
        'kyle broflovski', 'kenny mccormick');

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

    $sigles = array(
        'PHP' => 'Hypertext Preprocessor',
        'JS' => 'JavaScript',
        'HTML' => 'HyperText Markup Language',
    );

    // Itère à travers les clés et valeurs
    foreach ($sigles as $sigle => $signification) {
        echo $sigle . " veut dire $signification\n";
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
    ``ifIsEven`` qui peut l'apeller comme une fonction normale via ``$callback()``.
    Ce système est extrèmement utile dans le cas de programmation événementielle par exemple, on pourra
    manipuler des références de fonctions comme des variables "normales", et les placer dans des tableaux
    ou des attributs de classe.
        
    De plus, le type du paramètre ``$callback`` est précisé à **PHP**, c'est ce que l'on
    apelle le **type hinting**, ou indication de type. Ainsi, l'intérpréteur provoquera une erreur dans
    le cas ou le paramètre serait du mauvais type, ce qui peut permettre d'éviter les erreurs. Le type utilisé
    est ``Closure`` et correspond au type des fonctions anonymes.

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
    peut exécuter du code sur la machine qui l'éxécute.

.. slide::

Quelques constantes utiles
~~~~~~~~~~~~~~~~~~~~~~~~~~

**PHP** met à notre disposition des `constantes magiques <http://fr.php.net/manual/en/language.constants.predefined.php>`_
qui peuvent s'avérer très utiles pour l'inclusion:

================== ===================================
**Nom**            **Utilité**
================== ===================================
``__DIR__``        Le répértoire du script actuel
================== ===================================
``__FILE__``       Le fichier du script actuel
================== ===================================
``__LINE__``       La ligne actuelle dans le script
================== ===================================
``__FUNCTION__``   Le nom de la fonction actuelle
================== ===================================

.. slide::

Problèmes liés à l'inclusion
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Lors de l'inclusion d'un fichier, la fonction ``include`` (ou ``require``) va chercher à plusieurs endroits
(dans le ``include_path``, dans le dossier du script qui include, dans le dossier de travail, etc.)

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

.. slide::

TD
---

* :doc:`tds/td1`


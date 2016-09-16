.. slide:: middleSlide

Guide de conception
===================

.. slide::

Introduction
------------
    
Le **PHP** est un langage historique qui dispose désormais de nombreuses
possibilités. Cependant, un très lourd fardeau historique pèse sur cette technologie
qui est souvent critiqué par les développeurs le considérant comme trop permissif
et propice à l'écriture de mauvais code.

.. discover::
    Ce guide recence des règles de conception permettant d'écrire du code **PHP**
    moderne et de respecter les :doc:`bonnes pratiques <practices>`

.. slide::

.. warning::
    **Attention,** ce guide ne contient **pas** des conseils mais des règles
    **à respecter impérativement** dans toute conception récente de projet PHP. Ces
    règles seront prises en compte comme sèvère malus lors de mes évaluations de projets.

.. slide::

Utilisation de PHP
------------------

Short tags
~~~~~~~~~~

Les short tags (``<?`` et ``?>``) sont encore très
supportés mais ne **doivent pas être utilisés**

::

    Mauvais
    <? echo 'hello'; ?>

    Bon
    <?php echo 'hello'; ?>

.. slide::

Fermeture du tag ?>
~~~~~~~~~~~~~~~~~~~

Le tag de fermeture **PHP** (``?>``) ne doit **jamais être utilisé à
la fin d'un fichier PHP pur**, car il n'est pas nécessaire et ne peut être
source que d'erreur::

    <?php

    // PHP pur

    // Mauvais, car non nécessaire
    ?>(fin du fichier)

.. textOnly::
    Les fichiers ne contenant en effet que du **PHP** pur commencent bien entendu par
    ``<?php`` puis sont suivis du code, ils ne doivent alors pas se terminer par
    ``?>``, car ça n'est pas nécessaire et que l'ajout involontaire d'espaces
    ou de tabulation provoquerait l'envoi de caractère sur la sortie. Cette recommandation
    est soutenue par `php.net <http://php.net/manual/en/language.basic-syntax.phptags.php>`_.

.. slide::

Magic quotes
~~~~~~~~~~~~
    
Les magic quotes **sont obselètes et ne doivent pas être utilisés**. Ils sont d'ailleurs
inexistants depuis **PHP 5.4**.
    
Vous pouvez pour cela lire la page de manuel `PHP: Disabling magic quotes <http://php.net/manual/en/security.magicquotes.disabling.php>`_

* Voir le chapitre :doc:`Bonne pratiques, partie echappement <practices#escape>`

.. slide::

Organisation du code
--------------------

Inclusion
~~~~~~~~~
    
Dans un projet, les fonctions ``include()`` et ``require()`` ne **doivent pas
être utilisées**, à part pour charger l'autoloader::

    <?php
    // Mauvais, il FAUT utiliser l'autoloader
    include('classes/User.php');
    include('classes/Comment.php');
    include('classes/Admin.php');

    // Bon
    include('autoload.php');

* Voir le chapitre :doc:`POO, partie Autoloader <poo#autoloader>`

.. slide::

Nommage des fichiers
~~~~~~~~~~~~~~~~~~~~
    
L'utilisation d'un autoloader implique des règles à respecter pour nommer les fichiers
présents dans un projet. Cette norme est décrite par `PSR-0`_ et **doit être impérativement
respectée**.

.. _PSR-0: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md

.. textOnly::
    Pour résumer, si une classe se nomme ``A\B\C``, elle devra éventuelement selon
    son préfixe se trouver dans un dossier de source sous le nom ``A/B/C.php``.
    Ainsi, voici quelques exemples de correspondances:

* ``Gregwar\Example\Demo`` -> ``lib/Gregwar/Example/Demo.php``
* ``Gregwar\Something`` -> ``vendor/gregwar/Gregwar/Something.php``

.. textOnly::
    **Toutes les classes doivent être dans au moins un espace de nom et correspondent à exactement un fichier**.

.. slide::

Séparation des principes
~~~~~~~~~~~~~~~~~~~~~~~~

Le rendu (c'est à dire l'affichage de code HTML) et le requêtage MySQL **ne doivent jamais se mélanger**. Le
travail de requêtage doit se faire avant toute forme de rendu, et seul les opérations basiques sont tolérées dans les
vues::

    <ul>
    <?php 
    // Mauvais: une requête ne doit jamais
    // être réalisée dans une page
    $q = $pdo->query('SELECT * FROM users');
    foreach ($q as $r) { ?>
        <li><?php echo $r['login'] ?></li>
    <?php } ?>
    </ul>

Pour cela, le code peut suivre un principe comme par exemple MVC. 

* Voir le chapitre :doc:`Bonnes pratiques, partie MVC <practices#mvc>`

.. slide::

Templating en PHP
~~~~~~~~~~~~~~~~~

**PHP** peut être utilisé comme moteur de template pour les rendus, cependant, attention à **ne pas mettre de
logique dans vos pages**. Pour cela, vous pouvez restreindre les pages de rendu à des opérations simples d'affichage,
de tests et de parcous de tableaux::

    <!-- Pas bon, car cet exemple contient 
    de la logique -->
    <?php if (userExists($_GET['id'])) { ?>
        Bienvenue <?php echo userName($_GET['id']); ?>
    <?php } ?>

    <!-- L'utilisateur doit être obtenu par un 
    contrôleur puis passé à la template qui 
    ne fait que de l'affichage -->
    <?php if ($user) { ?>
        Bienvenue <?php echo $user->getName(); ?>
    <?php } ?>

.. textOnly::
    .. warning::
        Ce n'est pas parce que **PHP** est à la fois un langage de développement et un langage de template qu'il faut
        mélanger ces principes.

.. slide::

Standard de codage
~~~~~~~~~~~~~~~~~~

Tout projet **doit s'imposer un standard de codage et le respecter**. Un standard est définit par des règles, à
propos par exemple de:

* Le type de l'indentation (tabluations ou espaces? nombres d'espaces?)
* Le fait de retourner ou non à la ligne après un ``{``
* L'utilisation et le format des commentaires ``//`` ou ``/* */`` selon le contexte
* L'utilisation de la CamelCase (``theMagicFunction()``) ou des underscores (``the_magic_function()``)

.. discover::
    L'essentiel étant de rester cohérent et lisible. Afin d'éviter les polémiques stériles, je vous propose de suivre
    les standards `PSR-1`_ et `PSR-2`_.

.. _PSR-1: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
.. _PSR-2: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md

.. slide::

Standard de codage
~~~~~~~~~~~~~~~~~~

Il existe des outils nommés "Code Sniffer" permettant de détectet automatiquement les problèmes liés aux standards de codage 

.. discover::    
    Sensio propose un logiciel permettant de corriger automatiquement les standards de codages: `http://cs.sensiolabs.org/ <http://cs.sensiolabs.org/>`_

.. slide::

Base de données
---------------

Ancienne extension MySQL
~~~~~~~~~~~~~~~~~~~~~~~~
    
Les fonctions MySQL obselètes telles que ``mysql_connect()`` ou ``mysql_query()``
ne **doivent pas être utilisées**. Ces dernières sont fortement dépréciées et seront supprimées
dans un futur proche.

.. slide::

Préparation des requêtes
~~~~~~~~~~~~~~~~~~~~~~~~

Une requête SQL ne doit **jamais être construite par concaténation** de chaînes de caractères,
mais doit utiliser la préparation des requêtes::

    <?php
    $pdo = include('connection.php');

    // Mauvais: requête concaténée
    $pdo->query('SELECT * FROM users WHERE 
        age > '.$_GET['age']); 

    // Bon: reqûete préparée
    $sql='SELECT * FROM users WHERE age > :age'; 
    $query=$pdo->prepare($sql);
    $query->execute(['age' => $_GET['age']]);

* Voir le chapitre :doc:`Bonnes pratiques, partie injections SQL <practices#sqlinjection>`

.. slide::

Echappement
~~~~~~~~~~~

Les données stockées dans une base **ne doivent pas être échappées** par une fonction telle que
``htmlspecialchars()`` ou ``htmlentities()``. L'échappement doit être fait au moment
de l'affichage des données::

    <?php
    $pdo = include('connection.php');
     
    $insert = $pdo->prepare('INSERT INTO users 
            (firstname) VALUES (?)');

    // Mauvais
    $insert->execute(['firstname' =>
        htmlspecialchars($_GET['user'])]);

    // Bon, l'échappement doit avoir lieu 
    // plus tard au moment de l'affichage
    $insert->execute(['firstname' =>
        $_GET['user']]);

.. textOnly::
    En effet, l'échappement HTML correspond au rendu, et les données stockées dans la base doivent rester
    le plus possible découplées du système de rendu quel qu'il soit. Imaginez que votre base soit utilisée avec
    une application lourde ou par des scripts, vous seriez alors obligés de des-échapper les valeurs HTML.

.. slide::

Les formulaires
---------------

Vérification coté serveur
~~~~~~~~~~~~~~~~~~~~~~~~~

Une application **ne doit jamais faire confiance** aux données saisies par un utilisateur et toujours
vérifier leur intégrité côté serveur. Notamment:

.. discoverList::
* La valeur d'un ``<select>`` doit être parmi les options proposées
* Le format d'une adresse e-mail doit être vérifié même si l'input est en HTML5 et vérifie
coté client son intégrité
* Les champs ``hidden`` qui ont été créé pour le transport d'information doivent
bien entendu être vérifiés

.. slide::

Protection CSRF
~~~~~~~~~~~~~~~

Tous les formulaires **doivent être sécurisés contre CSRF**. Ils doivent pour cela contenir un jeton CSRF
qui permettra par la suite de vérifier qu'il a bien été posté en passant par le formulaire en question. 

* Voir le chapitre :doc:`Bonnes pratiques, partie CSRF <practices#csrf>`

.. slide::

Programmation orientée objet
----------------------------

Utilisation de l'objet
~~~~~~~~~~~~~~~~~~~~~~

Afin de respecter l'organisation du code et de tirer le plus de profit de l'autoloader, le code
d'un projet **doit être exclusivement dans des classes**. A l'exception du script "frontal" qui
construit les objets pour lancer l'application.

.. slide::

Mot clé ``var``
~~~~~~~~~~~~~~~

Le mot clé ``var`` ne **doit être utilisé sous aucun pretexte**, il s'agit d'une
compatibilité avec les anciennes versions de PHP. Un mot clé de portée, tel que ``public``,
``protected``, ou ``private`` doit être utilisé à la place::

    <?php

    class A {
        // Mauvais: var est obselète
        var $x;
        // Bon
        public $x;
    }

.. slide::

Utilisation du type hinting
~~~~~~~~~~~~~~~~~~~~~~~~~~~

Les indications de type **doivent être impérativement données** lorsque cela est possible, c'est
à dire pour les ``array`` et tout autre type non basique.
    
Si des objets variés peuvent être passés en paramètre d'une fonction, il faut impérativement étudier
la possibilité de créer une interface alors implémentée afin de l'ajouter au type hinting de cette fonction.

* Voir le chapitre :doc:`POO, partie Type Hinting <poo#typehinting>`    

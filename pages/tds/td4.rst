TD4
===

.. image:: /img/db.png
    :class: right

.. important::
    `Télécharger l'archive td4.zip <../files/td4.zip>`_

Compréhension
-------------

.. step::
    Commencez par installer et tester l'application. Vous devrez tout d'abord installer la base
    de données disponible dans le fichier ``sql/database.sql``, puis modifier le fichier
    ``index.php`` pour que les paramètres de connexion soient corrects.

    Pour installer l'application, utilisez soit composer::

        composer.phar install

    Ou alors décompressez le dossier ``vendor`` qui est fourni dans ``vendor.tgz``.

.. step::
    #-. L'autoloader
    ~~~~~~~~~~~~~~~~

    L'autoloader utilisé ici est celui de composer. A quoi sert la ligne suivante?

    ::

        $loader->add('', 'src');

.. step::
    #-. Le routeur
    ~~~~~~~~~~~~~

    Observez le fonctionnement des appels à ``match()``.

    Le routeur du framework `Silex <http://silex.sensiolabs.org/>`_ a été réutilisé ici.
    Il permet de simplifier le routage des requêtes,
    ainsi que la génération des url à l'aide de la méthode ``path()``.

    Vous pouvez `consulter cette page <http://silex.sensiolabs.org/doc/usage.html>`_ pour
    plus d'informations.


.. step::
    #-. Modèle
    ~~~~~~~~~~

    Intéressez vous au code de la classe ``Cinema\Model``, à quoi sert t-elle? Pourquoi
    regrouper ces méthodes dans une classe?

.. step::

    #-. Système de templates
    ~~~~~~~~~~~~~~~~~~~~~~~~
    
    Ici, `Twig <http://twig.sensiolabs.org/>`_ est utilisé pour le rendu des templates.
    Observez comment ``layout.html.twig`` est définit et comment son block ``content``
    est surchargé dans les pages filles telles que ``film.html.twig``.

    Regardez de plus près l'utilisation de la méthode ``render()``, quel est le rôle des
    variables qui lui sont passées ?

(Rétro) Conception
------------------

.. step::
    A partir de la base de données fournies, dessinez le schéma entité-association de
    la base de données fournie.

    .. note::
        Notes:

        * Attention aux cardinalités
        * Le nombre de table n'est pas forcément égal au nombre d'entités

Ecriture de requête/code
------------------------

.. image:: /img/movie.png
    :class: right

.. step::
    #-. Casting d'un film
    ~~~~~~~~~~~~~~~~~~~~~

    En écrivant le code de la méthode ``getCasting()`` du modèle, écrivez une requête récupérant
    les acteurs jouant dans un film (prénom, nom et image).

    .. note::
        Conseil: vous pouvez utiliser un otuil tel que **phpMyAdmin** pour réaliser vos requêtes
        et les essayer sur un exemple avant de les placer dans le code et de les rendre dynamique

    ::

        <?php
        // Attention, vous DEVEZ préparer vos requêtes
        // Ne faites SURTOUT PAS ce genre de choses:
        $sql = 'SELECT * FROM users WHERE name='.$name; // MAUVAIS
 
.. step::
    #-. Formulaire d'ajout de critique
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Les films peuvent être critiqué, complétez le code de gestion de l'URL ``/film/{id}`` de manière
    à enregistrer les critiques valides dans la base de données, n'oubliez pas de passer par le modèle.

.. step::
    #-. Rendu des critiques
    ~~~~~~~~~~~~~~~~~~~~~~~

    Modifier de nouveau le code pour que les critiques soient récupérées de la base de données
    puis affichées dans la page sous le film.

.. step::
    #-. Classement des films
    ~~~~~~~~~~~~~~~~~~~~~~~~

    Ajouter au menu "Meilleurs films" et créez une page affichant le classement des films les mieux notés,
    c'est à dire ayant la meilleure note moyenne.

.. step::

    #-. Affichage des films par genre
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Remarquez qu'il est possible de consulter le nombre de films par genre, mais pas de voir la 
    liste des films d'un genre.

    Rendez cliquable la ligne de chaque genre sur la page ``/genres`` et faites apparaître
    la liste des films étant dans le genre concerné.

.. step::
    #-. Formulaire d'ajout de film
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Créez une page "Ajout de film" servant à ajouter un film à la base. Il doit être possible de définir:

    * Le nom du film
    * Sa description
    * Son année
    * Son genre, parmi les genres de la base de données
    * Les acteurs qui y jouent (dans la base de données), et les roles qu'ils y occupent

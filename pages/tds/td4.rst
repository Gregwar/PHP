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

.. step::
    #-. Un autoloader générique
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Ici, l'*autoloader* est générique, c'est à dire que toutes les classes du dossier
    ``src/`` seront chargées, par exemple ``A/B/C.php`` sera inclus si l'on
    fait référence à la classe ``A\B\C``.

.. step::
    #-. Le routeur
    ~~~~~~~~~~~~~

    Le routeur du TD précédent a été réutilisé ici. Il permet de simplifier le routage des requêtes,
    ainsi que la génération des url à l'aide de la méthode ``generate``. Son utilisation est
    inspirée de micro-frameworks, tels que `Silex <http://silex.sensiolabs.org>`_. Observez
    la manière dont il est utilisé et dont il fonctionne. 

.. step::
    #-. Modèle
    ~~~~~~~~~~

    Intéressez vous au code de la classe ``Cinema\Model``, à quoi sert t-elle ? Pourquoi
    regrouper ces méthodes dans une classe?

.. step::

    #-. Système de template
    ~~~~~~~~~~~~~~~~~~~~~~~

    Regardez de plus près le fonctionnement de la méthode `render()`, quel est le rôle des
    variables qui lui sont passées ?

    Ici, **PHP** est utilisé comme un langage de programmation, mais aussi comme un 
    `système de templates <http://fr.wikipedia.org/wiki/Gabarit_%28mise_en_page%29>`_.

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

.. step::
    #-. Formulaire d'ajout de critique
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Les films peuvent être critiqué, complétez le code de gestion de l'URL ``/film/*`` de manière
    à enregistrer les critiques valides dans la base de données, n'oubliez pas de passer par le modèle.

.. step::
    #-. Rendu des critiques
    ~~~~~~~~~~~~~~~~~~~~~~~

    Modifier de nouveau le code pour que les critiques soient récupérées puis affichées dans la page sous
    le film.

.. step::
    #-. Classement des films
    ~~~~~~~~~~~~~~~~~~~~~~~~

    Ajouter au menu "Meilleurs films" et créez une page affichant le classement des films les mieux notés,
    c'est à dire ayant la meilleure note moyenne.

.. step::
    #-. Formulaire d'ajout de film
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Créez une page "Ajout de film" servant à ajouter un film à la base. Il doit être possible de définir:

    * Le nom du film
    * Sa description
    * Son année
    * Son genre, parmis les genres de la base de données
    * Les acteurs qui y jouent (dans la base de données), et les roles qu'ils y occupent

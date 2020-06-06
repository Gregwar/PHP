nD4
===

.. image:: /img/bd.png
    :class: right-illustration

.. |archive| image:: /img/archive.png

.. important::
    `|archive| Télécharger l'archive td4.zip </files/td4.zip>`_


.. step::

    Installation
    -----------

    Commencez par récupérer la base de données à partir de l'archive ci-dessus et par l'importer dans une base de données

Rappels de requêtage SQL
------------------------

Avant de commencer à utiliser le PDO avec PHP, nous allons effectuer des requêtes SQL "brutes" sur une base d'exemple.

Voici un diagramme représentant la base de données:

.. center::
    .. image:: /img/bdd_store.png

Elle contient les informations suivantes:

* ``categories`` les catégories de produits représentées par leur nom ``name``
* ``products`` les produits ayant un nom ``name``, un prix ``price`` et faisant partie d'une unique catégorie
* ``users`` les utilisateurs ayant un prénom ``firstname`` et un nom ``lastname``
* ``tickets`` qui correspond au passage en caisse d'un utilisateur à une ``date`` donnée
* ``tickets_entry`` faisant correspondre un ticket avec les produits et les quantités ``quantity`` achetés par le client

Dans cette partie, vous pourrez tester les requêtes dans **phpMyAdmin**. N'oubliez pas de les conserver dans des fichiers texte par exemple.

.. image:: /img/store.png
    :class: right-illustration

.. step::

    Récupération des produits et de leur catégorie
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Ecrivez une requête permettant de récupérer l'ensemble des produits avec leur catégorie

.. step::

    Catégories et nombre de produits
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Ecrivez une requête permettant de récupérer l'ensemble des catégories ainsi que le nombre de produits de cette catégorie

.. step::

    Affichage des tickets
    ~~~~~~~~~~~~~~~~~~~~~

    Affichez l'ensemble des tickets, comprenant le nom de l'utilisateur et le prix correspondant au ticket (la somme des prix des produits multipliés par la quantité sur le ticket)

.. step::

    Meilleurs clients
    ~~~~~~~~~~~~~~~~~

    Affichez l'ensemble des utilisateurs, et l'argent qu'ils ont dépensé en tout par ordre décroissant

.. step::

    Argent par jour
    ~~~~~~~~~~~~~~~

    Afficher l'ensemble des jours, et en face la somme d'argent encaissé à cette date


.. step::

    Achats spéciaux
    ~~~~~~~~~~~~~~~

    Ecrivez une requête qui retourne l'ensemble des utilisateurs n'ayant jamais acheté une machine à café

Utilisation du PDO
------------------

.. step::

    Connexion
    ~~~~~~~~~

    Ecrivez un fichier PHP qui créé la connexion avec la base de données, par exemple::

        <?php
        // pdo.php
        try {
            return new PDO(
                'mysql:dbname=user;host=127.0.0.1',
                'user', 
                'pass'
            );
        } catch (PDOException $exception) {
            echo 'Erreur: '.$exception->getMessage()
                ."\n";
            exit(1);
        }
    
.. step::

    Lister les utilisateurs
    ~~~~~~~~~~~~~~~~~~~~~~~

    Vous pouvez maintenant importer le pdo et tester une requête simple, telle le listing des utilisateurs::

        <?php
        // users.php

        $pdo = include('pdo.php');

        // Utiliser le $pdo pour lister les utilisateurs (cf le cours)

.. step::

    Affichage des tickets d'un utilisateurs
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Faites en sorte que chaque utilisateur soit cliquable et mène à une autre page, par exemple ``tickets.php``,
    qui affiche l'ensemble des tickets de l'utilisateurs.

    Pour chaque ticket, qui sont à leurs tours cliquables, on affichera le détail,
    c'est à dire le nom du produit, la quantité ainsi que le prix.

.. step::

    Regroupement par catégories
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Modifiez le rendu d'un ticket afin que les produits soient regroupés par
    catégories.

.. step::

    Produits
    ~~~~~~~~

    Ajoutez une page ``produits.php`` qui liste les produits disponibles. Pour chaque
    produit, on pourra en cliquant dessus accéder à une autre page qui liste les
    tickets les plus récents contenant ce produit.

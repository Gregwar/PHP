TD noté DAWIN
=============

Présentation
------------

Archive
~~~~~~~

.. |archive| image:: /img/archive.png

.. important::
    `|archive| Télécharger l'archive shows.zip </files/shows.zip>`_

Consignes
~~~~~~~~~

Ce travail est à rendre sous forme de **dépôt**
git personnel (bitbucket, github ou le gitlab de l'université).

Ce travail est a réaliser **individuellement**. Cependant, vous êtes libres d'utiliser
des bibliothèques et des bundle pour réaliser les questions. Je vous recommande
même d'ailleurs d'y penser!

Vous avez jusqu'au **22 Janvier 2016** pour me le remettre.

Remarquez également que je n'évalue pas la forme, ne vous embêtez donc pas à faire
de la mise en page et du style, si les fonctionnalités sont là, vous aurez les
points correspondants.

Installation
~~~~~~~~~~~~

Premièrement, téléchargez et extrayez l'archive. Paramétrez ensuite votre connexion
à la base de données (dans ``app/config/parameters.yml``).

Installez ensuite les dépendances avec composer::

    php composer.phar install

Puis, installez la base de données avec doctrine::

    php bin/console doctrine:database:create

Et importez les données::

    php bin/console doctrine:database:import sql/shows.sql

Voici à quoi devrait ressembler le résultat (page "séries"):

.. center::
    .. image:: /img/shows.png
        :width: 800

Pour vous connecter en tant qu'administrateur, vous pouvez cliquer sur le lien
"Connexion admin" tout en bas de chaque page (``admin``/``pass``).

Questions
---------

.. step::
    #-) Ajout de la date
    ~~~~~~~~~~~~~~~~~~~~

    Vous constaterez que les dates de diffusion des épisodes sont stockés en base
    mais jamais affichées. Modifiez le code pour qu'elles soient affichées dans la
    fiche d'une série.

.. step::
    #-) Suppression des saisons
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Il n'est actuellement pas possible de supprimer une saison (seulement des épisodes,
    lorsque vous êtes identifiés en tant qu'administrateur).
    Modifiez le code pour le permettre. Attention, supprimer une saison doit également
    supprimer les épisodes correspondants.


.. step::
    #-) Recherche
    ~~~~~~~~~~~~~

    Implémentez la recherche pour la rendre fonctionnelle.

.. step::
    #-) Pagination des séries
    ~~~~~~~~~~~~~~~~~~~~~~~~~

    La liste des séries est assez longue, implémentez une pagination de manière à pouvoir
    séparer cet affichage en plusieurs pages (par exemple 6 séries par page)

.. step::
    #-) Prochaines parutions
    ~~~~~~~~~~~~~~~~~~~~~~~~

    Implémentez la page "Calendrier" pour afficher la liste des prochaines diffusions (de
    la plus proche à la plus éloignée à partir d'aujourd'hui)

.. step::
    #-) Import OMDB
    ~~~~~~~~~~~~~~~

    Lorsque vous êtes connectés en admin, il existe déjà une fonctionnalité nommé "import OMDB"
    qui propose d'effectuer une recherche à l'aide de l'API OMDB et du `bundle OMDbAPI <https://github.com/aharen/OMDbAPI>`_.

    Complétez cette fonctionnalité, de manière à ce qu'un clic sur la fiche d'une série ainsi
    trouvée permette de l'importer dans la base de données de votre application.



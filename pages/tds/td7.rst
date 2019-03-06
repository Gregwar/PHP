TD7 (Laravel)
===

Pour la réalisation de ce TD, nous allons créer un projet de zéro. Notre but est de réaliser une petite application pour répertorier les séries que nous suivons et suivre les épisodes.

.. slide::

Création de notre projet Laravel
--------------------------------

Pour découvrir toutes les étapes à réaliser lorsque l'on débute un nouveau projet en Laravel, nous n'allons pas partir d'une archive de base,
et créer tout nous-même. Rassurez-vous, Laravel va nous aider à *scaffolder* notre projet rapidement.

.. warning::
    
    Évitez le plus possible d'utiliser des logiciels comme **WAMP Server**,
    ou tout autre logiciel similaire qui sert l'application sous l'hôte ``http://localhost``.

    On essaie le plus possible de développer en "conditions réelles", et en production, l'application a son propre nom d'hôte.
    Il est donc souhaité d'avoir un nom d'hôte également en local.

    * **macOS** :
        * Utilisez `Laravel Valet <https://laravel.com/docs/5.7/valet>`_.

    * **Linux** :
        * Le mieux est certainement d'utiliser un `portage de Laravel Valet sous Linux <https://github.com/cpriego/valet-linux>`_.
        C'est un portage de la communauté, non reconnu officiellement mais qui semble stable.

        * Vous pouvez utiliser sinon Docker, Vagrant, ou une stack LAMP

    * **Windows** :
        * Ici aussi vaut mieux utiliser un `portage de Laravel Valet sous Windows <https://github.com/cretueusebiu/valet-windows>`_.

        * Les solutions Docker, Vagrant sont également à imaginer si nécessaire.

.. step::

    Création du projet via Composer
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    La création d'un projet Laravel se fait simplement via **Composer**. Il va se charger de récupérer la structure de base de Laravel,
    et va également installer les dépendences, et faire quelques initialisations comme créer un fichier ``.env`` par défaut,
    générer la clé secrète de l'application *(nous verrons plus tard à quoi elle sert)*, etc...

    Pour créer un nouvau projet Laravel, ouvrez un terminal et lancez la commande :

    .. code-block:: no-highlight
        composer create-project laravel/laravel td7

    Cela va créer un nouveau dossier ``td7`` avec notre projet vierge créé !

    Nous devons initialiser deux trois éléments avant de continuer : 

    .. code-block:: no-highlight
        $ cd td7 
        $ cp .env.example .env
        $ php artisan key:generate

    * Dans un premier temps nous copions le fichier .env.example pour créer le fichier ``.env``. Ce fichier contient toutes les variables propres à notre environnement (mode debug, accès à la BDD, etc...). Ce fichier ne doit pas être versionné !
    * Nous générons ensuite une clé de chiffrement utilisée pour chiffrer les mot de passe. Cette clé est automatiquement écrite dans le fichier ``.env`` sous la clé ``APP_KEY``.

    .. warning::

        Penser à modifier le fichier ``.env`` pour y renseigner les accès à votre base de données !
    
.. slide::
.. step::

    Accéder à notre projet
    ~~~~~~~~~~~~~~~~~~~~~~

    Si vous utilisez Laravel Valet, vous pouvez aller dans le dossier ``td7`` depuis un terminal et lancer la commande ``valet link td7``
    et votre projet sera accessible sur votre navigateur via ``http://td7.test``.

.. step::

Réalisation du projet
---------------------

Tout d'abord, nous allons exploiter ce que Laravel nous donne pour commencer rapidement un projet. Lancez les commandes suivantes : 

.. code-block:: no-highlight

    $ php artisan make:auth
    $ php artisan preset bootstrap

Remarquez ce que ces deux commandes ont changé dans votre projet.

.. step::

En effectuant la/les commande(s) nécessaire(s), faites en sorte que la table ``users`` soit créée dans votre BDD.

.. step::

Rendez-vous sur votre site, inscrivez-vous. Vous devirez pouvoir vous déconnecter et vous re-connecter.

.. step::

A vous de jouer ! 

Commencer par réaliser la vue pour gérer vos séries.

Vous aurez besoin de :

* Créer les routes nécessaires
* Créer les migrations pour votre table ``séries``
* Créer votre modèle ``Serie``
* Créer le contrôleur ``SeriesController``
* Ecrire les routes d'actions dans votre contrôleurs, avec les vues pour chaque.

.. step::

Une fois que vous avez votre gestion de séries, ajoutez de la même façon la gestion des saisons.

Chaque saison appartient à une série (donc une série possède plusieurs saisons).

Utilisez les `relations Eloquent <https://laravel.com/docs/5.7/eloquent-relationships>`_ pour cela.

.. step::

Faites de même pour les épisodes d'une saison.

.. step::

Modifiez votre modèle ``Episode`` pour préciser quel épisode a été vu ou non.

.. step::

Faites en sorte d'afficher sur la liste des saisons d'une série : 

* Le nombre d'épisodes vus
* Le nombre d'épisode total
* Le pourcentage de complétion (100% : saison vue entièrement)

Pour vous simplifier la tâche vous pouvez utiliser `des accesseurs <https://laravel.com/docs/5.7/eloquent-mutators#defining-an-accessor>`_ dans votre modèle `Season`, et les utiliser dans votre vue.
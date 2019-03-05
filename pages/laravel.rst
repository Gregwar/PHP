.. slide:: middleSlide

Laravel
=======

.. slide::

Présentation
------------

.. image:: /img/laravel.jpg
    :class: right

**Laravel** est un *framework* web, c'est à dire un outil très complet permettant
de réaliser des applications web.

.. discover::
    Il a été créé par **Taylor Otwell** (`@taylorotwell <https://twitter.com/taylorotwell>`_).

.. discover::
    La version actuelle est la version 5.8. Deux mises à jour sont publiées par an, en Février et en Août.

.. discover::
    Laravel en soit n'est rien d'autre qu'un *"conteneur d'inversion de contrôle"*, sur lequel nous allons revenir un peu plus tard, mais le framework fournit tout un ensemble de "briques" qui permettent de construire son site.

.. discover::
    Ces "briques" vont permettre de gérer les requêtes et réponses HTTP, de gérer la base de données, le moteur de template, etc...

.. discover::
    Il respecte la logique "MVC" : Model, View, Controller.

.. slide::

Écosystème
------------

**Laravel** c'est aussi tout un écosystème, que ce soit des outils de développement, des solutions SaaS, des plugins pour notre site, etc...

.. discover::
    .. image:: /img/laravel-valet.png

    **Laravel Valet** qui permet de gérer très simplement un serveur local sur macOS.

.. discover::
    .. image:: /img/laravel-nova.png

    **Laravel Nova** qui est une "extension" payante de Laravel et qui permet de générer une interface d'administration très complète.

.. slide::

.. discover::
    .. image:: /img/laravel-forge.png

    **Laravel Forge** est un service en ligne en mode SaaS (avec abonnement, donc) pour gérer ses serveurs et les configurer complètement pour servir des sites en PHP (que ce soit du Laravel, du Symfony, ou même du Wordpress).

.. discover::
    Et plein d'autres extensions comme Laravel Horizon, Laravel Echo, Laravel Scout, Laravel Envoy, Laravel Passport, Laravel Spark, Envoyer, etc...


.. slide::

Installation
------------

.. textOnly::
    **Laravel** utilise **Composer** pour gérer ses dépendences. Toutes ces briques sont d'ailleurs chacune des dépendances.

Pour créer un projet **Laravel**, nous utilisons également composer :

.. code-block:: no-highlight
    composer create-project laravel/laravel mon-projet

.. textOnly::
    Ceci va créer un dossier ``mon-projet`` avec un projet Laravel vide.

    Vous devriez voir toutes les dépendences Composer qui sont installées avec **Laravel**, et oui ! **Laravel** utilise des composants de **Symfony** ! Dont notamment ``symfony/http-foundation`` qui sert de base pour la gestion des requêtes et des réponses.

.. slide::
Structure d'un projet
---------------------

.. discoverList::
    * ``app/`` : Le dossier principal, qui contient toute la logique de notre application (contrôlleurs, modèles, etc...)
    * ``boostrap/`` : Fichiers qui initialise Laravel au début d'une requête. Aucun rapport avec le framework CSS !
    * ``config/`` : Fichiers de configuration de notre application
    * ``database/`` : Fichiers destinés à la base de données (migrations, seeders)
    * ``public/`` : Répertoire cible du serveur. Les ressources publiques (CSS, JS, images, etc...) doivent être placées ici
    * ``resources/`` : Emplacement des fichiers templates, des assets à compiler, et des fichiers de traductions

.. slide::

.. discoverList::
    * ``routes/`` : Fichiers de configuration des routes de notre application
    * ``storage/`` : Répertoire dans lequel le framework stocke des fichiers (caches, logs, uploads, etc...)
    * ``tests/`` : Emplacement des tests unitaires et fonctionnels
    * ``vendor/`` : Emplacement des dépendences Composer

.. slide::

Voyons plus en détail le dossier ``app/`` : 

.. textOnly::
    .. code-block:: no-highlight
        app
        ├── Console
        │   └── Kernel.php
        ├── Exceptions
        │   └── Handler.php
        ├── Http
        │   ├── Controllers
        │   │   ├── Auth
        │   │   │   ├── ForgotPasswordController.php
        │   │   │   ├── LoginController.php
        │   │   │   ├── RegisterController.php
        │   │   │   └── ResetPasswordController.php
        │   │   └── Controller.php
        │   ├── Kernel.php
        │   └── Middleware
        │       ├── CheckForMaintenanceMode.php
        │       ├── EncryptCookies.php
        │       ├── RedirectIfAuthenticated.php
        │       ├── TrimStrings.php
        │       ├── TrustProxies.php
        │       └── VerifyCsrfToken.php
        ├── Providers
        │   ├── AppServiceProvider.php
        │   ├── AuthServiceProvider.php
        │   ├── BroadcastServiceProvider.php
        │   ├── EventServiceProvider.php
        │   └── RouteServiceProvider.php
        └── User.php

.. discoverList::
    * ``app/Console/`` : Classes liés à l'utilisation de notre application en CLI (Artisan)
    * ``app/Http/`` : Classes liés à l'utilisation de notre application sur navigateurs

.. slide::
Principe d'environnement
------------------------

Une application web tourne généralement sur plusieurs environnements. Ne serait-ce que pour les deux principaux :

.. discoverList::
    * L'environnement **local de développement**, qui est notre propre machine, où nous développeront notre application
    * et l'environnement de **production** : C'est sur cet environnement que les utilisateurs de votre applications interagiront.

.. discover::
    Souvent, nous voulons que certaines valeurs ou certains paramètres soient différents par environnement.

.. discover::
    Par exemple : En cas d'erreur sur notre application, on souhaite voir l'exception levée, avec le fichier concerné, le numéro de la ligne, et un backtrace.

    Mais en production, nous préférerions avoir une page compréhensible, sans terme techniques. Cela préserve aussi l'application de ne pas donner d'indication sur la structure de l'application.

.. slide::

Pour pouvoir gérer ces variables d'environnement, on passe par un fichier ``.env`` présent à la racine du projet.

.. code-block:: no-highlight
    APP_ENV=local
    APP_DEBUG=true

Pour récupérer une valeur du fichier d'environnement, on utilise ``env('APP_ENV')``.

.. discover::
    Le fichier d'environnement est également l'endroit où placer des clés d'accès API, etc... car ce fichier n'est **pas versionné**. Par conséquent cela protège vos identifiants !


.. slide::

.. redirection-title:: tds/td7

Cours
----

.. toctree::

    laravel/1-decouverte
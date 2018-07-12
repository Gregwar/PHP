.. slide:: middleSlide

Composants de framework
=======================

Dans cette partie, nous présenterons les composants essentiels qui constituent un framework.

.. slide::

Routeur
~~~~~~~

Principe
--------

Le problème du routage correspond à l'association entre les adresses (URL) et le contrôleur (le morceau de code
**PHP**) qui va être invoqué.

.. discover::

    Le routeur est donc un ensemble de règles de correspondance.

.. |fleche| raw:: 

    &rarr;

.. discover::

    Par exemple:

    * ``/home`` |fleche| ``DefaultController::home()``
    * ``/login`` |fleche| ``SecurityController::login()``
    * ``/product/{id}`` |fleche| ``ProductController::show($id)``

.. slide::

Exemple: *micro framework* `Slim <https://www.slimframework.com/docs/v3/tutorial/first-app.html>`_
-------------------------------

::

    <?php
    $app = new \Slim\App;
    $app->get('/hello/{name}', 
        function ($request, $response, $args) {
            $name = $args['name'];
            $response->getBody()->write("Hello, $name");

            return $response;
        }
    )->setName('hello');
    $app->run();

.. textOnly::

    Ici:

    * La fonction ``get()`` permet d'ajouter une règle sur la méthode HTTP ``GET``
    * Le motif ``/hello/{name}`` contient un paramètre qui peut être variable
    * La route est également dotée d'un nom (``hello``)

.. slide::

Génération de routes
--------------------

Les routes permettent de faire correspondre une adresse à un contrôleur, mais également de produire des URLs.

On pourra par exemple à partir du nom de la route demander au routeur de générer l'adresse correspondante::

    <?php

    $homeUrl = $router->pathFor('home');
    $helloBobUrl = $router->pathFor('hello', ['name' => 'Bob']);

De cette façon, les noms **externes** visibles de tous (``/hello/Bob``) sont dissociés du nom **interne** de la route (``hello``)

.. slide::

Avantages
---------

Le routeur permet de:

* Ne pas avoir une page PHP par page effective, ni de règles complexes de réécriture d'URLs
* Capturer les paramètres d'URL (ex: ``/product/{id}``)
* Pouvoir changer facilement les URLs des pages, sans devoir les changer partout ailleurs
* Invoquer des actions différentes selon la méthode
* Appliquer des règles de sécurité au moment du routage (par exemple restreindre ``/admin/*``)

.. slide::

Moteur de template
~~~~~~~~~~~~~~~~~~

Problème
--------

Il est tout à fait possible d'écrire des pages en utilisant **PHP** comme moteur de template, rappellons que c'était
d'ailleurs son but premier!

Cependant, on peut lui faire quelques reproches:

* La syntaxe, un peu lourde (``<?php``...)
* Le fait de devoir échapper systématiquement les variables (cf failles :doc:`XSS <practices#xss>`)
* L'absence d'héritage (nous allons expliquer de quoi il s'agit)

.. slide::

Présentation
------------

.. image:: /img/twig.png
    :style: float:right

Un exemple de moteur de template est *Twig*.

.. textOnly::
    Ce système permet
    de simplifier de donner une grande puissance à l'écriture des vues, c'est à dire du contenu des pages HTML
    qui seront rendues.

.. discover::
    *Twig* supporte l'héritage, l'échappement par défaut et de nombreuses astuces syntaxiques
    pour simplifier l'écriture des *templates*.

.. slide::

Utilisation
-----------

Voici un exemple de template:

.. code-block:: django

    <html>
        <head>
            <title>
            {% block title %}Mon titre{% endblock %}
            </title>
        </head>
        <body>
            <h1>{{ block('title') }}</h1>
            {% block content %}
            Bonjour {{ name }} !
            {% endblock %}
        </body>
    </html>

.. textOnly::
    Comme vous le voyez, *Twig* permet d'écrire des documents directements en HTML, à l'exception de certain
    tags qui permettent d'y ajouter de la structure, à l'instar du **PHP**.

    Dans cet exemple:

    * ``{% block contents %}`` est un bloc qui pourra être surchargé dans les templates filles
    * ``{% block('title') %}`` sert à ré-afficher le contenu du block title précédement utilisé
    * ``{{ name }}`` correspond à l'affichage d'une variable

.. slide::

Héritage
--------

La template précédente peut être héritée comme cela:

.. code-block:: django

    {% extends 'index.html.twig' %}

    {% block title %}
        {{ parent() }} - Ma page
    {% endblock %}

    {% block contents %}
        Bienvenue sur cette page!
    {% endblock %}

.. textOnly::
    Le mot clé ``extends`` permet de décrire que cette page hérite de ``index.html.twig``, de la même
    manière que l'héritage des classes votre template se basera alors sur cette template mère et pourra redéfinir son
    comportement.

    Les blocs peuvent alors être surchargés, c'est à dire modifié en les redéfinissant. Il est aussi possible d'utiliser
    le mot clé ``parent()`` pour faire appel à la template mère et utiliser son contenu, comme dans le cas du titre
    qui deviendra ici "Mon titre - Ma page"

.. slide::

Boucles, conditions
-------------------

Il est également possible d'effectuer des tests et des boucles avec Twig:

.. code-block:: django

    {% if not users|length %}
    <i>Aucun utilisateur</i>
    {% else %}
    <ul>
        {% for user in users %}
            <li>{{ user.name }}</li>
        {% endfor %}
    </ul>
    {% endif %}

.. discover::
    Pour une documentation plus exhaustive, vous pouvez consulter la
    `documentation officielle de Twig <http://twig.sensiolabs.org/documentation>`_.

.. slide::

Avantages
---------

Un moteur de template permet donc:

* Une rédaction simplifiée des vues
* Moins de porosité entre le rôle du contrôleur et de la vue
* Une sécurisation avec l'échappement par défautd des variables
* Des fonctionnalités supplémentaires que du PHP "brut" telles que l'héritage
* La résolution des propriétés (``user.name`` peut être ``$user['name']`` ou ``$user->getName()``)

.. slide::

Les ORM
~~~~~~~

Présentation
------------

.. center::
    .. image:: /img/orm.jpg
        :width: 650

.. textOnly::
    Un **ORM**, pour Object Relational Mapping, désigne le fait de réaliser un *mapping*,
    ou une association entre le monde relationnel (tables, lignes, champs ...) et le monde objet
    (classes, instances, attributs ...).

    Ce mapping est généralement fait à l'aide de fichiers de configuration ou d'annotations.

.. slide::

Correspondance
--------------

+-------------------------+-------------------------+
| **Relationnel**         | **Objet**               |
+-------------------------+-------------------------+
| Table                   | Classe (ou entité)      |
+-------------------------+-------------------------+
| Ligne                   | Instance                |
+-------------------------+-------------------------+
| Colonne                 | Attribut                |
+-------------------------+-------------------------+
| Clé étrangère           | Référence               |
+-------------------------+-------------------------+

*Cette correspondance ressort si l'on compare un schéma entité association (MCD) avec un schéma UML.*

.. slide::

Utilisation
-----------

.. image:: /img/orm.png
    :class: right

.. textOnly::
    L'**ORM** se base sur la notion d'entité, qui sont des classes mappées avec la base
    de données (correspondance avec les tables).

.. discover::
    Les avantages sont notamment:

.. discoverList::
    * La persistence des objets
    * Le requêtage, parfois à travers une couche d'abstraction supplémentaire
    * La notion de transaction est préservée
    * La création et la mise à jour de la structure de la base de données à partir de la définition des entités
    * Possibilité de faire abstraction du système de gestion de base de données sous-jacent

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

.. slideOnly::
    packagist.org
    -------------

.. important::
    L'ensemble des paquets peut aujourd'hui être parcouru sur `packagist.org <http://packagist.org>`_, c'est donc un
    excellent endroit pour rechercher des bibliothèques ou composants!

.. slide::

.. redirection-title:: tds/td5_1

TD 5-1
~~~~

.. toctree::

    tds/td5_1

.. redirection-title:: tds/td5_2

TD 5-2
~~~~

.. toctree::

    tds/td5_2
.. slide:: middleSlide

Composants de framework
=======================

.. textOnly::
    Dans cette partie, nous présenterons les composants essentiels qui constituent un framework.

.. slide::

Routeur
~~~~~~~

Principe
--------

Jusqu'ici, voici comment nous avons procédé:

.. center::
    .. image:: img/router_1.png

.. textOnly::

    Ici, le travail implicite de routage est effectué par le serveur, car les scripts PHP sont des ressources différentes.

    Le problème avec cette approche:

    * Dans chaque fichier ``.php``, il faudra ré-inclure les différentes parties du code (*boilerplate*), ce qui rendra l'application peu maintenable
    * Les noms des pages apparaîtront dans la barre d'URL, ce qui n'est pas forcément adaptées au référencement et ne permet pas de flexibilité sur le nommage des adresses

.. slide::

Une solution pour avoir de belles URLs est d'utiliser le mécanisme de réécriture d'URL du serveur web:

.. center::
    .. image:: img/router_2.png

.. textOnly::

    Cette solution nous permet d'obtenir des URLs arbitraires, mais implique de maintenir un fichier de réécriture d'URLs, qui est de plus spécifique au serveur web utilisé.

    De plus, elle ne résoud pas le problème des multiples fichiers PHP.

.. slide::

Lorsqu'on utilise un framework, la réécriture d'URL est utilisée mais vers une page frontale unique:

.. center::
    .. image:: img/router_3.png

.. textOnly::

    De cette façon, le routage est réalisé en PHP au sein de l'application.

.. slide::

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

.. discoverList::

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
    :width: 250

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

.. discoverList::
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
        :width: 500

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

Exemple: Doctrine2
-----------------

.. textOnly::

    Les enregistrement de votre base de données seront mis en correspondance avec les
    objets que vous manipulez.

    Ainsi, au lieu de penser à votre base de données, vous n'avez qu'à penser objet.
    Si vous souhaitez par exemple manipuler des produits, vous écrirez:

::

    <?php

    class Product
    {
        private $id;
        private $price;
        private $name;
    }

.. textOnly::

    Ceci est une classe simple qui définit votre objet, vous pourriez l'écrire et
    l'utiliser dans n'importe quel contexte, c'est "simplement" une classe.

    Le principe maintenant n'est pas d'agir au niveau du fonctionnement de cette classe,
    mais de fournir des informations à **Doctrine2** pour qu'il puisse savoir comment
    persister et récupérer des produits dans la base de données, c'est ce que l'on appelle
    le *mapping*, ou mapage.

    Il est par exemple possible dans **Symfony2** de réaliser ce mappage à l'aide d'annotations:

.. discover::

    .. slideOnly::
        ----------------------

    ::

        <?php

        /**
         * @ORM\Entity()
         */
        class Product
        {
           /**
             * @ORM\Column(type="string")
             */
            private $name;

            // ...
        }

.. fix for vi: **

.. textOnly::

    Ici, le commentaire au dessus du texte est en fait lu et utilisé par **Doctrine2** pour
    savoir comment faire correspondre l'atribut ``$name`` avec la base de données.

    Il est alors possible d'utiliser le manager pour accéder à la base de données de manière
    transparente:

.. slide::

::

    <?php
    // Insertion
    $car = new Product;
    $car->setName('Voiture');
    $car->setPrice(10000);
    $manager->persist($car);
    $manager->flush();

    // Récupération par ID
    $car = $manager->find(1);

    // Mise à jour
    $car->setPrice(9500);
    $manager->flush();

    // Suppression
    $manager->remove($car);
    $manager->flush();

.. slide::

L'ORM permet également de gérer les *relations* entre les tables et donc entre les objets:

::

    <?php
    // Insertion
    $bob = new User;
    $bob->setName('Bob');
    $car = new Product;
    $car->setName('Voiture');
    $car->setPrice(10000);
    $car->setOwner($bob);
    $manager->persist($car);
    $manager->persist($bob);
    $manager->flush();

    // Récupération par ID
    $car = $manager->find(1);
    echo $car->getOwner()->getName(); // Bob

.. slide::

.. slideOnly::
    Principe
    --------

En clair, les entités persistés sont des **classes normales** excepté qu'elles sont mise en
correspondance avec la base de données

N'hésitez pas à lire la `documentation officielle <http://symfony.com/doc/current/book/doctrine.html>`_,
nous étudierons plus en détail **Doctrine2** au cours du TD.


.. slide::

Avantages
---------

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
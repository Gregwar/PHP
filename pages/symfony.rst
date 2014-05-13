.. slide:: middleSlide

Symfony 2
=========

.. slide::

Présentation
------------

**Symfony 2** est un *framework* web, c'est à dire un outil très complet permettant
de réaliser des applications web.

.. discover::
    D'après son créateur **Fabien Potencier**, Symfony 2 est en fait plus un rassemblement
    de bibliothèques et de composants tous fortement découplés assemblées et paramétrés pour fonctionner ensemble.
    
    En effet, **Symfony 2** se base notamment sur:

.. discoverList::
    * *Doctrine* pour requêter la base de données
    * *Twig* pour le rendu de ses templates
    * *SwiftMailer* pour l'envoi d'e-mails

.. slide::

Installation
~~~~~~~~~~~~

.. textOnly::
    **Symfony 2** se base sur **composer** pour organiser ce rassemblement de composants.
    
.. textOnly::
    Cet outil déjà présenté précédemment dans ce cours permet de gérer les dépendances entre les
    différents composants.

Il est possible de créer un projet **Symfony 2** à l'aide de la commande: 

.. code-block:: no-highlight
    composer.phar create-project symfony/framework-standard-edition

.. textOnly::
    **Composer** va alors chercher toutes les dépendances nécéssaire et vous créer un projet **Symfony 2** vide

.. slide::

Utilisation
~~~~~~~~~~~

L'utilisation du *framework* est technique et fait appel à de nombreux principes et outils.

.. discover::
    .. warning::
        Ce cours n'ayant pas pour but de répeter **l'excellente `documentation officielle <http://symfony.com/>`_**,
        nous allons seulement survoler les principes à connaître, et nous les appliquerons en :doc:`TD <tds/td6>` par la suite.

.. slide::

.. image:: /img/github.png
    :style: float:right

Communauté
----------

Organisation
~~~~~~~~~~~~
    
*GitHub* joue un rôle extrêmement important dans l'organisation du développement de **Symfony 2** et
de ses composants.

.. discover::
    Aujourd'hui, la mailing list des développeurs risque même d'être fermée au profit du suivi d'anomalies de
    *GitHub*

.. slide::

Bundles
~~~~~~~

.. image:: /img/package.png
    :style: float:right

Au centre d'une application **Symfony 2**, on trouve le *Kernel*, ou le noyau.

.. discover::
    Auprès de ce noyau sont enregistrés des *Bundles*, (ou "paquets") qui sont en fait des composants.
    Le framework est alors livré avec de nombreux bundle de base (templates, **ORM**, gestion des formulaires etc.).

.. discover::
    Un *bundle* peut proposer de nombreuses choses: vues, contrôleurs, entités pour la base de données, services etc.

.. discover::
    Tout le code que vous écrirez sera dans un ou plusieurs *bundle*. Si vous souhaitez factoriser des fonctionnalités
    d'un de vos sites à l'autre, vous pouvez les regrouper dans un *bundle* indépendant.

.. slide::

Des composants à la carte
~~~~~~~~~~~~~~~~~~~~~~~~~

Les composants de base du framework peuvent être remplaçés par d'autre (pour changer la version par exemple).

.. discover::
    De nombreux *bundles* open-source peuvent être trouvés, ils sont notamment regroupés sur `KnpBundles <http://www.knpbundles.com>`_.

.. discover::
    On pourra citer par exemple le *FOSUserBundle*, qui permet de simplifier la gestion des utilisateurs d'un
    site (inscription, identification, rappel du mot de passe etc.).

.. discover::
    Ces bundles sont en général disponibles sur composer, ce qui permet d'écrire son application
    et ses dépendances simplement à l'aide de  ``composer.json``

.. slide::

Fonctionnement
--------------

Cycle de vie
~~~~~~~~~~~~

.. textOnly::
    Lors de la réception d'une requête, elle est fournie au coeur de Symfony (noyau, ou kernel),
    qui fait appel à son composant de routage pour tenter de trouver un contrôleur associé à l'URL
    appellée.

    Si un contrôleur est trouvée, la méthode correspondante est appellée, cette méthode prend en
    entrée un objet de type ``Request`` et doit retourner un objet de type ``Response``, qui est
    éventuellement rendue à l'aide d'un moteur de template. Cette réponse est alors envoyée à l'utilisateur.

.. center::
    .. image:: /img/flow.png

.. slide::

Contrôleurs
~~~~~~~~~~~

Les **contrôleurs** sont des fonctions généralement regroupées dans des classes par 
"thème" qui génèrent une réponse à partir d'une requête:

.. discover::
    ::

        <?php
        class MyController {
            public function myAction() {
                return new Response;
            }
        }

        

.. discover::
    Le **routage** est le fait d'écrire des règles pour associer des URLs à ces
    actions

.. slide::

Annotations
~~~~~~~~~~~

.. textOnly::
    Afin de simplifier la configuration, **Symfony** vous propose d'utiliser massivement
    des **annotations**, il s'agit en fait de commentaires que vous pouvez ajouter au dessus
    de classes ou méthodes qui vous permettent d'ajouter des informations. 

    Par exemple, il est possible de configurer le routage de cette manière:

::

    <?php
    class MyController
    {
        /**
         * @Route("/hello/{name}")
         */
         public function helloAction($name) {
            return new Response('Hello '.$name);
         }
    }

.. textOnly::
    Dans cet exemple, nous décrivons au routeur que les URLs de la forme ``/hello/quelquechose``
    devra utiliser la méthode ``helloAction($name)`` pour générer la réponse, en passant le
    ``quelquechose`` en ``$name``

    Pour plus d'informations sur le routage, rendez-vous sur la `documentation officielle <http://symfony.com/doc/current/book/routing.html>`_,
    ou dans le TD au cours duquel nous l'utiliserons.
 
.. slide::

Les templates
-------------

Présentation
~~~~~~~~~~~~

.. image:: /img/twig.png
    :style: float:right

**Symfony 2** est livré avec un très bon système de templates nommé *Twig*.

.. textOnly::
    Ce système permet
    de simplifier de donner une grande puissance à l'écriture des vues, c'est à dire du contenu des pages HTML
    qui seront rendues.

.. discover::
    *Twig* supporte l'héritage, l'échappement par défaut et de nombreuses astuces syntaxiques
    pour simplifier l'écriture des *templates*.

.. slide::

Utilisation
~~~~~~~~~~~

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
~~~~~~~~

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
~~~~~~~~~~~~~~~~~~~

Il est également possible d'effectuer des tests et des boucles avec Twig:

.. code-block:: django
    
    {% if not users|length %}
    <i>Aucun utilisateur</i>
    {% else %}
    <ul>
        {% for user in users %}
            <li>{{ user }}</li>
        {% endfor %}
    </ul>
    {% endif %}

.. discover::
    Pour une documentation plus exhaustive, vous pouvez consulter la
    `documentation officielle de Twig <http://twig.sensiolabs.org/documentation>`_.

.. slide::

Dans Symfony2
~~~~~~~~~~~~~

.. textOnly::
    Dans **Symfony2**, il est possible d'ajouter l'annotation ``@Template()`` pour
    rendre une template:

::

    <?php
    class MyController {
        /**
         * @Route("/hello/{$name}")
         * @Template()
         */
         public function helloAction($name) {
            return array('name' => $name);
         }
    }

.. textOnly::
    Cet exemple rendra la template dont le nom sera guidé par une norme de nomage, en l'occurence
    ``My/hello.html.twig``, avec comme paramètre ``name`` qui vaudra le nom passé en paramètre.

    Pour plus d'informations rendez-vous dans la page de `documentation officielle <http://symfony.com/doc/current/book/templating.html>`_.

.. slide::

.. image:: /img/doctrine.png
    :style: float:right

Base de données
---------------

Doctrine2
~~~~~~~~~

Pour gérer la persistance en base de données,
**Symfony2** intègre la célèbre bibliothèque **Doctrine2**, très ressemblante à
`Hibernate <http://www.hibernate.org/>`_, un outil provenant du monde Java.

Cet outil permet de faire abstraction des accès à la base de données, de réaliser des
requêtes, mais surtout de faire le lien (on parle de "mappage") entre le monde relationnel
de votre base de données et le monde objet (on parle alors d'**ORM**).

.. slide::

Principe
~~~~~~~~

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

.. slide::

.. slideOnly::
    Principe
    ~~~~~~~~

En clair, les entités persistés sont des **classes normales** excepté qu'elles sont mise en
correspondance avec la base de données

N'hésitez pas à lire la `documentation officielle <http://symfony.com/doc/current/book/doctrine.html>`_,
nous étudierons plus en détail **Doctrine2** au cours du TD.

.. slide::

.. redirection-title:: tds/td6

TD 6
----

.. toctree::

    tds/td6

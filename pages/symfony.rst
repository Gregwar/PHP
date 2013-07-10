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
    * Doctrine pour requêter la base de données
    * Twig pour le rendu de ses templates
    * SwiftMailer pour l'envoi d'e-mails

.. slide::

Installation
~~~~~~~~~~~~

.. textOnly::
    **Symfony 2** se base sur **composer** pour organiser ce rassemblement de composants. <span class="textOnly">Cet outil
    déjà présenté précédemment dans ce cours permet de gérer les dépendances entre les différents composants.</span>

Il est possible de créer un projet **Symfony 2** à l'aide de la commande: 

.. code-block:: text
    composer.phar create-project symfony/framework-standard-edition'

.. textOnly::
    **Composer** va alors chercher toutes les dépendances nécéssaire et vous créer un projet **Symfony 2** vide

.. slide::

Utilisation
~~~~~~~~~~~

L'utilisation du *framework* est technique et fait appel à de nombreux principes et outils.

.. textOnly::
    Ce cours n'ayant pas pour but de répeter l'excellente `documentation officielle <http://symfony.com/>`_,
    nous allons seulement survoler les principes à connaître, et nous les appliquerons en TD par la suite.

.. slide::

Communauté
----------

Organisation
~~~~~~~~~~~~

.. image:: /img/github.png
    :style: float:right
    
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

**Symfony 2** est basé sur un "coeur" d'application, nommé le *Kernel*, c'est le noyau de votre
application.

.. discover::
    Auprès de ce noyau sont enregistrés des *Bundles*, (ou "paquets") qui sont en fait des composants.
    Le framework est alors livré avec de nombreux bundle (templating, ORM, gestion des formulaires etc.).

.. discover::
    Un *bundle* peut proposer de nombreuses choses, vues, contrôleurs, entités pour la base de données, services etc.

.. discover::
    Tout le code que vous écrirez sera dans un ou plusieurs *bundle*. Si vous souhaitez factoriser des fonctionnalités
    d'un de vos sites à l'autre, vous pouvez les regrouper dans un *bundle* indépendant.

.. slide::

Des composants à la carte
~~~~~~~~~~~~~~~~~~~~~~~~~

Les composants de base du framework peuvent être remplaçés par d'autre (pour changer la version par exemple).

.. discover::
    De nombreux *bundles* open-source peuvent être trouvés, sur *GitHub*.

.. discover::
    On pourra citer par exemple le *FOSUserBundle*, qui permet de simplifier la gestion des utilisateurs d'un
    site (inscription, identification, rappel du mot de passe etc.).

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

.. code-block:: html5

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

    * ``[% block contents %}`` est un bloc qui pourra être surchargé dans les templates filles
    * ``{% block('title') %}`` sert à ré-afficher le contenu du block title précédement utilisé
    * ``{{ name }}`` correspond à l'affichage d'une variable

.. slide::

Héritage
~~~~~~~~

La template précédente peut être héritée comme cela:

.. code-block:: html5

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

.. code-block:: html5
    
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

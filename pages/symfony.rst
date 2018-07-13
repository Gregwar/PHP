.. slide:: middleSlide

Symfony
=======

.. slide::

Présentation
------------

**Symfony** est un *framework* web, c'est à dire un outil très complet permettant
de réaliser des applications web.

.. discover::
    D'après son créateur **Fabien Potencier**, Symfony est en fait plus un rassemblement
    de bibliothèques et de composants tous fortement découplés assemblées et
    paramétrés pour fonctionner ensemble.

    Dans son "package" le plus courrant, **Symfony** propose d'intégrer des composants logiciels tels que:

.. discoverList::
    * *Doctrine* pour requêter la base de données
    * *Twig* pour le rendu de ses templates
    * *SwiftMailer* pour l'envoi d'e-mails

.. slide::

Installation
~~~~~~~~~~~~

.. textOnly::
    **Symfony** se base sur **composer** pour organiser ce rassemblement de composants.

.. textOnly::
    Cet outil déjà présenté précédemment dans ce cours permet de gérer les dépendances entre les
    différents composants.

Il est possible de créer un projet **Symfony** à l'aide de la commande:

.. code-block:: no-highlight
    composer create-project symfony/skeleton my-project

.. textOnly::
    **Composer** va alors chercher toutes les dépendances nécéssaire et vous créer un projet **Symfony** vide

.. slide::

Modularité
~~~~~~~~~~

Depuis Symfony "Flex", ce squelette de projet est relativement vide, et il
faudra choisir d'installer manuellement les composants dont nous aurons besoin.

.. slide::

Utilisation
~~~~~~~~~~~

L'utilisation du *framework* est technique et fait appel à de nombreux principes et outils, dont certains ont déjà été utilisés précédemmend dans le cours.

.. discover::
    .. warning::
        Ce cours n'ayant pas pour but de répeter **l'excellente `documentation officielle <http://symfony.com/>`_**,
        nous allons très vite découvrir le framework en :doc:`TD <tds/td6>`.

.. slide::

.. image:: /img/github.png
    :style: float:right

Communauté
----------

Organisation
~~~~~~~~~~~~

*GitHub* joue un rôle extrêmement important dans l'organisation du développement de **Symfony** et
de ses composants.

.. slide::

Bundles
~~~~~~~

.. image:: /img/package.png
    :style: float:right

Au centre d'une application **Symfony**, on trouve le *Kernel*, ou le noyau.

.. discover::
    Auprès de ce noyau sont enregistrés des *Bundles*, (ou "paquets") qui sont en fait des composants.
    Symfony 4 "Flex" est à la base un noyau très léger sur lequel il est possible d'installer ces paquets.

.. discover::
    Un *bundle* peut proposer de nombreuses choses: vues, contrôleurs, entités pour la base de données, services etc.

.. slide::

Des composants à la carte
~~~~~~~~~~~~~~~~~~~~~~~~~

.. discover::
    De nombreux *bundles* open-source peuvent être trouvés, ils sont notamment regroupés sur `KnpBundles <http://www.knpbundles.com>`_, `packagist <http://packagist.org>`_ ou `Symfony Recipes <http://symfony.sh>`_.

.. discover::
    On pourra citer par exemple le *FOSUserBundle*, qui permet de simplifier la gestion des utilisateurs d'un
    site (inscription, identification, rappel du mot de passe etc.).

.. discover::
    Ces bundles sont disponibles sur composer, ce qui permet d'écrire son application
    et ses dépendances simplement à l'aide de  ``composer.json``

.. slide::

Arborescence
------------

Lorsque vous créerez votre projet Symfony, vous obtiendrez l'arborescence suivante:

* ``bin/``: les exécutables, notamment la console Symfony
* ``config/``: la configuration de votre application web
* ``public/``: le dossier accessible à partir du serveur web pour votre application (qui contient les fichiers statiques et le fichier frontal ``index.php``
* ``src/``: le code source de votre application
* ``templates/``: les templates (vues)
* ``var/``: les fichiers temporaires (cache, logs)
* ``vendor/``: les bibliothèques externes
* ``.env``: le fichier contenant les variables d'environnement permettant de configurer vos paramètres

.. slide::

.. redirection-title:: tds/td6

TD 6
----

.. toctree::

    tds/td6

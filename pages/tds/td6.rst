TD6
===

Au cours de ce TP en plusieurs parties, nous allons créer une application de gestion de commande de
pizzas.

.. slide::

Installation de Symfony 2
-------------------------

.. step::
    Etape 1: Récupérer les fichiers
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        
    La meilleure solution afin d'installer Symfony 2 est de passer par composer. Pour cela,
    installez tout d'abord composer quelque part et utilisez la commande ``create-project``:

    .. code-block:: text
        composer.phar create-project symfony/framework-standard-edition symfony
        
    Composer va alors travailler un moment et vous déploiera le framework dans le dossier ``symfony/``.

.. slide::

.. step::

    Etape 2: configurez les droits
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Vous devrez donner les droits aux serveurs en écriture dans les dossiers ``app/cache`` et
    ``app/logs``:

    .. code-block:: text
        chmod -R 777 app/cache/ app/logs/

    Dans le cas ou vous ne travaillez pas sur votre propre machine, il faudra éventuellement modifier le 
    fichier ``web/app_dev.php`` pour pouvoir y accéder. Editez le et enlevez la vérification sur l'IP.
    *Attention, cette installation rendra par la suite votre application très vulnérable d'un point de vue de sa
    sécurité, ce n'est pas un bon comportement en production.*

    Chargez la page ``web/app_dev.php`` dans un navigateur et vérifiez que vous obtenez bien la page
    "Symfony - Welcome".

.. slide::

.. center::
    .. image:: /img/sfwelcome.png

.. slide::

.. step::
    Etape 3: créer votre Bundle
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Une application Symfony réside dans un *Bundle*, ou un "Paquet" en français. Avant de
    commencer à écrire votre code, vous devrez donc créer votre propre Bundle.

    .. textOnly::
        La version standard de Symfony est fournie avec un Bundle de démo (``AcmeDemoBundle``,
        situé dans ``src/Acme/DemoBundle``). C'est ce dernier qui vous a accueilli. Afin de le
        désactiver, éditez le fichier ``app/config/routing_dev.yml`` et enlevez les trois premières
        sections qui concernent ``Acme``.
        
    Créez maintenant votre Bundle, appellons le ``PizzaBundle`` et plaçons le sous le
    nom de vendeur ``Student``:

    .. code-block:: text
        php app/console generate:bundle
        
    Répondez alors ``Student/PizzaBundle`` à la première question qui vous sera posée, et
    laissez les autre valeurs par défaut. Utilisez le format ``annotation`` pour la configuration.

.. slide::

.. step::

    Etape 4: Hello world
    ~~~~~~~~~~~~~~~~~~~~

    Regardez le fichier ``app/config/routing.yml``, il contient théoriquement une nouvelle section
    qui signifie que votre Bundle sera utilisée par annotation pour le routage.

    Le code de votre Bundle se situe désormais dans ``src/Student/PizzaBundle/``, regardez les
    différents fichiers qu'il contient, notamment ``Controller/DefaultController.php`` et 
    ``Resources/views/Default/index.html.twig``.

    Chargez la page ``app_dev.php/hello/world``, constatez alors ce qui se passe.

.. slide::

Création de la structure
------------------------

Nous allons maintenant créer une structure de site web. Afin de ne pas perdre de temps à réaliser des
graphismes ou des feuilles de styles, une page d'exemple est fournie dans `td6 </files/td6.zip>`_, dans
le dossier ``design/``.

.. step::
    Création du layout
    ~~~~~~~~~~~~~~~~~~

    .. image:: /img/pizza.png
        :style: float:right

    Pour commencer, créez un layout principal ``layout.html.twig`` contenant la structure générale du 
    site. Placez la feuille de style et les images dans le dossier ``web/`` de Symfony et utilisez la
    fonction ``asset()`` de Twig pour inclure ``style.css``.

    Toutes vos templates hériteront plus tard ce ce ``layout.html.twig`` et surchargeront certain
    de ses blocs.

    Vous pourrez par exemple placer un
    bloc ``contents`` à l'intérieur de votre page. Pour une documentation exhaustive, vous pouvez vous
    référer à la `documentation "Templating" <http://symfony.com/doc/current/book/templating.html>`_ de
    Symfony.

.. step::
    Une première page
    ~~~~~~~~~~~~~~~~~

    Maintenant que votre structure est en place, créez une nouvelle action pour lister les pizzas
    dans votre contrôleur.
    Pour cela, vous pourrez ajouter une fonction de ce style avec ses annotations::

        <?php

            /***
             * @Route("/pizzas", name="pizzas_list")
             * @Template()
             */
            public function pizzasAction()
            {
                return array();
            }

    Testez votre action en vous rendant à la page ``/pizzas`` de votre application, vous
    devriez voir un message d'erreur vous indicant que la template correspondante n'existe pas. Créez
    cette template en héritant du layout et surchargez le bloc du contenu pour afficher un message différent.

.. step::
    Création du premier lien
    ~~~~~~~~~~~~~~~~~~~~~~~~
        
    Modifiez le lien du bouton "Les pizzas" de manière à ce qu'il pointe vers la page que vous venez
    de créer. Attention: ne mettez pas l'adresse de votre cible "en dur", mais utilisez la fonction twig
    ``path``:

    .. code-block:: html5
        <a href="{{ path('pizzas_list') }}">Les pizzas</a>


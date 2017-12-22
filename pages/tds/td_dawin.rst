TD noté DAWIN Formation Initiale
================================

Présentation
------------

Consignes et rendu
~~~~~~~~~~~~~~~~~~

.. warning::
    Ce travail est à produire **individuellement**, il doit se réaliser sur le `GitLab du département <https://gitlab-ce.iut.u-bordeaux.fr/>`_ dans un **dépôt privé**

    Pour ce faire, vous effectuerez un **fork** du dépôt suivant:

    - `https://gitlab-ce.iut.u-bordeaux.fr/gpassault/td_dawin_2018 <https://gitlab-ce.iut.u-bordeaux.fr/gpassault/td_dawin_2018>`_

    **N'oubliez pas de donner les droits à Grégoire Passault**

    Vous devez impérativement renseigner votre dépôt à l'aide d'une remise sur `le Moodle du cours <https://moodle1.u-bordeaux.fr/course/view.php?id=3634>`_

    La date limite de remise est le **15 Janvier 2018** inclu, ce qui signifie que vos dépôts seront clonés et ne seront plus mis à jour

.. div:: alert alert-danger

    **Information**: nous exécutons des scripts automatiques pour détecter le plagiat de code, si vous nous rendez des devoirs similaires, nous le détecterons et reviendrons à la fois vers le `plagieur et le plagié <http://www.studyrama.com/vie-etudiante/se-defendre-vos-droits/triche-et-plagiat-a-l-universite/plagier-c-est-frauder-et-risquer-des-sanctions-74063>`_.

Consignes et rendu
~~~~~~~~~~~~~~~~~~

Nous allons créer une application capable de parcourir des produits et de les évaluer. Pour ce faire, nous allons nous baser sur:

- Le framework **Symfony**, dans sa version 3.4
- `L'API de Open Food Facts <https://fr.openfoodfacts.org/data>`_ comme source de données pour les produits
- Le `FOSUserBundle <https://github.com/FriendsOfSymfony/FOSUserBundle>`_ pour la gestion des utilisateurs

.. step::

    Prise en main
    ---------

    Commencez par faire votre *fork* du dépôt original et par le cloner. N'oubliez pas d'installer les dépendances à l'aide de `composer <http://getcomposer.org>`_~::

        composer install

    Modifiez alors le fichier ``app/config/parameters.yml`` pour qu'il contienne les paramètres de connexion valide à un serveur MySQL (vous pouvez par exemple utiliser celle du TD4 au département) et créez les tables::

        php bin/console doctrine:schema:create

    Lancez alors le serveur web et testez::

        php bin/console server:run

Travail à réaliser
---------

.. step::

    #-) Ajout des entités
    ~~~~~~~~~~~~~~~~~~~~~

    L'application de base marche, mais n'offre presque aucune fonctionnalités mis à part l'inscription et la connexion des utilisateurs à l'aide du *FOSUserBundle*. Nous allons ajouter des entités de manière à avoir:

    - Plus d'informations sur les utilisateurs
    - Des produits
    - Les évaluations

    Pour nous, un **produit** sera représenté par son *code barre*, son *nombre de consultations* et sa *date de dernière vue* sur notre site.

    En plus des informations actuelles, nous demanderons aux **utilisateurs** de fournir leur *nom*, leur *date de naissance* ainsi que leur *sexe*.

    Enfin, les **évaluations** comportent une *note* et un *commentaire*. Une évaluation correspond à un produit ainsi qu'à un utilisateur.

    Voici un aperçu des entités:

    .. center::
        .. image:: /img/open_food_facts.png

    .. note::
        Note: la relation d'héritage entre notre produit et celui d'Open Food Facts est ici virtuelle. En fait, nous ne stockerons que le code barre dans notre base et utiliserons l'API d'**Open Food Facts** pour afficher les autres champs!

    Vous pourrez vous aider de la commande interactive::

        php bin/console doctrine:generate:entity

    Pour créer les entités, et vous aider de la `documentation officielle <https://symfony.com/doc/3.4/doctrine.html>`_ pour gérer les relations.

.. step::

    #-) Ajout des champs utilisateur à l'inscription
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    En vous aidant de cette `page de documentation <http://symfony.com/doc/2.0/bundles/FOSUserBundle/overriding_forms.html>`_, faites en sorte que nouveaux champs (*nom*, *date de naissance* et *sexe*) apparaissent dans le formulaire d'inscription.

.. step::

    #-) Recherche de produit
    ~~~~~~~~~~~~~~~~~~~~~~~~

    Le formulaire de recherche de produit n'est pour l'instant pas actif. Utilisez `l'API d'Open Food Facts <https://fr.openfoodfacts.org/data>`_ pour que lorsqu'on recherche un produit par code barre, la page produit affiche pré-remplir.

    Voici un exemple de code qui affiche le nom du produit ``3029330003533``::

        <?php

        $url = 'https://fr.openfoodfacts.org/api/v0/produit/3029330003533.json';
        $data = json_decode(file_get_contents($url), true);

        echo $data['product']['product_name']."\n";

.. step::

    #-) Création des produits en base
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Lorsqu'un produit est recherché par code barre et qu'il n'existe pas déjà en base. Dans ce cas, créez-le.

    Si il existe déjà, incrémentez la valeur du nombre de consultations et mettez à jour la date de dernière vue à la date actuelle.

    Affichez le nombre de consultation sur la fiche produit.

.. step::

    #-) Récemment consultés
    ~~~~~~~~~~~~~~~~~~~~~~~

    Modifiez le code de la page d'accueil afin que la rubrique "Récemment consultés" affiche les 8 derniers produits consultés sur le site (en utilisant la date de dernière vue).

    Affichez également la photo et le nom du produit concernés.

    .. note::

        Essayez de factoriser le plus possible le code permettant de récupérer les données depuis **Open Food Facts** (éviter les copier/coller).

.. step::

    #-) Evaluations
    ~~~~~~~~~~~~~~~

    En vous inspirant éventuellement du fonctionnement du formulaire de recherche et évidemment de la `documentation officielle <https://symfony.com/doc/3.4/forms.html>`_, ajoutez un formulaire en bas de la fiche d'un produit permettant à un utilisateur d'écrire une évaluation notée (entre 0 et 5) du produit.

    Si l'utilisateur a déjà laissé une note pour ce produit, le formulaire ne doit plus apparaître.

.. step::

    #-) Note d'un produit
    ~~~~~~~~~~~~~~~~~~~~~

    Sur la fiche d'un produit, affichez sa note entre 0 et 5. Vous placerez le code qui permet d'obtenir la note d'un produit dans le `*repository* de l'entité *produit* <https://symfony.com/doc/3.4/doctrine/repository.html>`_.

.. step::

    #-) Meilleurs produits
    ~~~~~~~~~~~~~~~~~~~~~

    Enfin, modifiez le code de la page d'accueil afin que les 8 meilleurs produits soient bien affichés. De la même manière que la question précédente, vous écrirez pour cela la requête dans le *repository* de *produit*.

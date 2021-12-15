


TD noté DAWIN
=============

Présentation
------------

Consignes et rendu
~~~~~~~~~~~~~~~~~~

.. warning::
    Ce travail est à produire **individuellement**, vous devrez pour cela créer un dépôt git
    **privé**.

    Le code de base est présent sur ce `dépôt GitLab <https://gitlab-ce.iut.u-bordeaux.fr/gpassault/poll-2022>`_.

    Commencez par faire un Fork du dépôt, et partagez le avec moi (en tant que "Reporter")

    Vous devez impérativement renseigner votre dépôt à l'aide d'une remise sur `le Moodle du cours <https://moodle1.u-bordeaux.fr/course/view.php?id=3634>`_ dans l'espace de remise

    La date limite de remise est le **23 Janvier 20222** inclu (23:59), ce qui signifie que vos dépôts seront clonés et ne seront plus mis à jour

.. div:: alert alert-danger

    **Information**: nous exécutons des scripts automatiques pour détecter le plagiat de code, si vous nous rendez des devoirs similaires, nous reviendrons à la fois vers le `plagieur et le plagié <http://www.studyrama.com/vie-etudiante/se-defendre-vos-droits/triche-et-plagiat-a-l-universite/plagier-c-est-frauder-et-risquer-des-sanctions-74063>`_.


La base de code est une application **Symfony** qui permet aux utilisateurs de créer et voter pour des sondages.

.. step::

    Prise en main et installation
    -----------------------------

    Installez les dépendances à l'aide de `composer <http://getcomposer.org>`_~::

        composer install

    Modifiez alors le fichier ``.env`` pour qu'il contienne les paramètres de connexion valide à un serveur MySQL
    et créez les tables::

        symfony console doctrine:schema:create

    Nous allons maintenant insérer des données dans la base, pour cela::

        symfony console doctrine:fixtures:load

    .. note::

        À tout moment, vous pouvez re-lancer cette commande pour re-générer les données dans la base. En particulier,
        cela permet de disposer de sondages qui sont terminé ou non.

    Lancez alors le serveur web et testez::

        symfony serve

    .. note::

        Le mot de passe de tous les comptes est ``password``

    Vous devriez voir quelque chose qui ressemble à ceci:

    .. center::
        .. image:: /img/dawin_2022_poll.png

Travail à faire
---------------

.. step::

    Page active
    ~~~~~~~~~~~

    Modifier le code afin que la page active soit soulignée dans le menu de navigation
    (Dans le code de base, c'est toujours le lien "Accueil" qui est souligné à l'aide de la
    classe Bootstrap ``text-decoration-underline``)

.. step::

    Dates
    ~~~~~

    Modifiez le formulaire de création et d'édition d'un sondage de manière à ce que:

    * La date de création soit renseignée automatiquement (elle n'est pas visible par l'utilisateur)
    * La date de fin soit pré-remplie avec la date courante + 1 semaine lorsque la page se charge

.. step::

    Contraintes sur les sondages
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Modifiez le formulaire de création de sondage de manière à ne pas autoriser la création si il n'y a pas
    au moins 2 réponses possibles

.. step::

    Paginer les sondages
    ~~~~~~~~~~~~~~~~~~~~

    Pagniez la liste des sondages (en affichant 5 sondages par page)


Identification et inscription
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

La barre de connexion présente en haut du site:

.. center::
    .. image:: /img/login_bar.png

N'est pas fonctionnelle (si vous souhaitez tester: la page ``/login`` existe déjà).
    
.. step::
    * Modifiez le code afin qu'elle permette d'identifier l'utilisateur,
.. step::
    * Quand l'utilisateur est connecté, ajoutez un lien de déconnexion à la place,
.. step::
    * Ajoutez un lien vers l'inscription quand l'utilisateur n'est pas connecté
    (cette page existe déjà dans l'application).

Sécurité
~~~~~~~~

Dans le code de base, tout le monde peut accéder à tout.

.. step::
    * Faites en sorte que seuls les utilisateurs connectés puissent créer et voir les sondages. Sinon, ils
      seront redirigé vers le formulaire d'identification lorsqu'ils cliqueront sur "Sondages" dans le menu
.. step::
    * Faites en sorte qu'un utilisateur ne puisse pas modifier un sondage qui ne lui appartient pas.

.. step::

    Prise en compte des votes
    ~~~~~~~~~~~~~~~~~~~~~~~~~

    Les votes ne sont pour l'instant pas pris en compte lorsqu'on soumet le formulaire. 

    .. center::
        .. image:: /img/poll_example.png    
    
    Enregistrez les votes des utilisateurs. Attention aux règles suivantes:

    * Un utilisateur ne doit pas pouvoir changer son vote
    * Un utilisateur ne doit voter qu'une seule fois
    * Un utilisateur ne doit pas pouvoir voter quand la date de fin est dépassée

    Modifiez le code de la liste des sondages pour que les sondages auxquels l'utilisateur courant a déjà
    voté apparaissent en grisé / opacité réduite.

.. step::

    Affichage des résultats
    ~~~~~~~~~~~~~~~~~~~~~~~

    Lorsque l'utilisateur a voté, ou que le sondage est clos, affichez les résultats du sondage sous
    forme de barres remplies par le pourcentage de votes.

.. step::

    Sondages en page d'accueil
    ~~~~~~~~~~~~~~~~~~~~~~~~~~

    Sur la page d'accueil, affichez les 4 sondages qui ont eu le plus de vote de la part des utilisateurs,
    parmi les sondages qui sont terminés (la date actuelle est supérieure à ``date_end``) et qui ont été
    créé il y a moins de 7 jours (``date_creation`` date d'il y a moins de 7 jours).

.. image:: /img/label.png
    :class: right

Ajout des catégories
~~~~~~~~~~~~~~~~~~~~

.. step::
    Ajouter une entité ``Category`` dans la base, qui a seulement un attribut ``name``, et faites en sorte qu'un
    sondage soit dans une (et une seule) catégorie (obligatoirement).

.. step::
    Modifiez le code d'initialisation de ``src/DataFixtures/AppFixtures.php`` de manière à ce que quelques catégories
    existent au moment du chargement de la fixture, et que les sondages existants soient rangés dans des catégories

.. step::
    Modifiez le formulaire de création et d'édition d'un sondage afin qu'il soit nécessaire de choisir une catégorie
    pour le sondage

.. step::
    Dans la liste des sondages, affichez sa catégorie.

.. image:: /img/filter.png
    :class: right

Filtrage par catégorie
~~~~~~~~~~~~~~~~~~~~~~~~

.. step::
    Lorsque l'on clique sur le nom d'une catégorie dans la liste des sondages, filtrer les résultats de manière à
    ce que l'on voit uniquement les sondages de cette catégorie (dans ce cas, la pagination doit toujours fonctionner).

.. step::
    Ajoutez une nouvelle page "catégories", accessible dans le menu principal, qui liste les catégories. Un clic sur
    l'une d'elle doit afficher la liste des sondages filtrés.

.. step::
    Triez la liste des catégories de celle qui a le plus de succès à celle qui en a le moins (le succès étant
    défini comme le nombre de votes donné par les utilisateurs aux sondages).    

.. step::

    Supprimer une réponse possible
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    On ne peut actuellement pas enlever une réponse possible lorsque l'on édite un sondage. Modifiez le code
    afin que cela soit possible.

    Pour cela, vous aurez besoin de faire du JavaScript. Vous pouvez vous aider de cette
    `page de la documentation <https://symfony.com/doc/current/form/form_collections.html>`__.


.. step::

    Optimisation de requête
    ~~~~~~~~~~~~~~~~~~~~~~~

    Constatez que dans ``templates/poll/index.html.twig``, le comptage du nombre de réponses à un sondage se fait
    en additionnant tous les éléments depuis TWIG. Cela provoque un grand nombre de requêtes, comme on peut le constater
    dans le *profiler*:

    .. center::
        .. image:: /img/70_requests.png

    Changez le code afin de réduire ce nombre de requêtes.

    


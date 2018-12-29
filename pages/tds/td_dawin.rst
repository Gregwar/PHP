TD noté DAWIN Formation Initiale
================================

Présentation
------------

Consignes et rendu
~~~~~~~~~~~~~~~~~~

.. warning::
    Ce travail est à produire **individuellement**, vous devrez pour cela créer un dépôt git
    **privé**.

    Le code de base est présent sur ce `dépôt GitHub <https://github.com/Gregwar/poll-2018>`_.

    Vous pouvez donc par exemple créer un dépôt (**privé**!) BitBucket ou GitHub, puis faire
    par exemple:

    .. code-block:: text

        git clone https://github.com/Gregwar/poll-2018.git
        cd poll-2018
        git remote rm origin
        git remote add origin git@bitbucket.org:mon-login-bitbucket/mon-depot-prive.git
        git push --set-upstream origin master

    N'oubliez pas de partager ce dépôt privé avec moi (login ``gregwar`` sur BitBucket ou GitHub)

    Vous devez impérativement renseigner votre dépôt à l'aide d'une remise sur `le Moodle du cours <https://moodle1.u-bordeaux.fr/course/view.php?id=3634>`_

    La date limite de remise est le **18 Janvier 2019** inclu, ce qui signifie que vos dépôts seront clonés et ne seront plus mis à jour

.. div:: alert alert-danger

    **Information**: nous exécutons des scripts automatiques pour détecter le plagiat de code, si vous nous rendez des devoirs similaires, nous le détecterons et reviendrons à la fois vers le `plagieur et le plagié <http://www.studyrama.com/vie-etudiante/se-defendre-vos-droits/triche-et-plagiat-a-l-universite/plagier-c-est-frauder-et-risquer-des-sanctions-74063>`_.


La base de code est une application **Symfony** dont le but est de gérer des sondages. Les utilisateurs
peuvent s'inscrire et créer leurs sondage puis ajouter des options.

.. step::

    Prise en main
    ---------

    N'oubliez pas d'installer les dépendances à l'aide de `composer <http://getcomposer.org>`_~::

        composer install

    Modifiez alors le fichier ``.env`` pour qu'il contienne les paramètres de connexion valide à un serveur MySQL (vous pouvez par exemple utiliser celle du TD4 au département) et créez les tables::

        php bin/console doctrine:schema:create

    Lancez alors le serveur web et testez::

        php bin/console server:run

Travail à réaliser
---------

.. step::

    #-) Amélioration du menu (1)
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Remarquez que la page active semble toujours être "Accueil" dans le menu (le ``li`` avec la classe
    ``active``). Faites en sorte que ce dernier change selon la page sur laquelle on se trouve

.. step::

    #-) Amélioration du menu (2)
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    L'ensemble des liens sont toujours visibles dans le menu, que l'on soit connecté ou non. Changez
    le code de manière à ce que les liens ("inscription", "connexion") ne soient visible que lorsque
    l'on n'est pas connecté, et les liens ("déconnexion", "mes sondages") ne soient visible que lorsque l'on
    est connecté.

.. step::

    #-) Nombre d'options
    ~~~~~~~~~~~~~~~~~~~~

    Dans la liste des sondages, modifiez le code de manière à ce que le nombre d'options apparaissent
    à côté de "éditer les options". Voici un exemple de résultat:

    .. center::
        .. image:: /img/poll2018-options.png

.. step::

    #-) Propriétaire du sondage
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Remarquez que, quel que soit l'utilisateur identifié, tous les sondages de la base apparaissent
    dans "mes sondages".

    * Modifiez l'entité ``Poll`` de manière à ce qu'un sondage soit attribué à un utilisateur.
    * Modifiez le code du ``PollController`` de manière à ne voir apparaître que les sondages
      de l'utilisateur connecté.
    * Modifiez la page d'un sondage pour afficher le nom du créateur à la place des ``????``


.. image:: /img/pollstats.png
    :class: pull-right
    :width: 128

.. step::

    #-) Vote
    ~~~~~~~~
    
    .. center::
        .. image:: /img/poll2018-poll.png

    Pour le moment, il n'est pas possible de voter car la page d'un sondage est essentiellement
    une maquette. 

    * Ajouter une entité ``PollVote`` qui permet d'associer un utilisateur, un sondage et l'option
      pour laquelle il a voté
    * Modifiez le code de l'action ``show()`` du ``PollController`` de manière à enregistrer le
      vote de l'utilisateur dans la base lorsqu'il soumet le formulaire.

.. step::

    #-) Résultats
    ~~~~~~~~~~~~~

    Modifiez le code du ``PollController`` (encore l'action ``show()``) et de la template associée
    afin d'afficher les véritables statistiques des résultats du sondage en fonction des votes.

    Selon si l'utilisateur a voté ou non, affichez soit le formulaire soit les résultats.

.. step::

    #-) Derniers sondages en page d'accueil
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Affichez sur la page d'accueil les 8 derniers sondages (cliquables) les plus récemment créés.

.. image:: /img/lock.png
    :class: pull-right
    :width: 128

.. step::

    #-) Droits d'accès
    ~~~~~~~~~~~~~~~~~~

    Remarquez que, nous avons caché des liens, mais nous n'avons pas réellement mis en place de
    sécurité. Notamment:

    * Un utilisateur non connecté ne doit pas pouvoir voter. Par exemple, si il clique sur la fiche
      d'un sondage en page d'accueil, il ne devrait pas pouvoir y accéder.
    * Un utilisateur non connecté peut accéder à "Mes sondages" (via l'URL ``/poll``).
    * En modifiant l'id d'un sondage sur la page d'édition, ou l'id d'une option de sondage sur la
      page d'édition, on ne devrait pas pouvoir modifier le sondage d'un autre utilisateur!

    Modifiez le code pour corriger ces problèmes.

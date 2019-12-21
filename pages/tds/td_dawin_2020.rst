TD noté DAWIN Formation Initiale
================================

Présentation
------------

Consignes et rendu
~~~~~~~~~~~~~~~~~~

.. warning::
    Ce travail est à produire **individuellement**, vous devrez pour cela créer un dépôt git
    **privé**.

    Le code de base est présent sur ce `dépôt GitHub <https://github.com/Gregwar/td-dawin-2020>`_.

    Créez un dépôt (**privé**!) BitBucket ou GitHub, puis faire par exemple:

    .. code-block:: text

        git clone https://github.com/Gregwar/td-dawin-2020.git
        cd td-dawin-2020
        git remote rm origin
        git remote add origin git@bitbucket.org:mon-login-bitbucket/mon-depot-prive.git
        git push --set-upstream origin master

    N'oubliez pas de partager ce dépôt privé avec moi (login ``gregwar`` sur BitBucket ou GitHub)

    Vous devez impérativement renseigner votre dépôt à l'aide d'une remise sur `le Moodle du cours <https://moodle1.u-bordeaux.fr/course/view.php?id=3634>`_ dans l'espace de remise

    La date limite de remise est le **18 Janvier 2020** inclu, ce qui signifie que vos dépôts seront clonés et ne seront plus mis à jour

.. div:: alert alert-danger

    **Information**: nous exécutons des scripts automatiques pour détecter le plagiat de code, si vous nous rendez des devoirs similaires, nous le détecterons et reviendrons à la fois vers le `plagieur et le plagié <http://www.studyrama.com/vie-etudiante/se-defendre-vos-droits/triche-et-plagiat-a-l-universite/plagier-c-est-frauder-et-risquer-des-sanctions-74063>`_.


La base de code est une application **Symfony** dont le but est de gérer la participation des étudiants au
forum des stages.

.. step::

    Prise en main et installation
    -----------------------------

    Installez les dépendances à l'aide de `composer <http://getcomposer.org>`_~::

        composer install

    Modifiez alors le fichier ``.env`` pour qu'il contienne les paramètres de connexion valide à un serveur MySQL
    et créez les tables::

        php bin/console doctrine:schema:create

    Lancez alors le serveur web et testez::

        php bin/console server:run

    .. note::

        Vous aurez besoin d'un compte admin, et d'un compte non-admin. Pour cela, vous pouvez vous inscrire deux fois,
        et modifier les roles d'un des utilisateurs à l'aide de la commande::

            php /bin/console app:make-admin e-mail@de-ladmin.com

Travail à faire
---------------

.. image:: /img/lock.png
    :class: right

Sécurisation
~~~~~~~~~~~~

.. step::
    Le site ne comporte actuellement aucune règle de sécurité. Faites en sorte que:

    * La partie "formation" soit réservé à l'administrateur (back)
    * La page "entreprise" soit réservée aux utilisateurs enregistrés
    * Les fonctionnalités d'édition et de suppression de la partie entreprise soient réservées à l'administrateur

.. step::

    Ajout de champ
    ~~~~~~~~~~~~~~

    On aimerait pouvoir aussi spécifier une adresse (URL) de site web pour les entreprises qui est
    optionelle.

    Ajoutez cette url:

    * Dans la base (vous pourrez utiliser la commande ``make:entity``
    * Dans le formulaire de création/d'édition de l'entreprise
    * Dans la fiche ("détails") de l'entreprise

Connexion d'un utilisateur à une formation
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. step::

    Ajoutez un champ ``training`` (formation) dans l'entité utilisateur (vous pouvez
    utilisez encore une fois ``make:entity``),
    qui sera une relation adéquate avec l'entité ``Training``.

.. step::

    Ajoutez également ce champ dans le formulaire d'inscription, afin que l'on puisse choisir la formation
    à l'aide d'un menu déroulant.

.. step::

    Création des créneaux lors de la création d'entreprise
    ~~~~~~~~~~~~~~~~~~~~~

    On souhaite pouvoir associer des crénaux à chaque entreprise. Un créneau est une heure
    à laquelle il est possible de rencontrer l'entreprise pendant le forum des stages (pour la prise de
    rendez-vous).

    L'entité ``Slot`` (créneau) est déjà fournie dans le code de base.

    Lorsque l'on créé une entreprise, on lui associe des créneaux libres à partir des paramètres (heure
    de début, heure de fin, et durée de chaque créneau. Voici un exemple de résultat attendu pour
    un début à ``14:00``, une fin à ``16:00`` et des créneaux de ``15`` minutes:

    .. center::
        .. image:: /img/2020-slots.png    

    Implémentez la création des créneaux libres (dans ``CompanyController::createSlots``).

    .. note::

        **Note**: L'entité ``Slot`` qui représente les crénaux existe déjà dans le code fournie, et
        l'affichage des crénaux est déjà implémenté.

.. step::

    Entreprise et formation
    ~~~~~~~~~~~~~~~~~~~~~~~

    Les entreprises participantes ne sont pas intéressées par des étudiants de toutes les formations.
    (Par exemple, certains recruteurs veulent exclusivement des étudiants DAWIN, ou des DUT etc.).

    Ajoutez une connexion entre les entreprises et les formations, de manière à ce qu'il soit possible
    de séléctionner (avec des cases à cocher) dans le formulaire de création/édition des entreprises la liste
    des formations qui l'intéressent.

    Ajoutez cette liste dans la page "détails" de l'entreprise.

.. step::

    Aide visuelle
    ~~~~~~~~~~~~~

    Lorsqu'un utilisateur regarde la liste des entreprises, montrez visuellement les entreprises qui
    ne sont pas intéressées par la formation pour laquelle il s'est enregistré (on peut par exemple
    les mettre en ``opacity:0.5``).

Blocage d'un crénau par un étudiant
~~~~~~~~~~~~~~~~~~

.. step::

    Un étudiant peut déclarer son intérêt pour une entreprise via l'application, pour cela il
    clique sur un créneau libre, qui lui est alors assigné (via le champ ``student`` de
    ``Slot``).

    .. note::

        **Attention**: un étudiant ne peut pas bloquer plusieurs créneaux à la même heure, ni
        plusieurs créneaux à des heures différentes pour la même entreprise!

.. step::

    Sur la page d'accueil, l'étudiant doit pouvoir voir tous ses créneaux, et quelle entreprise
    il rencontrera à ce moment là. Il voit également son nom à côté du créneau qu'il a reservé
    sur la page détails d'une entreprise.

.. step::

    Lorsqu'un autre étudiant voit la liste des créneaux, il voit lesquels sont disponibles et ne
    peut pas réserver un créneau déjà pris.

.. step::

    Sur la page d'une entreprise, l'administrateur doit pouvoir voir le nom de chaque étudiant
    à côté des créneaux lorsqu'il sont réservés.

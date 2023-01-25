TD noté DAWIN
=============

Présentation
------------

Consignes et rendu
~~~~~~~~~~~~~~~~~~

.. warning::
    Ce travail est à produire **individuellement**, vous devrez pour cela créer un dépôt git
    **privé**.
    Le code de base est présent sur ce `dépôt GitLab <https://gitlab-ce.iut.u-bordeaux.fr/gpassault/booking-2023>`_.

    Commencez par faire un Fork du dépôt, et partagez le avec moi (en tant que "Reporter")

    Vous devez impérativement renseigner votre dépôt à l'aide d'une remise sur `le Moodle du cours <https://moodle1.u-bordeaux.fr/course/view.php?id=3634>`_ dans l'espace de remise

    La date limite de remise est le **5 Mars 2023** inclu (23:59), ce qui signifie que vos dépôts seront clonés et ne seront plus mis à jour

.. div:: alert alert-danger

    **Information**: nous exécutons des scripts automatiques pour détecter le plagiat de code, si vous nous rendez des devoirs similaires, nous reviendrons à la fois vers le `plagieur et le plagié <http://www.studyrama.com/vie-etudiante/se-defendre-vos-droits/triche-et-plagiat-a-l-universite/plagier-c-est-frauder-et-risquer-des-sanctions-74063>`_.


La base de code est une application **Symfony** de gestion des réservations dans une salle de spectacles.

.. step::

    Prise en main et installation
    -----------------------------

    Installez les dépendances~::

        symfony composer install

    Modifiez alors le fichier ``.env.local`` pour qu'il contienne les paramètres de connexion valide à un serveur MySQL
    et créez les tables::

        symfony console doctrine:schema:update --force

    Nous allons maintenant insérer des données dans la base, pour cela::

        symfony console doctrine:fixtures:load

    .. note::
        Cette commande charge des données dans la base de données à partir du code contenu dans
        ``src/DataFixtures/AppFixtures.php``. Dans le code de base, elle permet de créer des catégories.

    Lancez alors le serveur::

        symfony serve

    Et connectez vous à `http://localhost:8000 <http://localhost:8000>`_.
    Vous devriez voir quelque chose qui ressemble à ceci:

    .. center::
        .. image:: /img/booking_2023.png

.. note::
    **Note:** Le code est fourni avec des entités qui décrivent une base de données. Mais libre à vous de les modifier
    si vous le souhaitez~!

Travail à faire
---------------

.. image:: /img/gears.png
    :style: float:right

Ajout de la configuration
~~~~~~~~~~~~~~~~~~~~~~~~~

Comme vous le remarquez, certaines valeurs sont indiquées "en dur" dans le code, notamment:

* Le nom de la salle (*DAWIN-Arena*),
* Son adresse,
* L'emplacement sur la carte.

On souhaiterait que ces informations soient modifiables par l'administrateur du site.

.. step::
    **Ajout de la configuration en base**

    Ajoutez une entité ``Configuration``, qui permettra de stocker ces informations en base.
    Modifiez ensuite ``src/DataFixtures/AppFixtures.php`` pour créer une configuration initiale lors de la création
    de la base de données.

.. step::
    **Utilisation de la configuration en base**

    Modifiez le site de manière à utiliser ces informations au lieu de celles codées en dur.

.. step::
    **Changement de la configuration par l'interface**

    Ajoutez une page *"Configuration"* accessible dans le menu permettant de modifier ces informations.

Spectacles
~~~~~~~~~~

.. step::
    **Affichage des catégories**

    Faites apparaître les catégories correspondant à un spectacle dans son cadre. Essayez de vous rapprocher le
    plus possible de l'affichage suivant~:

    .. center::
        .. image:: /img/booking_2023_categories.png    
            :width: 450

.. step::
    **Changement de l'affichage des spectacles**

    Modifiez la page affichant la liste des spectacles de manière à ce que~:

    * Les spectacles passés ne soient plus affichés,
    * Les spectacles apparaissent du plus proche dans le temps au plus lointain,
    * Les spectacles soient paginés par page de 4 si ils sont trop nombreux.

.. step::
    **Contraintes sur les dates**

    Modifiez l'édition des spectacles pour respecter les contraintes suivantes:

    * La date de début doit être avant la date de fin,
    * Il ne peut pas y avoir un spectacle en même temps (attention: il peut malgré tout quand même y avoir
    plusieurs spectacles le même jour, si ils ne sont pas à la même heure).

.. image:: /img/seat.png
    :style: float:right
    :width: 128

Places
~~~~~~~

.. step::
    **Génération des places**

    Il existe une interface permettant de générer des places, mais elle n'est pas fonctionnelle!
    Écrivez le code de manière à générer dans la base de données les places existantes.

    .. warning::
        **Attention**: si jamais la salle s'agrandit, on pourrait vouloir re-générer les places. Dans ce cas, il
        est important de ne pas écraser les entrées existantes dans la base de données, car elles pourraient être
        utilisées plus tard dans des relations (par exemple avec des réservations).

    **Nombre de places**

    Modifiez la page d'accueil de manière à ce qu'elle affiche le nombre de places dans la base de données au lieu
    de **100** en dur.

Sécurité
~~~~~~~~

.. step::
    **Sécurisation administrateur**

    Le premier utilisateur qui créera son compte sur le site sera marqué comme administrateur (et pas les suivants).
    Seul lui aura accès à:

    * La configuration du site (cf parties précédentes),
    * La génération des sièges,
    * La création/édition/suppression des spectacles.

.. image:: /img/green_book.png
    :style: float:right
    :width: 128

Réservations
~~~~~~~~~~~~

.. step::
    **Formulaire de réservation**

    Dans l'encart d'un spectacle, ajoutez un lien "réserver" qui n'apparaîtra que pour les utilisateurs connectés.
    Il permettra de créer une réservation pour le spectacle. Il faudra alors fournir un nom de réservation, et
    une ou plusieurs places que l'on souhaite "bloquer". On stockera la date de la réservation, ainsi que
    l'utilisateur qui l'a réalisé.

    .. warning::
        **Attention**: on ne devrait pas pouvoir choisir des places qui ont déjà été réservées par quelqu'un
        d'autre, à vous de proposer une solution ergonomique~!

.. step::
    **Nombre de places restantes**

    Dans l'encart d'un spectacle, affichez le nombre de places restantes (qui ne sont pas réservées) pour ce
    spectacle.

.. step::
    **Plan**

    Modifiez le "Plan" de manière à ce qu'il affiche les places qui proviennent réellement de la base de données.
    Vous indiquerez en opacité réduite les places qui sont occupées.

.. note::
    Une partie de l'évaluation portera sur votre capacité à éviter de faire exploser le nombre de requêtes engendrées
    par votre code. Pour optimiser, gardez un oeil sur le compteur qui apparaît dans le *profiler* en bas:

    .. center::
        .. image:: /img/profiler_requests.png

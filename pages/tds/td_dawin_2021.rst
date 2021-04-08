TD noté DAWIN Formation Initiale
================================

Présentation
------------

Consignes et rendu
~~~~~~~~~~~~~~~~~~

.. warning::
    Ce travail est à produire **individuellement**, vous devrez pour cela créer un dépôt git
    **privé**.

    Le code de base est présent sur ce `dépôt GitLab <https://gitlab-ce.iut.u-bordeaux.fr/gpassault/td-dawin-2021>`_.

    Commencez par faire un Fork du dépôt, et partagez le avec moi (en tant que "Reporter")

    Vous devez impérativement renseigner votre dépôt à l'aide d'une remise sur `le Moodle du cours <https://moodle1.u-bordeaux.fr/course/view.php?id=3634>`_ dans l'espace de remise

    La date limite de remise est le **3 Mai 2021** inclu, ce qui signifie que vos dépôts seront clonés et ne seront plus mis à jour

.. div:: alert alert-danger

    **Information**: nous exécutons des scripts automatiques pour détecter le plagiat de code, si vous nous rendez des devoirs similaires, nous reviendrons à la fois vers le `plagieur et le plagié <http://www.studyrama.com/vie-etudiante/se-defendre-vos-droits/triche-et-plagiat-a-l-universite/plagier-c-est-frauder-et-risquer-des-sanctions-74063>`_.


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

    Nous allons maintenant insérer des données dans la base, pour cela::

        php bin/console doctrine:fixtures:load

    Lancez alors le serveur web et testez::

        symfony serve

    .. note::

        Vous aurez besoin d'un compte admin, et d'un compte non-admin. Pour cela, vous devrez modifier manuellement
        valeur de la colonne ``admin`` dans la base de données!

    Vous devriez voir quelque chose qui ressemble à ceci:

    .. center::
        .. image:: /img/dawin_2021_borrower.png

Travail à faire
---------------

.. step::

    Tri
    ~~~

    Modifiez le code afin que les objets apparaissent dans l'ordre alphabétiques, et les instances dans l'ordre
    de leur numéro de série (croissant).

.. step::

    Correction de bug
    ~~~~~~~~~~~~~~~~~

    Remarquez que lorsque vous éditez l'instance d'un objet, une erreur apparaît:

    .. center::
            .. image:: /img/dawin_2021_borrower_bug.png

    Essayez de comprendre d'où vient cette erreur et corrigez là.


.. image:: /img/lock.png
    :class: right

Sécurisation
~~~~~~~~~~~~

Il existe actuellement trois niveaux d'utilisateurs (non connecté, connecté, connecté et admin), mais aucune
règle de sécurité.

Faites en sorte que le site soit sécurisé, notamment:

.. step::

    * Seuls les utilisateurs au moins connecté devraient pouvoir voir la liste des objets

.. step::

    * Seuls les administrateurs peuvent accéder à la liste des instances (et les éditer, créer etc.)

.. step::

    * Lorsqu'un utilisateur est sur la page "objet", il devrait pouvoir éditer et créer ces derniers uniquement
      si il est administrateur.

.. note::
    Attention: il ne s'agit pas uniquement de cacher les liens, mais bien de protéger les pages!

.. image:: /img/filter.png
    :class: right

Filtrage
~~~~~~~~

La page "objets" est dotée d'un formulaire permettant de filtrer les objets par catégories, qui n'est
pour l'instant pas fonctionnel (le formulaire est créé et affiché mais pas exploité).

.. step::
    Modifier le code afin qu'il effectue le filtrage.

Réservations
~~~~~~~~~~~~

Un utilisateur peut réserver un objet, le code de base cherche alors la première instance disponible et
la réserve pour lui.

.. step::
    * Modifiez le code afin que si l'utilisateur a déjà réservé une instance de l'objet, il voit apparaître
    dans la colonne "actions" sa réservation et puisse l'annuler.

.. step::
    * Aussi, si l'utilisateur est emprunteur de l'objet, modifiez l'affichage afin qu'il le voit dans la
    page objets.

.. step::
    * Enfin, affichez le nombre d'objets disponibles (c'est à dire ni réservé ni emprunté) au lieu des ``??``.

.. image:: /img/workflow.png
    :class: right

Workflow
~~~~~~~~

Voici comment l'application peut être utilisée actuellement:

1. Un utilisateur se connecte et réserve un objet,
2. Il va voir l'administrateur pour récupérer l'objet, et ce dernier lui donne et va sur l'application pour
  marquer ce dernier comme attribué à l'utilisateur (il définit alors la date de retour)
3. Il est alors possible pour l'utilisateur et l'administrateur de suivre les objets prétés

.. note::
    Cette procédure est fonctionnelle, mais l'étape 2 est très pénible car l'administrateur doit éditer l'instance,
    enlever le "Réservé par" et le déplacer dans "Emprunté par".

Sur la page "instances", lorsqu'un objet est réservé, ajouter deux boutons:

.. step::
    * Un bouton "attribuer", qui redirige vers un formulaire qui demande la date de retour. Lorsque ce formulaire
      est rempli, la personne qui avait réservé l'objet est maintenant la personne emprunteuse de l'objet, 
      la date d'emprunt est la date d'aujourd'hui, et la date de retour celle entrée

.. step::
    * Un bouton "annuler", qui dé-réserve l'objet

Suivi des objets
~~~~~~~~~~~~~~~~

Modifiez la page d'accueil afin qu'elle se comporte différemment pour les utilisateurs:

.. step::

    * Pour un administrateur, affichez les objets qui n'ont pas été retournés, mais qui auraient du l'être
      (les objets empruntés avec une date de retour dans le passé)

.. step::

    * Pour les utilisateurs non administrateurs, affichez les objets que l'utilisateur en question a emprunté,
    ainsi que leur date de retour. Si la date est passée, on affichera l'objet différement (par exemple en rouge).

.. image:: /img/tuning.png
    :class: right

Optimisations (bonus)
~~~~~~~~~~~~~~~~~~~~~

Constatez que le nombre de requêtes de l'application n'est pas réellement optimisé (il est possible de
voir cette information dans la barre de développement). Essayez de minimiser le nombre de requêtes envoyées
à la base de données.
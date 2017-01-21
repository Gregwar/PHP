.. image:: /img/poll.png
    :class: right

TD noté DAGPI
=============

Présentation
------------

Consignes
~~~~~~~~~

**`----> Merci de renseigner votre dépôt ici !!! <http://gregwar.com/rendu/>`_**

Ce travail est à rendre sous forme de **dépôt**. Mon identifiant Bitbucket et
Github est Gregwar.

Ce travail est a réaliser **individuellement**.

Vous avez jusqu'au **29 Janvier 2017** pour me le remettre.

Archive
~~~~~~~

.. |archive| image:: /img/archive.png

.. important::
    `|archive| Télécharger l'archive library.zip </files/library.zip>`_
    
Dans ce TD, nous allons développer un système simplifié d'emprunt de livre pour une bibliothèque.
Vous partirez d'une application de base, similaire au TD 4, et la modifierai en suivant les instructions.

Prise en main
~~~~~~~~~~~~~

Commencez par décompresser l'archive et par déployer la base de données contenue dans ``sql/library.sql``.
Vous devrez également modifier le fichier ``config.php`` pour y mettre vos paramètres. La base de données
contient les tables:

* ``livres``: les livres disponibles à la bibliothèque
* ``exemplaires``: chaque exemplaire est une copie d'un livre (par exemple le livre Harry Potter peut
  être disponible en 5 exemplaire, chacun d'eux sera représenté en base pour pouvoir être emprunté)
* ``emprunts``: un emprunt concerne un exemplaire qui ne sera donc plus disponible pendant une certaine
  durée.

.. image:: /img/books.png
    :class: right

Modifications
-------------

.. step::

    #-) Liens admin
    ~~~~~~~~~~~~~~~

    Modifier le code pour que le lien "Administration" n'apparaisse que lorsque vous
    n'êtes  pas identifiés, et que les liens "Ajouter un livre" et "Déconnexion" n'apparaissent que
    lorsque vous êtes identifiés.

.. step::

    #-) Plusieurs identifiants
    ~~~~~~~~~~~~~~~~~~~~~~~~~~

    Il n'y a actuellement qu'un seul identifiant (``admin``/``password``) dans le fichier de
    configuration. Modifiez sa structure pour pouvoir y placer facilement plusieurs identifiants
    valides pour devenir administrateur (comme ``admin1``/``password1`` et ``admin2``/``password2``).

.. step::

    #-) Fiches livres
    ~~~~~~~~~~~~~~~~~

    Les livres ne mènent actuellement à aucune fiche. Ajoutez une page "fiche livre" accessible au
    clic dans la liste des livres qui permet de visualiser le synopsis et la grande image.

.. step::

    #-) Exemplaires
    ~~~~~~~~~~~~~~~

    Modifiez la fonction ``insertBook()`` du modèle afin qu'elle créé autant d'exemplaires que précisé
    par ``$copies``.

.. step::

    #-) Listage des exemplaires
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Sur la fiche d'un livre, indiquez combien d'exemplaires sont encore disponibles pour être empruntés,
    et listez-les (vous pouvez par exemple utiliser une liste à puce ou un tableau).

    La seul propriété d'un exemplaire est son identifiant (id), on pourrait imaginer que le bibliothécaire
    l'inscrit sur la deuxième de couverture.

.. image:: /img/view.png
    :class: right

.. step::

    #-) Formulaire d'emprunt
    ~~~~~~~~~~~~~~~~~~~~~~~~

    À partir de la fiche d'un livre, et lorsque nous sommes identifiés comme administrateur, il doit
    être possible de cliquer sur un bouton "emprunter" à coté d'un exemplaire, ce qui nous mène au
    formulaire d'emprunt.

    Ce dernier contient:

    * Le nom de la personne qui emprunte (texte)
    * Une date de fin

    La date de début doit être automatiquement affectée à aujourd'hui.

    .. note::

        Note: La date de fin est indicative, ce qui signifie que l'administrateur
        devra manuellement préciser quand un emprunt se termine (cf plus bas).

.. step::

    #-) Affichage des livres empruntés
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Modifiez la fiche d'un livre pour que les exemplaires empruntés soient marqués comme non disponible
    (en rouge ou en opacité réduite par exemple).

    Vous indiquerez également combien d'exemplaires sont disponibles à l'emprunt.

.. step::

    #-) Retour des livres
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Ajouter un bouton "retour" à coté d'un exemplaire qui n'apparaît que pour l'administrateur et 
    qui marque l'exemplaire comme retourné (c'est à dire l'emprunt comme fini).


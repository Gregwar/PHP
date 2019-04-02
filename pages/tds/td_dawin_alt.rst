TD noté DAWIN Formation en Alternance
================================

Présentation
------------

Consignes et rendu
~~~~~~~~~~~~~~~~~~

.. warning::
    Ce travail est à produire **individuellement**, il doit se réaliser sur le `GitLab du département <https://gitlab-ce.iut.u-bordeaux.fr/>`_ dans un **dépôt privé**

    **N'oubliez pas de donner les droits à Marty Lamoureux (marlamoureux)**

    La date limite de remise est le **6 Mai 2019** inclu, ce qui signifie que vos dépôts seront clonés et ne seront plus mis à jour à partir de cette date.

.. div:: alert alert-danger

    **Information**: nous exécutons des scripts automatiques pour détecter le plagiat de code, si vous nous rendez des devoirs similaires, nous le détecterons et reviendrons à la fois vers le `plagieur et le plagié <http://www.studyrama.com/vie-etudiante/se-defendre-vos-droits/triche-et-plagiat-a-l-universite/plagier-c-est-frauder-et-risquer-des-sanctions-74063>`_.

Travail à effectuer
~~~~~~~~~~~~~~~~~~~

Vous devez réaliser une application Laravel pour pouvoir mesurer la consommation en calories (kcal) des repas de vos utilisateurs.

Durant la réalisation du projet, vous ferez attention aux points suivants :

- Les données de l'application devront être propres à chaque utilisateur
- Le respect de bonnes pratiques est un bonus considéré dans la note (n'enlève pas de points)
- Ne pas consommer un nombre important de requêtes SQL (problème N+1), et maintenir des temps d'ouverture de page inférieurs à une seconde

Pour cela, votre application doit pouvoir : 

.. step::

    #-) Authentification
    ~~~~~~~~~~~~~~~~~~~~~

    Gérer l'inscription et l'authentification des utilisateurs (la partie "Mot de passe oublié" n'est pas requise)

.. step::

    #-) Gestion des repas
    ~~~~~~~~~~~~~~~~~~~~~

    Il doit être possible de créer/voir/modifier/supprimer un repas

    Ces repas sont constitués d'une date, d'un type de repas (Petit Déjeuner, Déjeuner, Encas, Dîner)

.. step::

    #-) Gestion des produits consommés
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Pour chaque repas, l'utilisateur doit pouvoir saisir les produits consommés.

    Ces derniers doivent être saisis uniquement via leur code-barre.

    Utilisez `l'API d'Open Food Facts <https://fr.openfoodfacts.org/data>`_ pour rechercher un produit par son code-barre.

    Voici un exemple de code qui affiche le nom du produit ``3029330003533``::

        <?php

        $url = 'https://fr.openfoodfacts.org/api/v0/produit/3029330003533.json';
        $data = json_decode(file_get_contents($url), true);

        echo $data['product']['product_name']."\n";

    Ceci est juste un exemple, mais vous pouvez `utiliser Guzzle <http://docs.guzzlephp.org/en/stable/quickstart.html>`_ pour une approche plus "objet".

    Avec ces données là, vous devez enregistrer le produit dans votre base de données, via un modèle ``Product`` par exemple.
    Vous y importerez depuis l'API des informations utiles comme le nom, l'image, le code-barre et bien sûr la valeur énergétique d'un produit (attention aux valeurs selon l'unité !).

    Bien sûr, si un produit existe déjà en base, on ne va pas le réimporter

.. step::

    #-) Energie consommée sur un repas
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Pour chaque repas, calculer et afficher l'énergie totale consommée.

.. step::

    #-) Energie consommée sur une journée
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Sur la vue des repas, afficher l'énergie consommée par tous les repas de chaque jours.

    Pour simplifier la vue, il est préférable de grouper la liste des repas par jour, et d'afficher ce total avec le jour.

.. step::

    #-) Statistiques
    ~~~~~~~~~~~~~~~~

    Ajoutez une page avec des analyses statistiques sur les données saisies :

    - Les 5 produits consommés les plus élevés énergétiquement
    - Les 5 produits consommés les moins élevés énergétiquement
    - Les 5 produits dont la totalité consommée sont les plus élevés énergétiquement (nombre_total * énergie)
.. slide:: middleSlide

TD1
===

.. slide:: darkSlide fullSlide slideOnly

SOME TROUBLE?

.. div:: inSlide

    .. discover::
        "What ``strlen``?"

    .. discover::
        → Type ``http://php.net/``+``strlen``

    .. center::
        .. discover::
            .. image:: /img/cat.gif

.. slide::

.. important::
    `Télécharger l'archive td1.zip <../files/td1.zip>`_

Astuce
------

Lorsque vous ignorez la signification d'une fonction **PHP**, comme par exemple ``strlen``,
rendez vous simplement à l'adresse `php.net/strlen <http://php.net/strlen>`_ (ajoutez votre
fonction ou mot clé à la suite de ``http://php.net``). Vous arriverez alors soit directement sur la page de la fonction
soit sur une liste de fonction et éventuellement dans la recherche du site.

Exercice 1: Prise en main
-------------------------

.. step::
    **#-. La ligne de commande**

    L'intérpréteur **PHP** peut être utilisé en ligne de commande, ce qui vous permettra de prendre le langage
    en main et de faire des tests. Créez un fichier ``hello.php`` et placez-y le contenu suivant::

            <?php

            echo "Hello world !\n";

    Pour éxécutez votre code, lancez dans un terminal::

        php hello.php

    Le message ``Hello world!`` devrait apparaître sur votre écran.

.. step::

    **#-. Quelques exemples**
        
    Parcourez les exemples du dossier ``exercice1/``, lisez bien les commentaires et explications
    et exécutez les pour en comprendre le comportement.

Exercice 2: Les bases
---------------------

Comme :doc:`vu en cours </bases#arrays>`,  le tableau (``array()`` ou encore ``[]`` dans les
dernières versions) représente la structure de données la plus importante en **PHP**.

Il est important de maîtriser parfaitement la création et la manipulation de ces tableaux avant
de pouvoir aller plus loin.

Ouvrez à présent le fichier ``functions.php``. Ce fichier contient des fonctions
dont vous devez écrire le code:

.. step::
    
    ** #-. ``somme_entiers($n)`` **

    Cette fonction calcule la somme des n premiers entiers et la retourne.

.. step::

    ** #-. ``somme_tableau($tab)`` **

    Cette fonction doit calculer la somme des éléments d'un tableau et la retourner.

.. step::

    ** #-. ``valeur_min($tab)`` **
    
    Cette fonction doit retourner l'élément le plus petit d'un tableau passé en paramètre.

.. step::

    ** #-. ``valeur_min_indice($tab)`` **
    
    Cette fonction doit retourner l'indice de l'élément le plus petit d'un tableau passé en paramètre.

.. step::

    ** #-. ``tri($tab)`` **

    Cette fonction trie les éléments du tableau passé en paramètre et les retourne. Elle ne doit pas
    utiliser les fonctions de tri de PHP, mais doit en revanche utiliser ``valeur_min_indice($tab)``.

    *Note: Comme vous vous en doutez, il s'agit d'un exercice, la fonction ainsi produite ne sera 
    pas très efficace.*

Exercice 3: Manipulations de tableaux
-------------------------------------

Génération d'un jeu de données
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. step::

    Tout d'abord, utilisez le script ``generate.php`` (dans ``exercice3/``) pour 
    générer des données::

        php generate.php > data.php

    Vous pourrez alors utiliser ces données dans vos scripts en les incluant::

        <?php
        $data = @include('data.php');

    Les données sont constituées d'un grand tableau contenant des personnes (nom, prénom
    et age).

.. step::
    #-. Affichage des données
    ~~~~~~~~~~~~~~~~~~~~~~~~~

    Ecrivez un premier fichier ``list.php`` qui affiche les données sur chaque ligne
    sous la forme::

        * Prénom Nom (Age)
        * Prénom Nom (Age)
        * Prénom Nom (Age)
        ...

.. step::
    #-. Trouver l'individu le plus jeune
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Créez un second fichier ``youngest.php`` qui affiche l'individu le prénom, le nom
    et l'age de l'individu le plus jeune de vos données.

.. step::

    #-. Occurences des prénoms
    ~~~~~~~~~~~~~~~~~~~~~~~~~~

    Créez un fichier ``names.php`` qui affiche tous les prénoms et leur nombre d'occurences
    dans le fichier.

Exercice 4: Gestion d'un magasin
--------------------------------

Dans cet exercice, on s'intéresse à la gestion d'un magasin. Le code source est en fait un utilitaire en
ligne de commande qui permet de naviguer parmi les produits.

Questions
~~~~~~~~~

.. step::
    Pour commencer, lisez le code source disponible dans le dossier **exercice2/** afin d'en comprendre son
    fonctionnement.

    **#~. Quel est l'interêt du tableau ``$actions`` ? Quelle(s) autre(s) méthode aurait pu être employée ?**

    .. spoiler::
        Ce tableau permet de faire la correspondance entre les actions données au script et les fonction à apeller.
        Grâce aux fonctions anonymes (depuis **PHP 5.3**), cette correspondance peut se faire directement en insérant
        les fonctions dans le tableau en tant qu'éléments. Un ``switch/case`` aurait pu être employé ici, mais la
        maniabilité n'aurait pas été la même, en effet, l'usage est ainsi capable d'afficher la liste des fonctions disponibles.

    **#~. Dans ``store.php``, on observe des comparaisons utilisant trois signes = "``===``", à quoi cela
    sert t-il ?**

    .. spoiler::
        Cette notation vous permet de comparer le contenu d'une variable ET de son type, par exemple::
     
            <?php

            if (0 == null) { // Vrai
                echo "0 == null!\n";
            }

            if (0 === null) { // Faux
                echo "0 === null!\n";
            }


    **#~. Lisez la documentation de ``implode()``, à quoi sert cette fonction ? Comment effectuer l'opération inverse ?**

    .. spoiler::
        ``implode()`` sert à concaténer les éléments d'un tableau à l'aide d'un séparateur. Cette fonction est très
        utile pour convertir des tableaux en chaînes de caractères lisible, et dans l'autre sens à l'aide de ``explode()``
        obtenir un tableau depuis une telle chaîne.

    **#~. Observez de plus près l'appel à ``call_user_func_array``,
    Est t-il possible de faire ce genre de chose dans un langage fortement typé tel que le C ou Java ? Pourquoi ?**

    .. spoiler::
        Non. Cette fonction est un exemple de ce qu'il est possible de faire à l'aide d'un langage de haut niveau et
        interprété tel que le **PHP**.

    **#~. Essayez d'ajouter un produit à l'aide de la commande ``php store.php add nom_du_produit quantité``. Comment la liste
    des produits est t-elle sauvegardée ?**

    .. spoiler::
        La liste des produits est sauvegardée dans ``products.php``, elle est écrite à l'aide de ``file_put_contents()``
        et de ``var_export()`` qui permettent d'écrire la variable dans le fichier telle quelle.

Implémentation
~~~~~~~~~~~~~~

.. step::
    **#~. Définition du prix**

    Ajoutez une commande "``php store.php set-price [product] [price]``" qui définit le prix d'un produit.

.. step::
    **#~. Pouvoir enlever des produits**

    Implémentez une commande "``php store.php remove [product] [quantity]``" qui enlève ``quantity`` produit de
    nom ``product`` du magasin.

.. step::
    **#~. Ajout de description**

    Modifiez le code de manière à ajouter une entrée "description" dans le tableau de chaque produit et ajoutez une commande 
    "``php store.php set-description product "description du produit"``" qui permet de définir la description d'un produit.

.. step::
    **#~. Recherche de produits**

    Créez une commande "``php store.php search [keyword]``" qui permet d'effectuer une recherche parmi les produits
    du magasin par nom ou description et qui affiche la liste des résultats.

.. step::
    **#~. Import et export CSV**

    Un fichier CSV est un tableau délimité du type:

    .. code-block:: csv

        "produit1";"12";"32"
        "produit2";"102";"11"

    A l'aide des fonctions :method:`fgetcsv` et :method:`fputcsv`, ajoutez une commande "``php store.php import [fichier.csv]``"
    et "``php store.php export [fichier.csv]``" pour importer et exporter la liste des produits au format CSV.


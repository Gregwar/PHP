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

Exercice 1: Les bases
---------------------

Environment
~~~~~~~~~~~

.. step::
    **#~. La ligne de commande**

    L'intérpréteur **PHP** peut être utilisé en ligne de commande, ce qui vous permettra de prendre le langage
    en main et de faire des tests. Créez un fichier ``hello.php`` et placez-y le contenu suivant::

            <?php

            echo "Hello world !\n";

    Pour éxécutez votre code, lancez dans un terminal::

        php hello.php

    Le message ``Hello world!`` devrait apparaître sur votre écran.

.. step::

    **#~. Quelques exemples**
        
    Parcourez les exemples du dossier ``exercice1/``, lisez bien les commentaires et explications
    et exécutez les pour en comprendre le comportement.

Exercice 2: Gestion d'un magasin
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

Exercice 3: Programmation fonctionnelle
---------------------------------------

.. step::
    Ecrivez une fonction ``map()`` qui prend en paramètre un tableau et un fonction
    et qui retourne un tableau en ayant appliqué la fonctions à tout ses éléments.
    Par exemple::

        <?php
        $t = [1, 2, 3, 4];
        $p = map($t, function($x) { return 2*$x; });
        // Double des éléments: [2, 4, 6, 8]

.. step::
    Ecrivez une fonction ``filter()`` qui prend en paramètre un tableau et une fonction
    et qui retourne un tableau ne contenant que les éléments pour lesquels la fonction
    est vraie. Pae exemple::

        <?php
        $t = [1, 2, 3, 4];
        $p = filter($t, function($x) { return $x%2==0; });
        // Elements pairs: [2, 4]

.. step::
    Ecrivez une fonction ``reduce()`` qui prend en paramètre un tableau et une fonction
    et qui retourne la fonction appliquée aux deux premiers éléments du tableau, puis au
    résultat obtenu et à l'élément suivant et ainsi de suite. Par exemple::

        <?php
        $t = [1, 2, 3, 4];
        $p = reduce($t, function($x, $y) { return $x+$y; });
        // Somme des éléments: 10

.. step::
    Enfin, utilisez le script ``generate.php`` pour générer le fichier ``persons.php``:

    .. code-block:: no-highlight
        php generate.php > persons.php

    Puis, à l'aide des fonctions ci-dessus, obtenez la somme de l'argent détenu par les
    personnes qui se prénomment ``John``.


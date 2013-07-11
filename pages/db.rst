.. slide:: middleSlide

Bases de données
================

.. slide::

Introduction
------------

.. image:: /img/db.png
    :style: float:right

Les bases de données représentent un point clé de l'organisation d'une application
web. **PHP** propose des extensions pour piloter les bases les plus courantes :

* MySQL
* Postgres
* SQLite
* Oracle

.. textOnly::
    Pour ce cours, nous considérerons que vous avez déjà des notions de bases de données,
    et ne parlerons que de l'intégration des bases de données dans du code **PHP**. Notez que
    nous nous focaliserons sur les bases de données relationelles, mais qu'il existe également
    d'autre type de bases.

.. slide::

Le requêtage
------------

Présentation
~~~~~~~~~~~~

.. textOnly::
    L'interêt du requêtage est d'intéragir dynamiquement avec la base de données,
    c'est à dire (entre autre):

* Effectuer des requêtes à paramètres dynamiques
* Modifier la base de données selon des formulaires
* Itérer parmis des réultats
* **Etablir une correspondance entre le monde objet et le monde relationnel**

.. slide::

PDO
~~~

**PHP** propose une interface générique pour accéder aux bases de différents types:
:method:`PDO`, pour **PHP Data Object**.

L'utilité est de faire abstraction du type de la base de données utilisée.

.. slide::

Connexion
~~~~~~~~~

.. textOnly::
    La connexion peut être établie en instanciant un ``PDO`` comme cela:

::

    <?php

    /**
     * Créer une instance pour communiquer avec la base de données :
     * - DSN: Data Source Name
     * - Utilisateur
     * - Mot de passe
     */
    try {
        return new PDO(
            'mysql:dbname=user;host=127.0.0.1',
            'user', 
            'pass'
        );
    } catch (PDOException $exception) {
        echo 'Erreur: '.$exception->getMessage()
            ."\n";
        exit(1);
    }

.. textOnly::
    Les trois paramètres sont le nom de la source des données -et par conséquent le nom
    du type de la base de données utilisée-, le nom d'utilisateur et le mot de passe. En cas
    d'échec, une exception de type ``PDOException`` sera levée.

.. slide::

Requêtage simple
~~~~~~~~~~~~~~~~

.. textOnly::
    Voici un exemple de requêtage utilisant le **PDO**:

::

    <?php
    $pdo = include('connection.php');

    $sql = 'SELECT * FROM users';

    echo "Utilisateurs :\n";

    foreach ($pdo->query($sql) as $row) {
        echo '* ';
        echo $row['firstname'] . ' ';
        echo $row['lastname'] . ' ';
        echo '(' . $row['age'] . ' ans)';
        echo "\n";
    }

.. slide::

Attention aux SELECT *
~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Les requêtes utilisant la notation ``SELECT * FROM ...`` peuvent sembler pratiques, mais
    elles deviennent vite problématique dans le cas suivant par exemple:

::

    <?php
    //...
    $query = $pdo->query(
        'SELECT * FROM films INNER JOIN 
        genres ON genres.id = films.genre_id'
        );

    foreach ($query as $row) {
        // Nom du genre, ou du film?
        echo $row['nom']."\n";
    }

.. slide::

Préparation de requêtes
~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Auparavant, il arivait souvent que les requêtes soient générées à la main par concaténation
    avec des variables provenant du reste de l'application puis executées comme dans l'exemple précédent.
    Cette méthode pose cependant plusieurs problèmes :
    
    * Code parfois illisible et complexe
    * Difficultés liées à la sécurité (échappement)
    * Problème de performance, car si la même requête est exécutée avec des paramètres différents,
    certaines bases de données peuvent améliorer les performances

.. textOnly::
    Pour palier à ces défauts, la préparation de requêtes est maintenant employée:

::

    <?php
    $pdo = include('connection.php');

    $sql = 'SELECT * FROM users WHERE age > :age';

    $query = $pdo->prepare($sql);
    $query->execute(array('age' => 50));

    echo "Utilisateurs qui ont plus de 50 ans :\n";

    foreach ($query->fetchAll() as $row) {
        echo '* ';
        echo $row['firstname'] . ' ';
        echo $row['lastname'] . ' ';
        echo '(' . $row['age'] . ' ans)';
        echo "\n";
    }

.. slide::

Insertion
~~~~~~~~~

.. textOnly::
    L'insertion peut se faire de la même manière que le requêtage:

::

    <?php
    $pdo = include('connection.php');

    $insert = $pdo->prepare('INSERT INTO users 
        (firstname,lastname,age) VALUES (?,?,?)');

    // Insère 10 Jean Durand de 40 ans
    for ($i=0; $i<10; $i++) {
        $insert->execute(array('Jean', 'Durand',  40));
    }


.. slide::

Les transactions
~~~~~~~~~~~~~~~~

.. textOnly::
    Le système de ``PDO`` supporte le requêtage transactionnel, c'est à dire
    qui permet d'effectuer des actions puis de les intégrer, ou de tout annuler de manière
    atomique:

::

    <?php
    $pdo = include('connection.php');

    // Commence une transaction
    $pdo->beginTransaction();

    // Actions
    $pdo->exec('DELETE FROM users WHERE 
        age = 40');

    $pdo->exec('INSERT INTO users 
        (firstname,lastname,age) VALUES
        ("Jean","Durand",40)');

    // Commit our rollback, pour confirmer
    // ou annuler
    $pdo->commit();
    //$pdo->rollback();

.. textOnly::
    De cette manière, si quelque chose se passe mal, les requêtes seront toutes annulées,
    et les états incohérents pourront être évités.

.. slide::

Les ORM
-------

Présentation
~~~~~~~~~~~~

.. center::
    .. image:: /img/orm.jpg
        :width: 650

.. textOnly::
    Un **ORM**, pour Object Relational Mapping, désigne le fait de réaliser un *mapping*,
    ou une association entre le monde relationnel (tables, lignes, champs ...) et le monde objet
    (classes, instances, attributs ...).

    Ce mapping est généralement fait à l'aide de fichiers de configuration ou d'annotations.

.. slide::

Correspondance
~~~~~~~~~~~~~~

+-------------------------+-------------------------+
| Relationnel             | Objet                   |
+-------------------------+-------------------------+
| Table                   | Classe (ou entité)      |
+-------------------------+-------------------------+
| Ligne                   | Instance                |
+-------------------------+-------------------------+
| Colonne                 | Attribut                |
+-------------------------+-------------------------+
| Clé étrangère           | Référence               |
+-------------------------+-------------------------+

*Cette correspondance ressort si l'on compare un schéma entité association (MCD) avec un schéma UML.*

.. slide::

Utilisation
~~~~~~~~~~~

L'**ORM** se base sur la notion d'entité, qui sont des classes mappées avec la base
de données (correspondance avec les tables).

Les avantages sont notamment:

* La persistence des objets
* Le requêtage, parfois à travers une couche d'abstraction supplémentaire
* La notion de transaction est préservée
* La création et la mise à jour de la structure de la base de données à partir de la définition des entités
* Possibilité de faire abstraction du système de gestion de base de données sous-jacent

TD
---

* :doc:`tds/td4`


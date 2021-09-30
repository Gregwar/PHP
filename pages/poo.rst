.. url:: programmation-orientee-objet 

.. slide:: middleSlide

Programmation orientée objet
============================

.. slide:: darkSlide fullSlide slideOnly

.. div:: importantText
    OBJET?

.. slide:: darkSlide fullSlide slideOnly

.. div:: importantText
    HERITAGE?

.. slide:: darkSlide fullSlide slideOnly

.. div:: importantText
    CLASSE ABSTRAITE?

.. slide:: darkSlide fullSlide slideOnly

.. div:: importantText
    POLYMORPHISME?

.. slide:: darkSlide fullSlide slideOnly

.. div:: importantText
    SURCHARGE?

.. slide::

Présentation
------------

Classes et instanciation
~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    En **PHP**, voici à quoi ressemble une classe:

::

    <?php

    class User
    {
        protected $name = null;

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function sayHello()
        {
            echo 'Hello, I am '.$this->name."!\n";
        }
    }

.. textOnly::
    Remarquez que:

        * Les attributs peuvent être **initialisés** directement dans leur définition
        * Les **modifieurs** ``private``, ``protected`` et ``public`` sont présents,
          comme dans beaucoup d'autre langages
        * Le **constructeur** se définit à l'aide de la fonction magique ``__construct()``
        * Les **attributs et méthodes** de classes sont accessibles par l'opérateur ``->``, le point
        étant réservé pour la concaténation de chaines

.. textOnly::
    Un objet de cette classe s'instanciera alors de la manière suivante:

.. discover::
    .. slideOnly::
        ------------
   
    ::

        <?php

        $user = new User('Bob');
        $user->sayHello();

.. slide::

Méthodes et attributs statiques
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

En **PHP**, il est possible de rendre des méthodes et des attributs statiques à l'aide du modifieur
``static``::

    <?php

    class Example
    {
        public static $counter = 0;

        public $number;

        public function __construct()
        {
            $this->number = ++self::$counter;
        }
    }

    $a = new Example; echo $a->number."\n"; //1
    $b = new Example; echo $b->number."\n"; //2

.. textOnly::
    Les attributs et méthodes statiques ne sont pas spécifiques à une instance mais **globaux**.
    Dans l'exemple ci-dessus, l'attribut ``$counter`` n'est pas répété dans ``$a``
    et dans ``$b`` mais n'est présent qu'une seule fois, ce qui explique que les valeurs 
    sont différentes.

.. slide::

Héritage
~~~~~~~~

L'héritage s'écrit avec ``extends``::

    <?php

    class User
    {
        public $name = 'Bob';
    }

    class UserWithAge extends User
    {
        public $age = 34;
    }

    $bob = new UserWithAge;
    echo $bob->name, "\n"; // Bob
    echo $bob->age, "\n"; // 34


.. slide::

Classe mère
~~~~~~~~~~~

.. textOnly::
    L'accès aux méthodes et aux attributs de la classe mère peut se faire à l'aide du mot clé
    ``parent``:

::

    <?php

    class Rectangle
    {
        protected $width;
        protected $height;

        public function __construct($width, $height)
        {
            $this->width = $width;
            $this->height = $height;
        }
    }

    class Square extends Rectangle
    {
        public function __construct($width)
        {
            parent::__construct($width, $width);
        }
    }


.. slide::

Classes abstraites
~~~~~~~~~~~~~~~~~~

.. textOnly::
    **PHP** vous permet de déclarer des classes ou des méthodes comme abstraites à l'aide du mot clé
    ``abstract``. Si au moins une méthode d'une classe est abstraite, ou que la classe
    est marquée elle même comme abstraite, elle ne pourra pas être instanciée:

::

    <?php

    abstract class Message
    {
        abstract public function getName(): string;
        abstract public function getBody(): string;

        public function display(): void {
            echo 'From: '.$this->getName()."\n";
            echo 'Contents: '.$this->getBody()."\n";
        }
    }

    $m = new Message; // Erreur

.. slide::

Méthodes et classes finales
~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Il est possible d'utiliser le mot clé ``final`` sur une classe ou une méthode, afin d'en
    empêcher l'héritage:

::

    <?php

    class Quadruped
    {
        public final function legs(): int
        {
            return 4;
        }
    }

    class Cat extends Quadruped
    {
        // Erreur, on ne peut pas surcharger cette fonction
        public function legs(): int
        {
            return 3;
        }
    }

.. slide::

Interfaces
~~~~~~~~~~

.. textOnly::
    En **PHP**, les interfaces se déclarent comme une classe à l'aide du mot clé ``interface``,
    elles ne contiennent que des prototypes de méthodes. Une classe peut implémenter une interface avec
    la notation "``implements`` (interface)":

::

    <?php

    interface CanSpeak
    {
        public function speak();
    }

    class Human implements CanSpeak
    {
        public function speak()
        {
            echo "I am Human!\n";
        }
    }

    $human = new Human;
    $human->speak();


.. slide::

Exceptions
~~~~~~~~~~

.. textOnly::
    Comme la plupart des langages orienté objet, **PHP** propose un mécanisme d':method:`exceptions`
    permettant d'affiner la gestion d'erreur. Par défaut, les exceptions remonteront jusqu'à être disposée sous forme d'erreur:

::

    <?php

    throw new Exception('Error!');

    
.. discover::
    Donnera lieu à :
    
    .. code-block:: no-highlight
        PHP Fatal error:  Uncaught exception 'Exception'
        with message 'Error!' in uncaught.php:3
        Stack trace:
        #0 {main}
          thrown in uncaught.php on line 3

.. slide::

Try/Catch
~~~~~~~~~

.. textOnly::
    Il est possible de capturer les exceptions grâce aux mots clés ``try`` et ``catch``:

::

    <?php

    try
    {
        throw new Exception('Bad');
    } 
    catch (Exception $e)
    {
        echo 'Erreur: ' . 
            $e->getMessage() . "\n";
    }


.. slide::

Exception personalisée
~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    **PHP** vous offre également la possibilité de surcharger les classes d'exception, dont ``Exception`` est
    la "racine" pour créer vos propres types d'exceptions:

::

    <?php

    class MyException extends Exception
    {
    }

    try
    {
        throw new MyException();
    } catch (MyException $my) {
        echo "MyException\n";
    } catch (Exception $e) {
        echo "Exception\n";
    }


.. textOnly::
    Comme vous le constatez, les exceptions peuvent être capturées avec un certain ordre de priorité.

.. slide::

Remarques
~~~~~~~~~

.. textOnly::
    Il n'y a pas d'héritage multiple en **PHP**

    **PHP** ne supporte pas la surcharge, méthodes ayant le même nom mais des prototypes
    différents, vous pouvez cependant utiliser des paramètres optionnels et non typés, voici un exemple
    illustrant un argument optionel ayant une valeur par défaut:

.. slideOnly::
    * Pas d'héritage multiple
    * Pas de **surcharge** possible, mais les arguments peuvent être optionnels et non typés:

::

    <?php

    class Printer
    {
        public function showNumber($x = 42)
        {
            echo "x = $x\n";
        }
    }

    $printer = new Printer;
    $printer->showNumber(); // x = 42
    $printer->showNumber(67); // x = 67

.. slide::

Particularités
--------------

Références
~~~~~~~~~~

.. textOnly::
    Lorsque l'on passe un objet en argument d'une fonction, on ne passe pas une copie de cette objet
    mais une référence vers l'objet (à ne pas confondre avec une référence vers la variable qui décrit l'objet).
    Ainsi, toute modification se fera directement sur l'objet:

::

    <?php

    class Car
    {
        public $speed = 50;
    }

    function func($car)
    {
        $car->speed = 90;
    }

    $car = new Car;
    func($car);
    echo $car->speed."\n"; // 90


.. slide::

Attention aux références
~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Attention à ne pas confondre référence vers un objet et référence entre les variables, regardons
    l'exemple suivant:

::

    <?php
    class Car
    {
        public $speed = 50;
    }

    $car = new Car;
    $car2 = $car;
    $car2->speed = 90;
    echo $car->speed."\n"; // 90
    $car2 = null;
    echo gettype($car)."\n"; // object

    $car3 = &$car;
    $car3 = null;
    echo gettype($car)."\n"; // null

.. textOnly::
    Dans ce cas, la ligne ``$car2 = $car`` fait en sorte que la variable ``$car2`` référence
    le même objet que ``$car``. Ainsi la modification de l'attribut sur ``$car2->speed`` est aussi
    visible sur ``$car->speed``. En revanche, la variable ``$car2`` est bien **différente**
    de ``$car``, c'est pourquoi l'affecter à ``null`` ne change nullement la valeur de ``$car``;
    En revanche, l'utilisation de l'opérateur de référence ``&`` pour créer la variable ``$car3``
    fait en sorte que ``$car3`` soit un **alias** de ``$car``, il référencera alors non pas seulement
    le même objet mais aussi la **même variable**.

.. slide::

Clonage
~~~~~~~

.. textOnly::
    Si vous souhaitez créer une **copie** d'un objet, vous pouvez utiliser le mécanisme de
    **clonage** de cet objet. **PHP** vous propose pour cela d'utiliser le mot clé ``clone``. 

::

    <?php

    class Car
    {
        public $speed = 50;
    }

    $car = new Car;
    $car->speed = 70;
    $car2 = clone $car;
    $car2->speed = 90;
    echo $car->speed."\n"; // 70
    echo $car2->speed."\n"; // 90

.. slide::

Clonage personnalisé
~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Son comportement peut cependant être non trivial et soulève souvent des questions: Faut t-il 
    cloner également les objets référencés? Est-ce que toute les propriétés doivent être clonées?
    Pour répondre à ces questions, il vous est possible d'écrire votre propre méthode de clonage, avec 
    le nom "magique" ``__clone()``:

::

    <?php

    class Identified
    {
        public static $instances = 0;
        public $instance;

        public function __construct()
        {
            $this->instance = ++self::$instances;
        }

        public function __clone()
        {
            $this->instance = ++self::$instances;
        }
    }

    $a = new Identified;
    $b = clone $a;
    echo $a->instance."\n"; // 1
    echo $b->instance."\n"; // 2

.. slide::

Sérialisation
~~~~~~~~~~~~~

.. textOnly::
    Contrairement aux types "basiques" (nombres, chaînes, tableaux...), les objets peuvent
    s'avérer complexes à représenter sous forme de chaîne de caractère pour être sauvegardé dans
    un fichier, un cookie ou encore une variable de session par exemple. Pour cela, vous pouvez
    utiliser la **sérialisation**. Les fonctions **PHP** :method:`serialize()`
    et :method:`unserialize()`
    permettent de représenter un objet sous forme de chaîne de caractères et, inversement,
    d'obtenir un objet à partir d'une chaîne sérialisée:

::

    <?php

    class A
    {
        public $attr = 0;
    }

    if (file_exists('a.txt')) {
        $a = unserialize(
            file_get_contents('a.txt')
        );
    } else {
        $a = new A;
    }

    $a->attr++;
    echo $a->attr."\n";

    file_put_contents('a.txt', serialize($a));

.. slide:: darkSlide fullSlide slideOnly codeLeft
    
::

    <?php
    class A { 
        public $a;
        public $x = 1;
    }

    $a = new A;
    $a->a = $a;
    $a->x = 2;

    $b = unserialize(serialize($a));
    $b->x = 3;

    echo $b->a->x, "\n"; // ???

.. textOnly::

    Notez que la sérialisation peut aussi gérer les références, par exemple:

    ::

        <?php
        class A { 
            public $a;
            public $x = 1;
        }

        $a = new A;
        $a->a = $a;
        $a->x = 2;

        $b = unserialize(serialize($a));
        $b->x = 3;

        echo $b->a->x, "\n"; // ?

    Ce code affichera bien ``3``, car la référence (qui est même une référence de l'objet
    vers lui-même) est aussi inclu dans la sérialisation.

.. slide::

Les méthodes magiques
~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Il existe en **PHP** des `méthodes magiques <http://fr.php.net/manual/en/language.oop5.magic.php>`_.
    Ces dernières peuvent par exemple permettre de
    surcharger l'accès à un attribut ou une méthode même s'il/elle n'existe pas:


+-----------------------------+----------------------------------------------------+
| **Nom**                     | **Utilité**                                        |
+-----------------------------+----------------------------------------------------+
| ``__toString()``            | Appelée lorsque l'on tente de convertir un objet en|
|                             | chaîne de caractère                                |
+-----------------------------+----------------------------------------------------+
| ``__get($name)``            | Apellée lors de l'accès en lecture à un attribut   |
|                             | non-existant                                       |
+-----------------------------+----------------------------------------------------+
| ``__set($name, $value)``    | Apellée lors de l'accès en écriture à un attribut  |
|                             | non-existant                                       |
+-----------------------------+----------------------------------------------------+
| ``__call($method, $args)``  | Appelée lors d'un appel à une méthode non existante|
+-----------------------------+----------------------------------------------------+


.. slide::

Typage
------

Substitution
~~~~~~~~~~~~

.. textOnly::
    **PHP** étant interprété, les types ne sont connus qu'au moment de l'execution.
    Ainsi, lorsque vous écrivez une méthode, les paramètres ne sont pas typés. Cela peut
    s'avérer pratique pour la substitution, mais aussi provoquer des problèmes très innatendus:

::

    <?php

    class User
    {
        public $name = 'Jack';
    }

    function showName($user)
    {
        echo $user->name."\n";
    }

    $user = new User;
    showName($user); // Jack
    $user = ['Bob'];
    showName($user); // Erreur

.. slide::

.. _typehinting:

Type hinting
~~~~~~~~~~~~

.. textOnly::
    Un mécanisme permet d'éviter ce genre d'erreur fréquente (passage
    d'argument du mauvais type), il s'agit du *type hinting* (ou indication de type):

::

    <?php

    function showName(User $user)
    {
        echo $user->name."\n";
    }

    // Si l'argument passé en paramètre n'est pas 
    // du type User, une erreur claire sera levée dès 
    // l'appel à la méthode
    showName([]);

.. discover::
    -----------
    
    .. code-block:: no-highlight

        PHP Catchable fatal error: 
        Argument 1 passed to showName() must be an instance of User, array given, called in
        hint.php on line 11 and defined in hint.php on line 3

.. textOnly::
    Le type indiqué dans les paramètres de la fonction peut être le type de la classe mère ou
    d'une interface qui doit être implémentée par l'objet passé. Il est fortement recommandé
    de mettre une indication de type le plus souvent possible dans vos prototype de fonctions
    et de méthodes afin d'éviter les erreurs obscures qui peuvent survenir lors du passage d'un
    objet du mauvais type.

.. slide::

Valeur nullables
~~~~~~~~~~~~~~~~

Une valeur peut être nullable avec le préfixe ``?``::

    <?php

    function setBookTitle(Book $book, ?string $title) {
        if ($title !== null) {
            $book->setTitle($title);
        } else {
            $book->setTitle('Unknown');
        }
    }

    setBookTitle($book, null);

.. textOnly::

    Sans le ``?`` devant ``?string``, ce code ne fonctionnerait pas car la valeur ``null`` ne serait
    pas acceptée.

.. slide::

Fonctions variadiques
~~~~~~~~~~~~~~~~~~~~~

Il est possible d'utiliser la notation ``...`` pour écrire des fonctions variadiques::

    <?php

    function setBookAuthors(Book $book, string ...$authors) {
        foreach ($authors as $author) {
            $book->addAuthor($author);
        }
    }

    setBookAuthors($book, 'Alice', 'Bob');

.. textOnly::
    
    Dans ce cas, la variable sera en fait un tableau contenant les éléments du type précisé
    dans le hinting (ici des chaînes de caractères).

.. slide::

Types de retours
~~~~~~~~~~~~~~~~

Il est possible de préciser le type de retour d'une fonction par type hinting::

    <?php

    function createBook(): Book {
        $book = new Book;
        $book->setTitle('Hello world');

        return $book;
    }

.. textOnly::

    Cette valeur peut être aussi combinée avec ``?`` si la valeur de retour peut aussi être ``null``.

.. slide::

Retour de ``self``
~~~~~~~~~~~~~~~~~~

Une classe retournant sa propre instance peut le préciser avec ``self``::

    <?php

    class Book {
        public function setTitle(string $title): self
        {
            $this->title = $title;

            return $this;
        }
    }

.. discover::

    .. textOnly::

        Cette pratique est courante pour pratiquer le chaînage de méthodes:

    .. code-block::

        <?php

        $book = new Book;
        $book
            ->setTitle('Hello world')
            ->setAuthors('Alice', 'Bob')
            ;

.. slide::

Pas de retour (``void``)
~~~~~~~~~~~~~~~~~~~~~~~~

Une fonction peut indiquer qu'elle ne retourne rien à l'aide de ``void``::

    <?php

    class Book {
        public function turnPage(): void
        {
            $this->page = min($this->page+1, $this->pages);
        }
    }


.. slide::

Arguments nommés (PHP 8 +)
~~~~~~~~~~~~~~~~

.. textOnly::

    Depuis PHP 8, il est possible de nommer des arguments optionnels que l'on souhaite définir:

.. code-block:: php

    <?php

    function registerUser(User $user, 
                          bool $send_email = false,
                          bool $validate_account = false)
    {
        // ...
    }

    registerUser($user, validate_account: true);

.. slide::

Typage des propriétés (PHP 7.4 +)
~~~~~~~~~~~~~~~~~~~~~

À partir de PHP 7.4, les propriétés d'une classe peuvent être typés::

    <?php

    class Book {
        public string $title;
    }

    $book = new Book;
    $book->title = []; // Erreur



.. textOnly::

    Lorsqu'une fonction de classe ne retourne aucune valeur (typiquement un *setter*), retourner 
    ``$this`` permet de la chaîner avec une autre méthode dans le même appel.


.. slide::

Test d'instance
~~~~~~~~~~~~~~~

.. textOnly::
    Il est possible de tester qu'un objet est bien l'instance d'une classe en PHP à
    l'aide du mot clé ``instanceof``:

::

    <?php

    interface P {};
    class A {};
    class B extends A {};
    class Q implements P {};

    $a = new A;
    $b = new B;
    $q = new Q;

    var_dump($a instanceof A); // true
    var_dump($b instanceof A); // true
    var_dump($a instanceof B); // false
    var_dump($q instanceof A); // false
    var_dump($q instanceof P); // true

.. textOnly::
    Notez que si l'objet testé est l'instance d'une classe fille de la classe passée,
    ``instanceof`` retournera vrai, comme par exemple pour l'expression ``$b instanceof A``
    ci-dessus.

    Ce système fonctionne également pour tester si un objet implémente une interface,
    comme avec ``$q instanceof P`` ci-dessus.

.. slide::

Constantes
~~~~~~~~~~

.. textOnly::
    Il est possible de déclarer des constantes à l'aide du mot clé ``const`` (et pas de ``$`` devant le nom).
    Ces valeurs peuvent être encapsulées dans une classe:

.. code-block:: php

    <?php

    class Registration
    {
        public const steps = [ 
            'details', 'address',
            'payment_information',
            'email_confirmation'
        ];  
    }

    foreach (Registration::steps as $step) {
        echo "* $step\n";
    }


.. slide::

Espaces de nom
--------------

.. textOnly::
    Souvent, la création de classes et d'interface engendre un problème de nommage, car il 
    peut devenir difficile d'éviter les problèmes de collisions de noms (deux classes ayant le
    même nom). Il est possible d'utiliser des espaces de nom (ou
    ``namespace``) pour éviter ce problème.

Par exemple, si le fichier ``alice/image.php`` contient::

    <?php

    namespace Alice;

    class Image
    {
        // ...
    }

.. discover::
    On pourra l'utiliser comme cela::

        <?php

        include('alice/image.php');

        $image = new Alice\Image;

.. discover::
    Ou encore:

        <?php

        include('alice/image.php');
        
        use Alice\Image;

        $image = new Image;

.. textOnly::
    Ainsi, la classe de Alice ne "pollue" pas l'espace de nom global mais est disponible 
    sous ``Alice\Image``, si quelqu'un d'autre souhaite écrire un classe de gestion
    d'images, il pourra le faire en utilisant un autre espace de nom.

.. slide::

Multiples classes de même nom
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Si Bob écrit à son tour une classe ``Image`` et la place sous l'espace de
    noms ``Bob\Image``, il sera possible d'utiliser les deux soit à l'aide de la
    déclaration entière du nom des classes

::

    <?php

    $a = new Alice\Image;
    $b = new Bob\Image;

.. textOnly::
    Il est également possible d'importer une classe à l'aide du mot clé ``use``,
    par  défaut, le nom de la classe (ici, ``Image``) sera un raccourci vers son
    emplacement complet (ici, ``Alice\Image``):

.. discover::
    .. slideOnly::
        --------------

    ::

        <?php

        use Alice\Image;

        $a = new Image;
        $b = new Bob\Image;

.. textOnly::
    Enfin, le mot clé ``as`` permet de donner un nom de substitution (ou alias)
    à la classe dans le fichier courant:

.. discover::
    .. slideOnly::
        ---------------

    ::
    
        <?php

        use Bob\Image as BobImage;
        use Alice\Image as AliceImage;

        $a = new AliceImage;
        $b = new BobImage;


.. slide::

Nom de classe
~~~~~~~~~~~~~

.. textOnly::
    Il est possible d'obtenir le nom d'une classe (chaine de caractère) à l'aide de l'opérateur ``::class``:

.. code-block:: php

    <?php

    use Web\Controller\DefaultController;

    $name = DefaultController::class;
    // Web\Controller\DefaultController

.. slide::

.. _autoloader:

L'autoloader
~~~~~~~~~~~~

.. image:: /img/php_file.png
    :class: right

L'autoloading est un mécanisme apparu dans **PHP 5.3** qui permet d'exécuter du code
au moment ou une classe est demandée et qu'elle n'est pas chargée dans le but de la charger
dynamiquement.

* Voir `spl_autoload_register() <http://php.net/spl_autoload_register>`_

.. slide:: darkSlide fullSlide slideOnly

AUTOLOADING

.. div:: inSlide
    .. discoverList::
        * user: ``new Bob\Something``
        * php: Hm, this class is not loaded
        * php: Let's call the autoloader methods
        * autoloader method: ``Bob\Something``, this is
          likely in ``/home/bob/lib/Bob/Something.php``,
          let's include it
        * php: OK, the class is now loaded, let's
          instanciate it

.. slide:: darkSlide fullSlide slideOnly codeLeft codeLeftTiny

AUTOLOADING

::

    <?php
    // autoload.php
    spl_autoload_register(function($cName) {
        if (strpos($cName, 'Bob')===0) {
            $file = str_replace('\\', '/', $cName);
            include(__DIR__.'/'.$file.'.php');
        }
    });

.. slide:: slideOnly

PHP supporte t-il l'héritage multiple ?

.. poll::

* Oui
* Non

.. slide:: slideOnly

Qu'est-ce qui sera affiché par::

    <?php
    class A {
        public function f($x, $y) { echo $x.$y; }
        public function f($x) { echo $x; }
    };
    $a = new A;
    $a->f('A', 'B');

.. poll::

* A
* AB
* Provoque une erreur

.. slide:: slideOnly

Une classe PHP peut implémenter plusieurs interfaces.

.. poll::

* Vrai
* Faux

.. slide:: slideOnly

``instanceof`` permet de vérifier:

.. poll::

* Qu'un objet est l'instance d'une classe
* Qu'un objet implémente une interface
* Les deux

.. slide:: slideOnly

Les espaces de noms et l'autoloader...

.. poll::

* C'est tabou, on en viendra tous à bout
* Moi j'aimais bien tous ces ``include()``
* Doivent être utilisés **absolument** à partir du TD3, et pour le reste
  de ma carrière de développeur PHP

.. slide:: slideOnly

::

    <?php
    $a = 12;
    $b = $a;
    $a = 42;
    echo $b;

.. poll::

* Affiche 12
* Affiche 42

.. slide:: slideOnly

::

    <?php
    class A { public $x; }
    $a = new A;
    $a->x = 12;
    $b = $a;
    $a->x = 42;
    echo $b->x;

.. poll::

* Affiche 12
* Affiche 42

.. slide:: slideOnly

::

    <?php
    class A { public $x = 1; }
    function f(A $a) { $a->x = 2; }
    $a = new A;
    f($a);
    echo $a->x;

.. poll::

* Affiche 1
* Affiche 2
* Provoque une erreur

.. slide:: slideOnly

Est-ce qu'une classe peut être abstraite sans avoir aucune méthode
abstraite?

.. poll::

* Oui
* Non

.. slide:: slideOnly

::

    <?php
    class A { 
        public $x = 0;
        public function __construct($n) {
            $x = $n;
        }
    }
    $a = new A(1);
    echo $a->x;

.. poll::

* Affiche 0
* Affiche 1
* Provoque une erreur

.. slide:: slideOnly

Le *type hinting* doit être utilisé:

.. poll::

* Très rarement
* Avec modération
* Aussi souvent que possible

.. slide:: slideOnly

::

    <?php
    class User {
        public $name;
        public function __construct($name = '?') {
            $this->name = $name;
        }
    }
    class SpecialUser extends User {
    }
    $u = new SpecialUser('Bob');
    echo $u->name;

.. poll::

* Affiche ?
* Affiche Bob
* Provoque une erreur

.. slide:: slideOnly

::

    <?php
    interface I { public function f($x); }
    class A { 
        public function f($x) {
            echo $x;
        }
    }
    function f(I $i) {
        $i->f(42);
    }
    $a = new A;
    f($a);

.. poll::

* Affiche 42
* Provoque une erreur

.. slide::

.. redirection-title:: tds/td3

TD 3
----

.. toctree::

    tds/td3

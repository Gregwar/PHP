.. slide:: middleSlide

Programmation orientée objet
============================

.. slide::

Présentation
------------

Pourquoi faire de l'objet ?
~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    L'objet est un paradigme de programmation très répandu et qui a fait ses preuves dans de
    nombreux projets. Son utilisation n'apporte pas de fonctionnalités au langage, c'est à dire
    que tout ce que l'on peut faire en utilisant la pogramation orientée objet peut être fait
    sans, cependant l'objet apporte beaucoup de choses en **simplicité de compréhension**,
    **maintenance**, **factorisation et découpage de code**, **travail collaboratif**
    ou encore en **conception**. Toutes ces qualité font de l'objet un mécanisme indispensable
    à maîtriser pour tout développeur **PHP**.

.. slideOnly::
    * Simplicité de compréhension
    * Maintenance
    * Factorisation et découpage de code
    * Travail collaboratif
    * Conception

.. textOnly::
    Presque toutes les bibliothèques et frameworks que vous serez amenés à utiliser se basent 
    sur le paradigme objet.

.. slide::

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
        * Les **attributs et méthodes** de classes sont accessibles par l'opérateur ``-&gt;``, le point
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

L'héritage s'écrit avec "``extends`` (classe mère)"::

    <?php

    class A
    {
        public $a = 12;
    }

    class B extends A
    {
        public $b = 34;
    }

    $b = new B;
    echo $b->a, "\n"; // 12
    echo $b->b, "\n"; // 34


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
        public $width;
        public $height;

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
    abstract public function getName();
    abstract public function getBody();

    public function display() {
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

    class A
    {
        public final function f()
        {
            return 42;
        }
    }

    class B
    {
        public function f()
        {
            return 30; // Erreur
        }
    }

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
    Comme la plupart des langages orienté objet, **PHP** propose un mécanisme d'<a href="http://php.net/Exceptions">exceptions</a>
    permettant d'affiner la gestion d'erreur. Par défaut, les exceptions remonteront jusqu'à être disposée sous forme d'erreur:

::

    <?php

    throw new Exception('Error!');

    
.. discover::
    Donnera lieu à :
    
    .. code-block:: text
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

    **PHP** ne supporte pas le polymorphisme, méthodes ayant le même nom mais des prototypes
    différents, vous pouvez cependant utiliser des paramètres optionnels et non typés, voici un exemple
    illustrant un argument optionel ayant une valeur par défaut:

.. slideOnly::
    * Pas d'héritage multiple
    * Pas de **polymorphisme** possible, mais les arguments peuvent être optionnels et non typés:

::

    <?php

    class A
    {
        public function f($x = 42)
        {
            echo "x = $x\n";
        }
    }

    $a = new A;
    $a->f(); // x = 42
    $a->f(67); // x = 67

.. slide::

Problèmes fréquents
-------------------

Références
~~~~~~~~~~

.. textOnly::
    Lorsque l'on passe un objet en argument d'une fonction, on ne passe pas une copie de cette objet
    mais une référence vers l'objet (à ne pas confondre avec une référence vers la variable qui décrit l'objet).
    Ainsi, toute modification se fera directement sur l'objet:

::

    <?php

    class A
    {
        public $attr = 1;
    }

    function func($a)
    {
        $a->attr = 2;
    }

    $a = new A;
    func($a);
    echo $a->attr."\n"; // 2


.. slide::

Attention aux références
~~~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Attention à ne pas confondre référence vers un objet et référence entre les variables, regardons
    l'exemple suivant:

::

    <?php

    class A
    {
        public $attr = 1;
    }

    $a = new A;
    $b = $a;
    $b->attr = 2;
    echo $a->attr."\n"; // 2
    $b = null;
    echo gettype($a)."\n"; // object
    $c = &$a;
    $c = null;
    echo gettype($a)."\n"; // null

.. textOnly::
    Dans ce cas, la ligne ``$b = $a`` fait en sorte que la variable ``$b`` référence
    le même objet que ``$a``. Ainsi la modification de l'attribut sur ``$b-&gt;attr`` est aussi
    visible sur ``$a-&gt;attr``. En revanche, la variable ``$b`` est bien **différente**
    de ``$a``, c'est pourquoi l'affecter à ``null`` ne change nullement la valeur de ``$a``;
    En revanche, l'utilisation de l'opérateur de référence ``&amp;`` pour créer la variable ``$c``
    fait en sorte que ``$c`` soit un **alias** de ``$a``, il référencera alors non pas seulement
    le même objet mais aussi la **même variable**.

.. slide::

Clonage
~~~~~~~

.. textOnly::
    Si vous souhaitez créer une **copie** d'un objet, vous pouvez utiliser le mécanisme de
    **clonage** de cet objet. **PHP** vous propose pour cela d'utiliser le mot clé ``clone``. 

::

    <?php

    class A
    {
        public $attr = 1;
    }

    $a = new A;
    $a->attr = 5;
    $b = clone $a;
    $b->attr = 6;
    echo $a->attr."\n"; // 5
    echo $b->attr."\n"; // 6

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
        static $instances = 0;
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

Substitution
~~~~~~~~~~~~

.. textOnly::
    **PHP** étant interprété, les types ne sont connus qu'au moment de l'execution.
    Ainsi, lorsque vous écrivez une méthode, les paramètres ne sont pas typés. Cela peut 
    s'avérer pratique pour la substitution, mais aussi provoquer des problèmes très innatendus:

::

    <?php

    class A
    {
        public $attr = 1;
    }

    function f($a)
    {
        echo $a->attr."\n";
    }

    $a = new A;
    f($a); // 1
    $a = array(12);
    f($a); // Erreur

.. slide::

.. _typehinting:

Type hinting
~~~~~~~~~~~~

.. textOnly::
    Depuis **PHP 5.3**, un mécanisme permet d'éviter ce genre d'erreur fréquente (passage
    d'argument du mauvais type), il s'agit du <em>type hinting</em> (ou indication de type):

::

    <?php

    function f(A $a)
    {
        echo $a->attr."\n";
    }

    // Si l'argument passé en paramètre n'est pas 
    // du type A, une erreur claire sera levée dès 
    // l'appel à la méthode
    f(array());

.. discover::
    -----------
    
    .. code-block:: text

        PHP Catchable fatal error: 
        Argument 1 passed to f() must be an
        instance of A, array given, called in
        hint.php on line 11 and defined in
        hint.php on line 3

.. textOnly::
    Le type indiqué dans les paramètres de la fonction peut être le type de la classe mère ou
    d'une interface qui doit être implémentée par l'objet passé. Il est fortement recommandé
    de mettre une indication de type le plus souvent possible dans vos prototype de fonctions
    et de méthodes afin d'éviter les erreurs obscures qui peuvent survenir lors du passage d'un
    objet du mauvais type.

.. slide::

Espaces de nom
~~~~~~~~~~~~~~

.. textOnly::
    Souvent, la création de classes et d'interface engendre un problème de nommage, car il 
    peut devenir difficile d'éviter les problèmes de collisions de noms (deux classes ayant le
    même nom). Depuis **PHP 5.3**, il est possible d'utiliser des espaces de nom (ou 
    ``namespace``) pour éviter ce problème.

Par exemple, si le fichier ``alice/image.php`` contient::

    <?php

    namespace Alice;

    class Image
    {
        // ...
    }

On pourra l'utiliser comme cela::

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
    déclaration entière du nom des classes::
    
    <?php

    $a = new Bob\Image;
    $b = new Alice\Image;

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

        $a = new BobImage;
        $b = new AliceImage;

.. slide::

Pour aller plus loin
--------------------

Sérialisation
~~~~~~~~~~~~~

.. textOnly::
    Contrairement aux types "basiques" (nombres, chaînes, tableaux...), les objets peuvent
    s'avérer complexes à représenter sous forme de chaîne de caractère pour être sauvegardé dans
    un fichier, un cookie ou encore une variable de session par exemple. Pour cela, vous pouvez
    utiliser la **sérialisation**. Les fonctions **PHP** `serialize() <http://php.net/serialize>`_
    et `unserialize() <http://php.net/unserialize
    </a> permettent de représenter un objet sous forme de chaîne de caractères et, inversement,
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

.. slide::

Les méthodes magiques
~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Il existe en **PHP** des `méthodes magiques <http://fr.php.net/manual/en/language.oop5.magic.php>`_.
    Ces dernières peuvent par exemple permettre de
    surcharger l'accès à un attribut ou une méthode même s'il/elle n'existe pas:

============================= ================================================
**Nom**                       **Utilité**
============================= ================================================
``__get($name)``              Apellée lors de l'accès en lecture à un attribut
                              non-existant
============================= ================================================
``__set($name, $value)``      Apellée lors de l'accès en écriture à un attribut
                              non-existant
============================= ================================================
``__call($method, $args)``    Appelée lors d'un appel à une méthode non existante
============================= ================================================

.. slide::

.. _autoloader:

L'autoloader
~~~~~~~~~~~~

L'autoloading est un mécanisme apparu dans **PHP 5.3** qui permet d'exécuter du code
au moment ou une classe est demandée et qu'elle n'est pas chargée dans le but de la charger
dynamiquement.

* Voir `spl_autoload_register() <http://php.net/spl_autoload_register>`_

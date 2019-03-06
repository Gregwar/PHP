.. slide:: middleSlide

Aller plus loin avec Laravel
=====================

.. slide::

Relations entre Modèles
-----------------------

Pour exploiter tout le potentiel d'Eloquent, il est possible de définir les relations entre les modèles.

.. textOnly::
    Cela s'effectue par des méthodes dans la classe du modèle :

.. code-block:: php

    class Post extends Model {
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }
    }

.. textOnly::
    Si on accéde à la relation via la méthode, on obtient un Query Builder de la relation :

.. discover::
    .. code-block:: php
        $comments = $post->comments()->where('hidden', false)->get();

.. textOnly::
    On peut cependant obtenir directement toutes les entrées de la relation en appelant le nom de la relation en tant que propriété (et non méthode !) :
.. discover::
    .. code-block:: php
        $comments = $post->comments;
        // Me retourne un tableau avec tous les commentaires liés

.. slide::

Relation One-To-Many
~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    class Post extends Model {
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }
    }

    $post->comments->save($comment);

.. slide::

Relation Many-To-One
~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    class Comment extends Model {
        public function post()
        {
            return $this->belongsTo(Post::class);
        }
    }

    $comment->post->associate($post);
    $comment->post->dussociate();

.. slide::

Relation Many-To-Many
~~~~~~~~~~~~~~~~~~~

Ces relations utilisent une table appelée "pivot" qui permet de faire la liaison.

Le nom de cette table pivot respecte une convention de nommage : il s'agit des noms des deux modèles (singulier) en minuscule et dans l'ordre alphabétique séparé par un underscore.

.. code-block:: php

    class Post extends Model {
        public function categories()
        {
            return $this->belongsToMany(Category::class);
        }
    }

    // Table pivot : category_post

    $post->categories->attach($category);
    $post->categories->detach($category);



.. slide::

Optimiser ses requêtes
----------------------

.. textOnly::
    Lorsque l'on commence à développer son application et que l'on utilise des relations, on est vite affecté par le probème des **requêtes N+1**.

    Voici comment ce problème peut survenir : 

.. code-block:: php

    @foreach ($post->comments as $comment)
        <li>{{ $post->author->name }}</li>
    @endforeach

Ce template va générer un nombre important de requêtes :

.. code-block:: no-highlight

    SELECT * FROM post WHERE id = 12;
    SELECT * FROM comments WHERE post_id = 12;
    SELECT * FROM authors WHERE id = 1;
    SELECT * FROM authors WHERE id = 1;
    SELECT * FROM authors WHERE id = 1;
    SELECT * FROM authors WHERE id = 2;
    SELECT * FROM authors WHERE id = 6;
    SELECT * FROM authors WHERE id = 7;
    SELECT * FROM authors WHERE id = 6;
    ...

.. slide::

.. textOnly::
    Pour palier à ce problème, on utilise l'**eager loading** qui va nous permettre de préciser au moment où l'on compose notre requête quelles relations nous souhaitons précharger

.. code-block:: php

    $post = Post::where('id', $post_id)
                ->with('comments', 'comments.author')
                ->first();

.. code-block:: no-highlight

    SELECT * FROM post WHERE id = 12;
    SELECT * FROM comments WHERE post_id = 12;
    SELECT * FROM authors WHERE id IN (1, 2, 6, 7);

.. slide::

Substitute Bindings
-----------------------

.. textOnly::
    Jusqu'à présent, nous récupérions nos entités depuis nos routes de cette façon : 

.. code-block:: php
    public function show($post_id)
    {
        $post = Post::find($post_id);
    }

.. textOnly::
    Pour éviter qu'à chaque fois on est à récupérer manuellement les entités, il est possible de les récupérer directement comme argument de notre méthode, en précisant le type de la variable : 

.. discover::
    .. code-block:: php
        Route::get('/{post}', 'PostsController@show');

        public function show(Post $post)
        {
            return view('posts.show', compact('post'));
        }

.. slide::

Contrôleurs : les bonnes pratiques
----------------------------------

Actions CRUD
~~~~~~~~~~~~

.. textOnly::
    Lorsque l'on crée des contrôleurs, il faut **s'obliger** à respecter les actions conseillées.

    Ceci permet d'y voir plus clair dans son code.

    Sur Laravel, il est **fortement recommandé** de n'utiliser que 6 actions possibles dans vos contrôleurs : 

.. discoverList::
    * index : Liste des éléments
    * show : Détail d'un élément
    * create : Formulaire de création d'un élément
    * store : Création d'un élément
    * edit : Formulaire de modification d'un élément
    * update : Modification d'un élément
    * destroy : Suppression d'un élément

.. discover::

    Il ne faut jamais créer une méthode avec un nom différent !

.. discover::

    Si vous sentez le besoin d'ajouter une méthode supplémentaire, vous avez très certainement besoin plutôt de **créer un autre contrôleur**.

.. slide::

Invokable Controllers
~~~~~~~~~~~~~~~~~~~~~~

.. textOnly::
    Parfois, on a envie de créer une action pour, par exemple, publier un article.

    Ce sont ces actions-ci que l'on a envie de mettre dans une méthode supplémentaire ``publishPost`` dans ``PostsController``.

    Il faut dans ce cas créer un contrôleur ``PublishPostController``.

    Mais ce contrôleur n'a qu'une action à effectuer. Dans ce cas, nous pouvons créer un **Invokable Controller**.

    Ils peuvent se créer avec la commande Artisan de création de contrôleur : 

.. code-block:: no-highlight

    $ php artisan make:controller -i PublishPostController

.. textOnly::
    Ce qui va nous créer notre classe de cette façon :

.. discover::
    .. code-block:: php
        class PublishPostController extends Controller
        {
            public function __invoke(Post $post)
            {
                $post->published = true;
                $post->save();
                return redirect()->route('posts.show', $post);
            }
        }

.. slide::

Sessions
--------

.. textOnly::
    Un module sur Laravel permet de gérer les sessions plus simplement qu'avec ``$_SESSION``.

    Nous pouvons y accéder soit via la facade ``Session::``, soit avec la fonction globale ``session()``.

.. code-block:: php

    Session::put('foo', 123);
    Session::has('foo'); // true
    Session::get('foo'); // 123
    Session::get('bar'); // null
    Session::get('bar', 'baz') // "baz"


.. slide::

Collections
-----------

.. textOnly::
    Sur Laravel, la plupart des tableaux que l'on manipule (retour d'une liste d'entités depuis la BDD par exemple) ne sont pas des tableaux en réalité, mais des objets ``Collection``.

    Ces objets ont l'avantage d'être interfacé de sorte à ce qu'ils peuvent être exploités et itérés comme des tableaux.

    Mais ils apportent tout un lot de méthodes pour faciliter le traitement complexe de tableaux !

    Il est possible de transformer n'importe quel tableau en collection via :

.. code-block:: php
    collect([1, 2, 3])

.. textOnly::
    Maintenant, nous pouvons appeler les méthodes suivantes : 

.. discover::
    .. code-block:: php
        $col = collect([
            ['name' => 'Fraise', 'price' => 5],
            ['name' => 'Banane', 'price' => 10],
        ]);
        $col->count() // 2
        $col->isEmpty() // false
        $col->first() // ['name' => 'Fraise', 'price' => 5]
        $col->sum('price') // 15
        $col->avg('price') // 7.5
        $col->pluck('name') // ['Fraise', 'Banane']
        $col->pluck('name')
            ->implode(', ') // "Fraise, Banane"

.. slide::

.. code-block:: php
    $col = collect([
        ['name' => 'Fraise', 'price' => 5],
        ['name' => 'Banane', 'price' => 10],
    ]);
    $col->filter(function ($item) {
        return $item > 8;
    })->map(function ($item) {
        return "Objet {$item['name']} vaut {$item['price']} €";
    });
    // "Objet Banane vaut 10 €" 

.. slide::

Débugger simplement
--------------

dd et dump
~~~~~~~~~~~

Pour connaître la valeur d'une variable pendant votre développement, vous pouvez utiliser ``dd`` n'importe où dans le code.

L'éxécution du script sera stoppé à l'appel de ``dd`` et va retourner directement un rendu interactif de la valeur de la variable.

.. code-block:: php
    dd($post);

Il est possible d'afficher la même chose sans interrompre l'éxécution avec ``dump()``.

.. slide::

Artisan Tinker
~~~~~~~~~~~~~~

Vous pouvez utiliser un CLI interactif pour tester l'éxécution de certaines méthodes par exemple depuis votre terminal :

.. code-block:: no-highlight

    $ php artisan Tinker
    Psy Shell v0.9.8 (PHP 7.2.10 — cli) by Justin Hileman
    >>> Post::first()->title

.. slide::

IoC Container
-------------

.. textOnly::
    L'IOC Container, ou "conteneur d'inversion de contrôle" est l'élément clé de Laravel.

    Il s'agit d'un système qui permet de créer et stocker des instances de façon globale, ou de les résoudre.

    L'utilisation de façades (Route::, Session::, Auth::, etc...) est une des façon de récupérer (résoudre) des instances.

.. code-block:: php
    app('session') == Session::instance() == session()

L'intégralité des "modules" que nous utilisons sur Laravel sont gérées par le Container et ces modules discutent entre eux par le même biais.

.. slide::


Par exemple : mes méthodes des contrôleurs sont appelées via le Container.

Du coup, il est capable à l'éxécution de la méthode d'injecter des objets dont on pourrait avoir besoin.

C'est ce que nous faisons quand on appelle ``$request`` :

.. code-block:: php
    public function store(\Illuminate\Http\Request $request)
    {
        // ...
    }

Ici, le Container va chercher une instance de type ``Illuminate\Http\Request`` parmi ses instances, et va l'injecter.
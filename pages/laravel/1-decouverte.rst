.. slide:: middleSlide

Découverte de Laravel
=====================

.. slide::

CLI Artisan
-----------

Le développement d'un projet Laravel est rythmé par l'utilisation d'un outil en ligne de commande (CLI) nommé Artisan.

Cet outil peut être appelé depuis un terminal placé dans le répertoire racine du projet : 

.. code-block:: no-highlight

    $ php artisan <command> [args...]

Pour avoir une liste de toutes les commandes possibles : 

.. code-block:: no-highlight

    $ php artisan list

.. slide::

Le modèle MVC
-------------

.. slide::

Laravel comme beaucoup d'autres frameworks suit le schéma "MVC". Le modèle MVC répartit la charge de travail à trois *modules* différents :

.. center::
    .. image:: /img/MVC.jpg

.. slide::

Ce schéma n'est pas  applicable comme tel pour un framework web car le schéma initial ne prend pas en compte l'aspect Requête/Réponse du protocole HTTP.

.. discover::

Pour palier à cela, les frameworks web ont intégré un 4ème module au schéma : le **routeur**.

.. slide::

.. center::
    .. image:: /img/laravel_router.png

.. textOnly::

Le routeur
----------

.. slide::

Le **routeur** est le chef d'orchestre d'une application web.

.. discover::

C'est un grand annuaire qui associe une *URI* avec une *destination*. 

.. discover::

Dans un projet Laravel, les routes sont répertoriées dans le dossier ``routes/``, et le fichier principal pour les routes de notre applications se trouvent dans le fichier ``routes/web.php``.

.. slide::

Voici un exemple de routeur :

.. code-block:: php

    Route::get('/', function () {
        return "Bonjour";
    });

Aller sur la page d'accueil du site affichera en brut : 

.. code-block:: no-highlight
    
    Bonjour

.. slide::

Routes selon la méthode HTTP
~~~~~~~~~~

.. code-block:: php

    Route::get('/contact', function () {
        return view('contact'); // Affiche le formulaire de contact
    });

    Route::post('/contact', function () {
        // Traitement du formulaire de contact
        return redirect()->to('/contact');
    });




.. slide::

Nommage des routes
~~~~~~~~~~~~~~~~~~

.. code-block:: php

    Route::get('/contact', function () {
        return view('contact'); 
    })->name('contact');

    // Génération d'une URL
    route('contact'); // -> https://monsite.com/contact

    // Redirection vers une route nommée
    redirect()->route('contact');

.. slide::

Pourquoi nommer ses routes ?

.. code-block:: php

    Route::get('/page-contact', function () {
        return view('contact');
    })->name('contact');

    // Génération de l'URL
    route('contact'); // -> https://monsite.com/page-contact

.. code-block:: php

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    // Même code pour générer l'URL
    route('contact'); // -> https://monsite.com/contact

.. slide::

Paramètres d'URI
~~~~~~~~~~~~~~~~~

Pour rendre nos URL dynamiques, nous pouvons composer nos URI avec des paramètres :

.. code-block:: php

    Route::get('/post/{post_id}', function ($post_id) {
        // ...
    });

    // /post/13 ($post_id = 13), /post/test ($post_id = "test"), ...

.. slide::

Nous pouvons également définir des paramètres facultatifs :

.. code-block:: php

    Route::get('/posts/{page?}', function ($page = 1) {
        // ...
    });

    // /posts/4 ($page = 4), /posts ($page = 1)

.. slide::

.. warning::

    **Attention à l'ordre des routes quand vous les définissez !**

.. code-block:: php

    Route::get('/posts/{page?}', function ($page = 1) {
        return "KO";
    });

    Route::get('/posts/edit', function () {
        return "OK";
    });

    // /posts/edit
    // => "KO" ($page = 'edit')

.. slide::

Groupes de routes
~~~~~~~~~~~~~~~~~

Les groupes de routes nous évite à recopier des composants de routes qui sont communs à plusieurs : 

.. code-block:: php

    Route::prefix('/posts')->name('posts.')->group(function () {
        Route::get('/', '...')->name('index')
        // GET /posts (posts.index)

        Route::get('/create', '...')->name('create')
        // GET /posts (posts.create)

        Route::post('/create', '...')->name('store')
        // POST /posts (posts.store)

        Route::get('/{post}/edit', '...')->name('edit')
        // GET /posts (posts.edit)

        Route::post('/{post}/edit', '...')->name('update')
        // POST /posts (posts.update)

        Route::delete('/{post}', '...')->name('destroy')
        // DELETE /posts (posts.destroy)

    });
   

    // Même code pour générer l'URL
    route('contact'); // -> https://monsite.com/contact

.. slide::

Le moteur de template : Laravel Blade
-------------------------------------

Le moteur de template de Larevel s'inspire beaucoup de celui d'ASP.NET (Razor) : 

.. discoverList::
* Les variables sont affichées avec ``{{ $variable }}``
* Les directives sont préfixées de ``@`` : ``@if ($condition)``, ``@endif``, etc...
* Les commentaires sont insérés avec ``{# Commentaire #}``

.. slide::

Exemple de template Blade : 

.. code-block:: no-highlight

    {# resources/views/index.blade.php #}

    @if ($user == 'admin')
        Bonjour {{ $user }} !
    @else
        Vous n'êtes pas admin
    @endif

    <ul>
        @forelse ($posts as $post)
            <li>{{ $post->title }}</li>
        @empty
            <li>Aucun article</li>
        @endforelse
    </ul>

.. slide::

Les directives des templates sont du PHP ! 

.. code-block:: no-highlight

    @if (in_array('PHP', $languagesCools))
        Le PHP c'est bien !
    @endif

    Il y a {{ count($languagesCools }} languages cools

.. slide::

Echappement des variables
~~~~~~~~~~~~~~~~~~~~~~~~~

Les sorties des variables sont **échappées** : L'HTML est affichée en brut pour éviter les failles XSS : 

.. code-block:: no-highlight

    <?php $lien = "<a href='/'>Accueil</a>"; ?>

    {{ $lien }}
    -> <a href='/'>Accueil</a>

    {!! $lien !!}
    -> Accueil

.. slide::

Héritage
~~~~~~~~

Il est possible également de faire de l'héritage

.. code-block:: no-highlight

    {# resources/views/app.blade.php #}

    <div class="content">
        @yield('content')
    </div>

.. code-block:: no-highlight

    {# resources/views/index.blade.php #}

    @extend('app')

    @section('content')
        Contenu de ma page
    @endsection
 

.. slide::

Retourner un template depuis une route
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Maintenant que nous savons comment construire nos vues, voici comment les utiliser :

.. code-block:: php

    Route::get('/', function () {
        return view('home');
    });

.. slide::

Nous pouvons également passer des variables à afficher dans nos vues : 

.. code-block:: php

    Route::get('/', function () {
        $date = Carbon\Carbon::now();
        return view('home', ['date' => $date]);
    });

ou plus simplement :

.. code-block:: php

    Route::get('/', function () {
        $date = Carbon\Carbon::now();
        return view('home', compact('date'));
    });

.. slide::

Contrôleurs
-----------

L'utilisation de **contrôleurs** permettent d'éviter de placer tout le *business logic* de notre site dans le fichier de routes.

Les contrôleurs sont des classes qui ont la responsabilité de **convertir** la requête entrante en réponse.

C'est ici que les traitements (récupération depuis la BDD, préparation des données pour la vue, etc...) se font.

Un contrôleur possède des actions, ce qui est représenté par une classe et ses méthodes.

.. slide::

Pour nous faciliter la vie, nous pouvons générer le contrôleur avec Artisan : 

.. code-block:: no-highlight

    $ php artisan make:controller HomeController

.. slide::

Nous pouvons donc modifier notre fichier de routes pour le rendre beaucoup plus lisible :

.. code-block:: php

    Route::get('/', 'HomeController@index')->name('index');

Et écrire notre action dans notre contrôleur : 

.. code-block:: php

    // app/Http/Controller/HomeController
    class HomeController extends Controller {
        public function index()
        {
            return view('index');
        }
    }

.. slide::

Traitement d'un formulaire
--------------------------

Soit les routes suivantes : 

.. code-block:: php

    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@store');

Nous pouvons traiter le formulaire de telle manière :

.. code-block:: php

    use Illuminate\Http\Request; 
    class ContactController extends Controller {
        public function store(Request $request)
        {
            $request->all();
            $request->get('email');
            $request->has('checkbox');
            return redirect()->route('contact');
        }
    }


.. slide::

Validation d'un formulaire
--------------------------

Il est également important de valider les données des formulaires

.. code-block:: php

    use Illuminate\Http\Request; 
    class ContactController extends Controller {
        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => ['required'],
                'email' => ['required', 'email'],
            ]);

            // ...
        }
    }

.. textOnly::

Vous pouvez retrouver toutes les `règles de validation de sur la doc Laravel <https://laravel.com/docs/5.7/validation#available-validation-rules>`_

.. slide::

Bases de données
----------------

Laravel intègre son propre ORM : Laravel Eloquent. Ce dernier permet de gérer la couche modèle du schéma MVC.

.. discover::

Convetion de nommage : 

.. discoverList::
    * Les tables sont en minuscules et au pluriel (``users``, ``posts``, etc...)
    * Les modèles sont au singulier (``User``, ``Post``, etc...)

.. slide::

Migrations
~~~~~~~~~~

Les migrations permettent de définir la structure de la base de données (tables, colonnes, etc...)

.. discover::

Elles décrivent l'évolution de la base de données au fur et à mesure que nous progressons dans l'élaboration de l'application.

.. discover::

Il est important lorsque qu'un changement doit être fait en base par rapport à l'état actuel de créer une nouvelle migration et non modifier une précédente.

.. textOnly::

Lorsque l'on travaille à plusieurs ou avec des serveurs de test/production, il est possible que des bases soit à des états différents.

.. textOnly::

C'est pour cela que les migrations doivent être consécutives et immuables.

.. slide::

Pour créer une migration, on utilise toujours Artisan :

.. code-block:: no-highlight

    $ php artisan make:migration create_posts_table

Ceci va nous créer un fichier ``YYYY_MM_DD_HHMMSS_create_posts_table.php`` dans le répertoire ``database/migrations/``.

.. slide::

.. code-block:: php

    class CreatePostsTable extends Migration
    {
        public function up()
        {
            Schema::create('posts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
                $table->string('title');
                // ...
            });
        }

        public function down()
        {
            Schema::dropIfExists('posts');
        }
    }

.. slide::

Une fois la migration écrite, une commande Artisan permet de l'éxécuter : 

.. code-block:: no-highlight

    $ php artisan migrate

.. slide::
 
 Il est également possible de créer une migration pour modifier une table (ajouter, modifier, supprimer une colonne) : 

.. code-block:: no-highlight

    $ php artisan make:migration add_author_to_posts

.. slide::

Modèles
-------

Les modèles sont des classes qui représente une table dans notre base de données. Une instance de ces classes représente une entrée dans la base de données.

Artisan nous permet également de créer ces classes pour nous : 

.. code-block:: no-highlight

    $ php artisan make:model Post

Ceci va créer une classe ``app/Post.php`` vide. On peut y préciser beaucoup de propriétés de notre modèle si besoin.

.. slide::

Query Builder
~~~~~~~~~~~~~

Le Query Builder permet de faire des requêtes sur la base pour interroger une table.

.. textOnly::

Il nous est possible de faire des requêtes complexes sans une seule ligne d'SQL !

.. slide::

Récupérer toutes les entitées (!!) :

.. code-block:: php

    $posts = Post::all();

Récupérer un maximum de 5 entitées selon des critères et un ordre particulier :

.. code-block:: php

    $posts = Post::where('published', true)
                 ->orderByDesc('published_at')
                 ->take(5)
                 ->get();

.. slide::

Récupérer une entité selon son ID : 

.. code-block:: php

    $post = Post::find($id);

Récupérer une entité selon des critères : 

.. code-block:: php

    $post = Post::where('id', $id)->first();

.. slide::

Créer une entité : 

.. code-block:: php

    $post = new Post();
    $post->title = "Hello World";
    $post->save();

Modifier une entité : 

.. code-block:: php

    $post = Post::find($id);
    $post->title = "Hello World";
    $post->save();

Supprimer une entité : 

.. code-block:: php

    $post = Post::find($id);
    $post->delete();

    
TD 7
----

.. toctree::

    ../tds/td7
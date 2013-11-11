TD3
===

Préparation
-----------

.. important::
    `Télécharger l'archive td3.zip <../files/td3.zip>`_

Vous aurez besoin de déployer son contenu sur un espace web disposant de l'intérpréteur
**PHP**. 

Exercice 1 : un peu de conception
--------------------------------

.. image:: /img/cubes.png
    :class: right

    Une plateforme d'hébergement et de distribution de fichiers souhaite pouvoir héberger
    des médias. Il en existe principalement trois sortes, des images, des musiques et des vidéos.
    Ces trois sortes sont traités de manière différentes, mais pour chacun, on connaît un nom et il est
    possible de les jouer à l'aide de la fonction ``play()``.

    Les musiques et les vidéos ont une durée dans le temps et peuvent être diffusées en streaming.
    Enfin, les utilisateurs peuvent constituer des playlists composées de plusieurs médias.
    Les playlists sont hiérarchiques, c'est à dire qu'une playlist peut être ajoutée à une autre playlist.

.. step::
    Conception
    ~~~~~~~~~~

    Dessinez un schéma (type UML) d'architecture de classes qui pourrait être utilisée ici

.. step::
    Lecture du test
    ~~~~~~~~~~~~~~~

    Lisez le code suivant, vous devrez alors écrire les classes correspondantes afin de le faire fonctionnel tel quel::

        <?php

        // Création d'une vidéo "Matrix"
        $matrix = new Video('Matrix');
        // Création d'une photo "Joconde"
        $joconde = new Photo('Joconde');
        // Création d'une musique "Stairway to heaven"
        $stairway = new Music('Stairway to heaven');
        // Création d'une playlist "P1"
        $p1 = new Playlist('P1');
        // Ajout de "Matrix" à "P1"
        $p1->add($matrix);
        // Ajout de "Joconde" à "P1"
        $p1->add($joconde);
        // Création d'une playlist "P2"
        $p2 = new Playlist('P2');
        // Ajout de "Stairway to heaven" à "P2"
        $p2->add($stairway);
        // Ajout de "P1" à "P2"
        $p2->add($p1);
        // Affichage de P2
        echo $p2;
        // Lecture de matrix
        $matrix->play();

.. step::

    Code
    ~~~~

    Ecrivez enfin les classes. Bien entendu, vous n'implémenterez pas réellement la lecture ou
    la diffusion en streaming mais effectuerai des sorties écran, le test ci-dessus pourrait générer
    une sortie de la forme suivante:

    .. code-block:: no-highlight

        P2
        | Stairway to heaven (audio)
        |  P1
        |  | Matrix (vidéo)
        |  | Joconde (image)

        [Vidéo] Lecture de Matrix

Exercice 2 : un arène
---------------------

.. image:: /img/sword.png
    :class: right

Lisez et déployez le code du dossier ``arena/``.

Compréhension
~~~~~~~~~~~~~

Tout d'abord, testez et lisez le code source.

.. step::
    **#~. Persistence**

    Comment les données du combat sont t-elles persistées d'une requête sur l'autre ?
    Quels sont les avantages/défauts de cette technique ?

.. step::
    **#~. Opérateur ?:**

    Remarquez l'utilisation de l'opérateur ``?:``, à quoi sert t-il ?

.. step::
    **#~. Chargement des classes**

    Remarquez que les fichiers des classes (comme ``Arena\Creature\Elf.php``)
    ne sont jamais inclus nulle part explicitement.
    En lisant le code et en regardant notamment la documentation de 
    `spl_autoload_register <http://fr2.php.net/manual/fr/function.spl-autoload-register.php>`_,
    découvrez comment l'inclusion est faite.

    Ce système permet de bénéficier d'une grande souplesse lors de l'écriture de code 
    et d'éviter beaucoup de problèmes tout en bénéficiant d'une inclusion "fainéante", c'est
    à dire uniquement des classes utilisées dans l'application.

Classes
~~~~~~~

.. step::
    A partir du code source, dessinez un diagramme de classes représentant l'architecture utilisée.

Quelques modifications
~~~~~~~~~~~~~~~~~~~~~~

.. step::
    **#~. Ajout de la description des attaques**

    Ajouter une description aux attaques à l'aide d'une méthode ``getDescription()`` que
    vous surchargerez dans chaque classe. La description devra être visible à coté des
    actions réalisables.

.. image:: /img/vampire.png
    :class: right

.. step::
    **#~. Ajout d'une créature**

    En vous inspirant des créatures déjà existantes, ajoutez une créature ``Vampire``
    disposant des attaques ``Tackle`` et ``Vampirism``.

    Pour tester, vous pourrez alors changer l'initialisation du combat (cf ``createFight``
    dans ``controller.php``) pour remplacer un des combattant par un vampire.

.. step::
    **#~. Ajout des «PP»**

    Remarquez que, pour l'instant, il n'est pas très intéréssant d'instancier les attaques. Vous
    allez maintenant implémenter les «PP», ou Points de Pouvoir. 
    
    Certaines attaques (en l'occurence, toutes sauf "Lutte" qui est l'attaque la plus basique)
    disposent d'un certain
    nombre de PP dont vous déciderez la quantité, et à chaque utilisation, ce nombre sera diminué de 1. Lorsque
    cette quantité atteindra zéro, il ne sera plus possible d'effectuer l'attaque.

    N'hésitez pas à modifier l'organisation du code pour implémenter cette fonctionalité.

Incorporation d'un logger
~~~~~~~~~~~~~~~~~~~~~~~~

.. step::
    Comme vous pourrez l'observer, les attaques sont actuellement muettes, nous aimerions pouvoir
    logger ce qu'elles font afin d'afficher un message explicitant ce qui s'est passé. Pour cela, modifiez
    le code de ``Fight`` pour qu'il puisse accepter un *logger* comme cela::

        <?php

        $logger = new MemoryLogger;
        $fight->setLogger($logger);

    Par la suite, chaque attaque pourra retourner une chaîne décrivant le mouvement (vous êtes libres
    d'ajouter quelques règles) qui sera loggée par le fighter. Modifier alors la page en utilisant la 
    méthode ``getEntries()`` sur le logger pour afficher l'ensemble des actions effectuées.

    Attention, votre logger ne doit pas être sérialisé ! Il faudra pour cela utiliser la méthode magique
    `__sleep() <http://php.net/__sleep>`_ de **PHP**

Exercice 3 : le routeur
-----------------------

.. image:: /img/routes.png
    :class: right

Un routeur est un composant clé dans une application web, car il est responsable de l'attribution
des requêtes à une certaine méthode (ou contrôlleur). Lisez le code contenu dans le dossier ``router/``.

Compréhension
~~~~~~~~~~~~~

.. step::
    **#~. PATH_INFO**

    A l'aide de la page de documentation de la variable `$_SERVER <http://php.net/_SERVER>`_,
    comprenez ce qu'est le ``PATH_INFO`` et comment il fonctionne.

.. step::
    **#~. Arguments**

    A quoi sert le ``\`` devant ``\Closure`` ? Indice : enlevez le et observez les
    erreurs.

.. step::
    **#~. extract**
       
    Observez de plus près la méthode ``render()``, à quoi sert la méthode ``extract()`` ?

.. step::
    **#~. call_user_func_array**
        
    Souvenez vous du premier TD et de la méthode ``call_user_func_array()``, qui est utilisée ici,
    consultez éventuellement la documentation à nouveau pour en comprendre le fonctionnement.

Intégration
~~~~~~~~~~~

.. step::
    Créez un nouveau dossier en copiant ``arena/`` et incluez y le routeur pour effectuer les
    actions au lieu d'utiliser les paramètres ``GET``.

    .. note::
        Note: il ne vous est pas demandé d'utiliser des templates, mais uniquement de mettre en place
        le routeur dans le code de l'exercice précédent, cette intégration peut en fait être réalisée en quelques
        minutes.

Si il vous reste du temps, vous pourrez regarder la documentation de l'outil `Silex <http://silex.sensiolabs.org/>`_,
un micro-framework basé sur Symfony qui propose une interface de programmation assez ressemblante,
avec beaucoup plus de fonctionnalités.


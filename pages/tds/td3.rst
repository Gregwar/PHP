TD3
===

Préparation
-----------

.. |archive| image:: /img/archive.png

.. important::
    `|archive| Télécharger l'archive td3.zip </files/td3.zip>`_

Vous aurez besoin de déployer son contenu sur un espace web disposant de l'interpréteur
**PHP**. 

Exercice 1 : écriture de classes
--------------------------------

.. image:: /img/cubes.png
    :class: right


.. step::
    Diagramme et test
    ~~~~~~~~~

    Voici un diagramme de classes (UML):

    .. center::

        .. image:: /img/td3-diagram.png

    Ainsi qu'un code permettant de tester les classes écrites::

        <?php

        // Création d'une vidéo "Matrix" (1.5h)
        $matrix = new Video('Matrix', 1.5*3600);
        // Création d'une photo "Joconde"
        $joconde = new Photo('Joconde');
        // Création d'une musique "Stairway to heaven" (8 min)
        $stairway = new Music('Stairway to heaven', 8*60);
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
        // Affichage de "Lecture de Matrix (durée: 5400s)"
        $matrix->play();
        // Affichage de P2
        $p2->showPlaylist();

.. step::

    Code
    ~~~~

    Ecrivez enfin les classes. Bien entendu, vous n'implémenterez pas réellement la lecture ou
    la diffusion en streaming mais effectuerai des sorties écran, le test ci-dessus pourrait générer
    une sortie de la forme suivante:

    .. code-block:: no-highlight

        [Vidéo] Lecture de Matrix

        P2
        | Stairway to heaven (audio)
        |  P1
        |  | Matrix (vidéo)
        |  | Joconde (image)

Exercice 2 : une arène
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
    **#~. Mort simultanée**

    Après une attaque qui fait des dégats aux deux créatures (telle que *Lutte*),
    il est possible que les deux créatures meurent en même temps.

    Dans ce cas, faites en sorte que le message "Mort simultanée" apparaisse, au
    lieu de "*Créature* a gagné".

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


.. image:: /img/poll.png
    :class: right

TD5
===

.. |archive| image:: /img/archive.png

.. important::
    `|archive| Télécharger l'archive td5.zip </files/td5.zip>`_

Consignes
---------

.. warning::

    Ce TD est **évalué**. Vous devrez le réaliser individuellement, et suivre les
    consignes suivantes.

    Vous devrez créer un dépôt personnel qui contiendra le code du TD, dans lequel
    vous travaillerez. Vous pouvez choisir soit GitHub soit Bitbucket, ainsi que
    mercurial ou git. Vous le partagerez avec moi (compte *Gregwar* sur Bitbucket
    et Github).

    Vous devez réaliser **exactement un commit** par question, afin qu'il soit possible
    de voir l'évolution de votre travail.

    N'oubliez pas **d'exporter votre base de données** si vous la modifiez.

    La date limite pour réaliser ce TD est le **Vendredi 14 Janvier 2015**.

Prise en main
-------------

Dans ce TD, nous partirons d'une application originale fonctionelle mais truffée de
problème divers et variés.

Il faudra tout d'abord faire fonctionner l'application, en commençant par déployer
la base de données et en changeant les paramètres dans ``bdd/pdo.php``.

1) Correction de problèmes
--------------------------

.. image:: /img/black_cat.png
    :class: right

.. step::
    #-) Problèmes d'encodages
    ~~~~~~~~~~~~~~~~~~~~~~~~~

    La page d'accueil ne s'affiche pas correctement, mais présente des problèmes d'encodages.
    Corrigez-les.

.. step::
    #-) SQL
    ~~~~~~~

    Les requêtes SQL ont un problème, lequel? Corrigez-le.

.. step::
    #) XSS
    ~~~~~~

    Le site contient de nombreuses failles XSS. Corrigez-les.

.. step::
    #) Mots de passes
    ~~~~~~~~~~~~~~~~~

    Les mots de passes sont stockés en clair. Corrigez ce problème.

.. image:: /img/cleaning.png
    :class: right
    
2) Passage à un framework
-------------------------

Le code présenté ici ne respecte pas une organisation propre. Nous allons le remanier afin de
respecter une organisation MVC, même minimale.

Si vous maîtrisez déjà un framework, vous êtes libres de l'utiliser.

Autrement, vous pourrez vous inspirer du :doc:`TD4 <td4>` et utiliser Silex et Twig.

Pour information, vous devrez:

* Séparez vos requêtes du reste (dans une simple classe ou avec un ORM)
* Ecrire des contrôleurs avec des routes propres (par exemple avec Silex)
* Porter les vues (par exemple sous Twig)

.. image:: /img/tools.png
    :class: right

3) Améliorations
----------------

Maintenant que votre application est bien nettoyée, vous allez y apporter quelques améliorations.

.. step::
    #-) Page active
    ~~~~~~~~~~~~~~~

    Modifiez le menu de manière à ce que la page courante soit marquée comme active (vous pourrez
    ajouter la classe ``active`` à l'élément ``<li>`` correspondant).

.. step::
    #-) Créateur du sondage
    ~~~~~~~~~~~~~~~~~~~~~~~

    L'utilisateur qui créé le sondage n'est pour l'instant pas enregistré. Modifiez la base de données
    pour qu'il soit enregistré et affiché dans la fiche du sondage.


.. step::
    #-) Réponses multiples
    ~~~~~~~~~~~~~~~~~~~~~~

    Pour le moment, il n'est possible que d'entrer 2 ou 3 réponses à un sondage. Modifiez l'application
    pour qu'elle permette de saisir un nombre arbitraire de questions.


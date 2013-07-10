TD5
===

Les fichiers de ce TD sont disponibles dans l'archive `td5.zip </files/td5.zip>`_

Tests unitaires
---------------

.. step::
    Lisez le code du dossier ``tests``, et exécutez les tests à l'aide de la commande
    suivante:

    .. code-block:: text
        php phpunit.phar test.php

    Remarquez que la méthode ``go()`` ne fait aucune vérification sur la position, afin
    d'éviter les valeurs inférieures à zéro ou supérieure ou égale au maximum. 

.. step::
    Ecrivez un test unitaire qui ne passe volontairement pas, c'est à dire qui provoque une erreur
    en faisant aller trop loin le bus par exemple.

.. step::
    Maintenant, modifiez le code source du bus de manière à corriger cette erreur et à faire passer
    le test unitaire.

La méthode que vous venez d'utiliser est extrêmement populaire pour corriger un comportement ou
un bug dans un logiciel; de cette façon, non seulement vous corrigez une erreur, mais vous ajoutez
également une forme de sécurité qui évitera que cette erreur ne se soit reproduite dans l'avenir.

Problème d'encodage
-------------------

.. step::
    Testez la page ``encodings/index.php`` et constatez le problème d'encodage. D'ou vient t-il ?
    Comment le résoudre ?

Sécurité
--------

.. step::
    Testez le code du dossier ``security/``, il est fonctionnel, mais ne respecte pas les bonnes
    pratiques et possède des failles de sécurité.

.. step::
    #-. Faille XSS
    ~~~~~~~~~~~~~~

    Cette page est dotée d'une faille XSS majeure. Repérez là et corrigez là.

.. step::
    #-. Hachage du mot de passe
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~

    Quelqu'un qui aurait accès au code source de la page connaîtrait le mot de passe. Il est possible d'éviter ce problème à l'aide d'une fonctione de hachage. Modifiez le code source de manière à ce que le mot de passe n'y apparaisse plus et ne soit plus facilement retrouvable.

.. step::
    #-. Faille CSRF
    ~~~~~~~~~~~~~~~

    Cette page est dotée de deux failles CSRF, qui sont nettement moins graves mais méritent tout de même d'être considérées. Repérez les et corrigez les.

Composer & Twig
---------------

.. step::
    Twig est un moteur de template, il est notamment disponible dans le gestionnaire de paquets composer. A l'aide
    du code contenu dans ``composer/``, installez les dépendances composer et faites le fonctionner.

<?php echo $slidey->chapter('TD5', 'td5'); ?>

<p>
    Les fichiers de ce TD sont disponibles dans l'archive <a href="files/td5.zip">td5.zip</a>
</p>

<?php echo $slidey->part('Tests unitaires'); ?>
<p>
    Lisez le code du dossier <code>tests</code>, et exécutez les tests à l'aide de la commande
suivante&nbsp;:
</p>

<?php echo $slidey->highlight('files/05/phpunitrun.php', 'html'); ?>

<p>
    Remarquez que la méthode <code>go()</code> ne fait aucune vérification sur la position, afin
d'éviter les valeurs inférieures à zéro ou supérieure ou égale au maximum. 
</p>
<p>
    Ecrivez un test unitaire qui ne passe volontairement pas, c'est à dire qui provoque une erreur
en faisant aller trop loin le bus par exemple.
</p>
<p>
    Maintenant, modifiez le code source du bus de manière à corriger cette erreur et à faire passer
le test unitaire.
</p>
<p>
    La méthode que vous venez d'utiliser est extrêmement populaire pour corriger un comportement ou
un bug dans un logiciel; de cette façon, non seulement vous corrigez une erreur, mais vous ajoutez
également une forme de sécurité qui évitera que cette erreur ne se soit reproduite dans l'avenir.
</p>

<?php echo $slidey->part('Problème d\'encodage'); ?>

<p>
    Testez la page <code>encodings/index.php</code> et constatez le problème d'encodage. D'ou vient t-il ?
Comment le résoudre ?
</p>

<?php echo $slidey->part('Sécurité'); ?>

<p>
    Testez le code du dossier <code>security/</code>, il est fonctionnel, mais ne respecte pas les bonnes pratiques et possède des failles de sécurité.
</p>

<?php $n = 1; ?>

<h3><?php echo $n++; ?>. Faille XSS</h3>
<p>
    Cette page est dotée d'une faille XSS majeure. Repérez là et corrigez là.
</p>

<h3><?php echo $n++; ?>. Hachage du mot de passe</h3>
<p>
    Quelqu'un qui aurait accès au code source de la page connaîtrait le mot de passe. Il est possible d'éviter ce problème à l'aide d'une fonctione de hachage. Modifiez le code source de manière à ce que le mot de passe n'y apparaisse plus et ne soit plus facilement retrouvable.
</p>

<h3><?php echo $n++; ?>. Faille CSRF</h3>
<p>
    Cette page est dotée de deux failles CSRF, qui sont nettement moins graves mais méritent tout de même d'être considérées. Repérez les et corrigez les.
</p>

<?php echo $slidey->part('Composer & Twig'); ?>

<p>
    Twig est un moteur de template, il est notamment disponible dans le gestionnaire de paquets composer. A l'aide
du code contenu dans <code>composer/</code>, installez les dépendances composer et faites le fonctionner.
</p>

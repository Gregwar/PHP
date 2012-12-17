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

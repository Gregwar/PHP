<?php echo $slidey->chapter('TD1', 'td1'); ?>

<p>
    Les fichiers relatifs à ce TD se situent dans l'archive <a href="files/td1.zip">td1.zip</a>
</p>

<h3>Astuce</h3>

<p>
    Lorsque vous ignorez la signification d'une fonction <b>PHP</b>, comme par exemple <code>strlen</code>,
rendez vous simplement à l'adresse <a href="http://php.net/strlen">http://php.net/strlen</a> (ajoutez votre
fonction ou mot clé à la suite de <code>http://</code>). Vous arriverez alors soit directement sur la page de la fonction
soit sur une liste de fonction et la recherche.
</p>

<?php echo $slidey->part('Exercice 1 : '); ?>

<?php echo $slidey->part('Exercice 2 : Gestion d\'un magasin'); ?>

<p>
    Dans cet exercice, on s'intéresse à la gestion d'un magasin. Le code source est en fait un utilitaire en
ligne de commande qui permet de naviguer parmis les produits.
</p>

<h3>Questions</h3>

<p>
    Pour commencer, lisez le code source disponible dans le dossier <b>exercice2/</b> afin d'en comprendre son
fonctionnement.
</p>

<p>
    <b>Quel est l'interêt du tableau <code>$actions</code> ? Quelle(s) autre(s) méthode aurait pu être employée ?</b>

<div class="spoiler">
    Ce tableau permet de faire la correspondance entre les actions données au script et les fonction à apeller.
Grâce aux fonctions anonymes (depuis <b>PHP 5.3</b>), cette correspondance peut se faire directement en insérant
les fonctions dans le tableau en tant qu'éléments. Un <code>switch/case</code> aurait pu être employé ici, mais la
maniabilité n'aurait pas été la même, en effet, l'usage est ainsi capable d'afficher la liste des fonctions disponibles.
</div>
</p>

<p>
    <b>Lisez la documentation de <code>implode()</code>, à quoi sert cette fonction ? Comment effectuer l'opération inverse ?</b>

<div class="spoiler">
    <code>implode()</code> sert à concaténer les éléments d'un tableau à l'aide d'un séparateur. Cette fonction est très
utile pour convertir des tableaux en chaînes de caractères lisible, et dans l'autre sens à l'aide de <code>explode()</code>
obtenir un tableau depuis une telle chaîne.
</div>
</p>

<p>
    <b>Observez de plus près l'appel à <code>call_user_func_array</code>,
    Est t-il possible de faire ce genre de chose dans un langage fortement typé tel que le C ou Java ? Pourquoi ?</b>

<div class="spoiler">
    Non. Cette fonction est un exemple de ce qu'il est possible de faire à l'aide d'un langage de haut niveau et
interprété tel que le <b>PHP</B>.
</div>
</p>

<p>
    <b>Essayez d'ajouter un produit à l'aide de la commande <code>php store add nom_du_produit quantité</code>. Comment la liste
des produits est t-elle sauvegardée ?</b>

<div class="spoiler">
    La liste des produits est sauvegardée dans <code>products.php</code>, elle est écrite à l'aide de <code>file_put_contents()</code>
et de <code>var_export()</code> qui permettent d'écrire la variable dans le fichier telle quelle.
</div>
</p>

<h3>Implémentation</h3>

<?php echo $slidey->part('Exercice 3 : Mandelbrot'); ?>

<img class="right" src="<?php echo \Gregwar\Image\Image::open('img/mandelbrot.png')
    ->resize(200)
    ->guess();
?>" title="L'ensemble de mandelbrot">

<p>
    L'ensemble de mandelbrot est une fractale, c'est à dire sur lequel on peut "zommer" sans jamais en apréhender
les limites (non dérivable). 
</p>
<p>
    Dans cet exercice, on se propose de dessiner cet ensemble dans le terminal, vous pourrez utiliser la définition
de l'ensemble à cette adresse&nbsp;:<br />
    <a href="http://fr.wikipedia.org/wiki/Ensemble_de_Mandelbrot">http://fr.wikipedia.org/wiki/Ensemble_de_Mandelbrot</a>
</p>
<p>
    Une fois que votre implémentation fonctionne, il vous est possible d'implémenter le zoom sur la courbe fractale afin
de l'observer de plus en plus pres.
</p>



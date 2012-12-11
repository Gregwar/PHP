<?php echo $slidey->chapter('TD4', 'td4'); ?>

<p>
    Les fichiers de ce TD sont disponibles dans l'archive <a href="files/td4.zip">td4.zip</a>
</p>

<?php echo $slidey->part('Compréhension'); ?>

<p>
    Commencez par installer et tester l'application. Vous devrez tout d'abord installer la base
de données disponible dans le fichier <code>sql/database.sql</code>, puis modifier le fichier
<code>index.php</code> pour que les paramètres de connexion soient corrects.
</p>

<?php $n = 1; ?>

<h3><?php echo $n++; ?>. Un autoloader générique</h3>
<p>
	Ici, l'<em>autoloader</em> est générique, c'est à dire que toutes les classes du dossier
<code>src/</code> seront chargées, par exemple <code>A/B/C.php</code> sera inclus si l'on
fait référence à la classe <code>A\B\C</code>.
</p>

<h3><?php echo $n++; ?>. Le routeur</h3>
<p>
	Le routeur du TD précédent a été réutilisé ici. Il permet de simplifier le routage des requêtes,
ainsi que la génération des url à l'aide de la méthode <code>generate</code>. Son utilisation est
inspirée de micro-frameworks, tels que <a href="http://silex.sensiolabs.org/">Silex</a>. Observez
la manière dont il est utilisé et dont il fonctionne. 
</p>

<h3><?php echo $n++; ?>. Modèle</h3>

<p>
	Intéressez vous au code de la classe <code>Cinema\Model</code>, à quoi sert t-elle ? Pourquoi
regrouper ces méthodes dans une classe ?
</p>

<?php echo $slidey->part('Ecriture de requêtes/code'); ?>

<?php $n = 1; ?>

<h3><?php echo $n++; ?>. Casting d'un film</h3>
<p>
	En écrivant le code de la méthode <code>getCasting()</code> du modèle, écrivez une requête récupérant
les acteurs jouant dans un film (prénom, nom et image).
</p>

<h3><?php echo $n++; ?>. Formulaire d'ajout de critique</h3>
<p>
	Les films peuvent être critiqué, complétez le code de gestion de l'URL <code>/film/*</code> de manière
à enregistrer les critiques valides dans la base de données, n'oubliez pas de passer par le modèle.
</p>

<h3><?php echo $n++; ?>. Rendu des critiques</h3>
<p>
	Modifier de nouveau le code pour que les critiques soient récupérées puis affichées dans la page sous
le film.
</p>

<h3><?php echo $n++; ?>. Classement des films</h3>
<p>
	Ajouter au menu "Meilleurs films" et créez une page affichant le classement des films les mieux notés,
c'est à dire ayant la meilleure note moyenne.
</p>

<h3><?php echo $n++; ?>. Formulaire d'ajout de film</h3>
<p>
	Créez une page "Ajout de film" servant à ajouter un film à la base. Il doit être possible de définir :
</p>
<ul>
	<li>Le nom du film</li>
	<li>Sa description</li>
	<li>Son année</li>
	<li>Son genre, parmis les genres de la base de données</li>
	<li>Les acteurs qui y jouent (dans la base de données), et les roles qu'ils y occupent</li>
</ul>
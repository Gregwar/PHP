<?php
//...
$query = $pdo->query(
	'SELECT * FROM films INNER JOIN 
	genres ON genres.id = films.genre_id'
	);

foreach ($query as $row) {
	// Nom du genre, ou du film?
	echo $row['nom']."\n";
}
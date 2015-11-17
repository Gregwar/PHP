<?php

namespace Cinema;

/**
 * Représente le "Model", c'est à dire l'accès à la base de
 * données pour l'application cinéma basé sur MySQL
 */
class Model
{
    protected $pdo;

    public function __construct($host, $database, $user, $password)
    {
        try {
            $this->pdo = new \PDO(
                'mysql:dbname='.$database.';host='.$host,
                $user,
                $password
            );
        } catch (\PDOException $error) {
            die('Unable to connect to database.');
        }
        $this->pdo->exec('SET CHARSET UTF8');
    }

    protected function execute(\PDOStatement $query, array $variables = array())
    {
        if (!$query->execute($variables)) {
            $errors = $query->errorInfo();
            throw new ModelException($errors[2]);
        }

        return $query;
    }

    /**
     * Récupère un résultat exactement
     */
    protected function fetchOne(\PDOStatement $query)
    {
        if ($query->rowCount() != 1) {
            return false;
        } else {
            return $query->fetch();
        }
    }

    /**
     * Base de la requête pour obtenir un film
     */
    protected function getFilmSQL()
    {
        return
            'SELECT films.image, films.id, films.nom, films.description, genres.nom as genre_nom FROM films 
             INNER JOIN genres ON genres.id = films.genre_id ';
    }

    /**
     * Récupère la liste des films
     */
    public function getFilms()
    {
        $sql = $this->getFilmSQL();

        return $this->execute($this->pdo->prepare($sql));
    }

    /**
     * Récupère un film
     */
    public function getFilm($id)
    {
        $sql = 
            $this->getFilmSQL() . 
            'WHERE films.id = ?'
            ;

        $query = $this->pdo->prepare($sql);
        $this->execute($query, array($id));

        return $this->fetchOne($query);
    }

    /**
     * Récupérer les acteurs d'un film
     */
    public function getCasting($filmId)
    {
        // XXX: A faire
        return array();
    }

    /**
     * Genres
     */
    public function getGenres()
    {
        $sql = 
            'SELECT genres.nom, COUNT(*) as nb_films FROM genres '.
            'INNER JOIN films ON films.genre_id = genres.id '.
            'GROUP BY genres.id'
            ;

        return $this->execute($this->pdo->prepare($sql));
    }
}

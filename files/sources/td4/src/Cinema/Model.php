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
            $this->pdo->exec('SET CHARSET UTF8');
        } catch (\PDOException $exception) {
            die('Impossible de se connecter au serveur MySQL');
        }
    }

    /**
     * Récupère la liste des films
     */
    public function getFilms()
    {
        $sql = 
            'SELECT films.id, films.nom, genres.nom as genre_nom FROM films '.
            'INNER JOIN genres ON genres.id = films.genre_id'
            ;

        return $this->pdo->query($sql);
    }
}

<?php

namespace Cinema;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Entity\Films;
use Entity\Genres;

/**
* Représente le "Model", c'est à dire l'accès à la base de
* données pour l'application cinéma basé sur MySQL
*/
class Model
{
    protected $manager;
    
    public function __construct($hostname, $database, $user, $password)
    {
        $paths = [__DIR__ . '/../Entity/'];
        
        // the connection configuration
        $dbParams = [
            'driver' => 'pdo_mysql',
            'hostname' => $hostname,
            'user' => $user,
            'password' => $password,
            'dbname' => $database,
            'charset' => 'utf8'
        ];
        
        $config = Setup::createAnnotationMetadataConfiguration($paths, true, null, null, false);
        $this->manager = EntityManager::create($dbParams, $config);
    }
    
    public function getManager()
    {
        return $this->manager;
    }

    public function getFilms(): array
    {
        return $this->manager->getRepository(Films::class)->findAll();
    }

    public function getGenres(): array
    {   
        return $this->manager->getRepository(Genres::class)->findAll();
    }

    public function getFilm(int $id): Films
    {
        $film = $this->manager->getRepository(Films::class)->find($id);

        return $film;
    }
}

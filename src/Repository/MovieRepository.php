<?php

namespace App\Repository;

use App\Models\Movie;
use App\Service\PDOService;
use PDO;

class MovieRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM movie';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }

    //array de Movie si en objet
    public function findAll(): array
    {
        $querry = $this->PDOService->getPDO()->query($this->queryAll);
        return $querry->fetchAll(PDO::FETCH_ASSOC);
    }

    //array de Movie si en objet
    public function findByTitle(string $title):array
    {

    }

    //Movie si en objet
    public function insertMovie(Movie|array $movie): Movie|array
    {
        
            $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie VALUE (null, :title, :release_date)');
        $title = $movie->getTitle();
        $releaseDate = $movie->getReleaseDate()->format('Y-m-d');
        $query->bindParam(':title',$title);
        $query->bindParam(':release_date',$releaseDate);
        $query->execute();

        return $movie;
        
    }



}

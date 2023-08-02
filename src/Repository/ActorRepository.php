<?php

namespace App\Repository;

use App\Models\Actor;
use App\Service\PDOService;
use PDO;

class ActorRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM actor';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }

    //array d'Actor si en objet
    public function findAll():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll(PDO::FETCH_ASSOC);
    }

    //Actor si en objet
    public function insertActor(Actor|array $actor): Actor|array
    {
        $query = $this->PDOService->getPDO()->prepare('INSERT INTO actor VALUE (null,:first_name,:last_name)');
        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();
        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':last_name', $lastName);
        $query->execute();
        return $actor;
    }
        
}

<?php

namespace App\Services;

use PDO;
use App\Model\AnimalConsultation;

class MongoDbService
{
    private $pdo;

    public function synchronize(): void
    {
        $stmt = $this->pdo->prepare("SELECT name FROM animals");
        $animals = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $animalConsultation = new AnimalConsultation();
        $animalConsultation->syncWithMySQL($animals);
    }
}

<?php

namespace App\Model;

use App\Database\MongoDbConnection;
use Iterator;

class AnimalConsultation
{
    private $collection;

    public function __construct()
    {
        $db = new MongoDbConnection();
        $this->collection = $db->getCollection('animalConsultation');
    }
    public function incrementConsultation(int $animalId, int $views): void
    {
        $animal = $this->collection->findOne(['animal_id' => $animalId]);
        if(is_null($animal)) {
            $animalViews = ['animal_id' => $animalId, 'consultations' => $views];
            $this->collection->insertOne($animalViews);
        } else {
            $animal['consultations'] += $views;
            $this->collection->updateOne(['_id' => $animal['_id']], ['$set' => $animal]);
        }
    }

    public function getAllConsultations(): array
    {
        return $this->collection->find()->toArray();
    }

    public function getConsultation(int $animalId): ?array
    {
        return $this->collection->findOne(['animal_id' => $animalId]);
    }
}

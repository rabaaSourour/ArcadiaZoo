<?php

namespace App\Model;

use App\Database\DbConnection;
use App\Database\MongoDbConnection;
use MongoDB\Database;

class AnimalConsultation
{
    private $collection;
    private Animal $animalModel;

    public function __construct()
    {
        $db = new MongoDbConnection();
        $this->collection = $db->getCollection('animalConsultation');

        $this->animalModel = new Animal(DbConnection::getPdo());
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

    public function getAnimalsWithViews() : array
    {
        $animals = $this->animalModel->getAllAnimals(['id', 'name']);

        foreach($animals as $index => $animal)
        {
            $mongoAnimal = $this->getConsultation($animal['id']);
            if($mongoAnimal !== null) {
                $animals[$index]['consultations'] = $mongoAnimal['consultations'];
            } else {
                $animals[$index]['consultations'] = 0;
            }
        }

        return $animals;
    }

    public function getConsultation(int $animalId): ?array
    {
        return $this->collection->findOne(['animal_id' => $animalId])->getArrayCopy();
    }
}

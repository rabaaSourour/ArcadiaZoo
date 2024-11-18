<?php

namespace App\Model;

use App\Database\MongoDbConnection;

class AnimalConsultation
{
    private $collection;

    public function __construct()
    {
        $db = new MongoDbConnection();
        $this->collection = $db->getCollection('animalConsultation');
    }

    public function incrementConsultation(string $name): void
    {
        $this->collection->updateOne(
            ['animal_name' => $name],
            ['$setOnInsert' => ['consultations' => 0], '$inc' => ['consultations' => 1]],
            ['upsert' => true]
        );
    }

    public function syncWithMySQL(array $animals): void
{
    $mongoAnimals = $this->collection->find([], ['projection' => ['animal_name' => 1]])->toArray();
    $mongoAnimalNames = array_map(fn($doc) => $doc['animal_name'], $mongoAnimals);

    foreach ($animals as $animal) {
        if (!in_array($animal, $mongoAnimalNames)) {
            $this->collection->insertOne([
                'animal_name' => $animal,
                'consultations' => 0,
            ]);
        }
    }

    foreach ($mongoAnimalNames as $mongoAnimal) {
        if (!in_array($mongoAnimal, $animals)) {
            $this->collection->deleteOne(['animal_name' => $mongoAnimal]);
        }
    }
}

    public function getAllConsultations(): array
    {
        return $this->collection->find()->toArray();
    }

    public function getConsultation(string $name): ?array
    {
        return $this->collection->findOne(['animal_name' => $name]);
    }
}

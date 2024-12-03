<?php

namespace App\Model;

use PDO;
use Exception;

class Animal
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllAnimals()
    {
        $stmt = $this->pdo->query("SELECT * FROM animals");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAnimalById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM animals WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);

        return $animal;
    }

    public function updateAnimal($id, $name, $breed, ?string $imagePath = null)
    {
        try {

            $fields = [
                'name = :name',
                'breed = :breed',
            ];

            if ($imagePath !== null) {
                $fields[] = 'image = :imagePath';
            }

            $sql = 'UPDATE Animals SET ' . implode(', ', $fields) . ' WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':breed', $breed);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($imagePath !== null) {
                $stmt->bindParam(':imagePath', $imagePath);
            }

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour du Animal : " . $e->getMessage();
            return false;
        }
    }

    public function addAnimal(string $name, string $breed, string $imagePath, int $habitat_id)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO animals (animals.name, animals.breed, animals.image, animals.habitat_id) VALUES (:name, :breed,  :image, :habitat_id)");
            return $stmt->execute(['name' => $name, 'breed' => $breed, 'image' => $imagePath, 'habitat_id' => $habitat_id]);
        } catch (Exception $e) {
            echo "Erreur lors de l'ajout du animal : " . $e->getMessage();
            return false;
        }
    }

    public function deleteAnimal($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM animals WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            echo "Erreur lors de la suppression de l'animal : " . $e->getMessage();
            return false;
        }
    }

}

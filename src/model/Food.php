<?php

namespace App\Model;

use PDO;
use Exception;

class Food
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllFoods()
    {
        $stmt = $this->pdo->query("SELECT * FROM animal_foods");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFoodById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM animal_foods WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $food = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

        return $food;
    }

    public function updateFood (int $id, string $food, string $quantity, int $animalId)
    {
        try {

            $fields = [
                'food = :food',
                'quantity = :quantity',
                'animals_id = :animals_id'
            ];

            $sql = 'UPDATE animal_foods SET ' . implode(', ', $fields) . ' WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':food', $food);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':animals_id', $animalId);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            

            return $stmt->execute();
        } catch (Exception $e) {
            return "Erreur lors de la mise à jour du food : " . $e->getMessage();
        }
    }

    public function addFood(string $food, string $quantity, int $animalId)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO animal_foods (food, quantity, animals_id) VALUES (:food, :quantity, :animals_id)");
            return $stmt->execute(['food' => $food, 'quantity' => $quantity, 'animals_id' => $animalId]);
        } catch (Exception $e) {
            return "Erreur lors de l'ajout du nourriture : " . $e->getMessage();

        }
    }

    public function deleteFood(int $id): bool
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM animal_foods WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            return "Erreur lors de la suppression du nourriture : " . $e->getMessage();
        }
    }
}
<?php

namespace App\Model;

use PDO;
use Exception;

class Habitat
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllHabitats()
    {
        $stmt = $this->pdo->query("SELECT * FROM habitats");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHabitatById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM habitats WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $habitat = $stmt->fetch(PDO::FETCH_ASSOC);

        return $habitat;
    }

    public function updateHabitat($id, $name, $description, ?string $imagePath = null)
    {
        try {

            $fields = [
                'name = :name',
                'description = :description',
            ];

            if($imagePath !== null) {
                $fields[] = 'image = :imagePath';
            }
            
            $sql = 'UPDATE habitats SET ' . implode(', ', $fields) . ' WHERE id = :id';
            
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if($imagePath !== null) {
                $stmt->bindParam(':imagePath', $imagePath);
            }
            
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour du habitat : " . $e->getMessage();
            return false;
        }
    }

    public function addHabitat(string $name, string $description, string $imagePath)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO habitats (habitats.name, habitats.description, habitats.image) VALUES (:name, :description,  :image)");
            $stmt->execute(['name' => $name, 'description' => $description, 'image' => $imagePath]);
            $lastHabitatId = $this->pdo->lastInsertId();
            return $lastHabitatId;
        } catch (Exception $e) {
            echo "Erreur lors de l'ajout du habitat : " . $e->getMessage();
            return false;
        }
    }

    public function deleteHabitat($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM habitats WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            echo "Erreur lors de la suppression de l'habitat : " . $e->getMessage();
            return false;
        }
    }
}

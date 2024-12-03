<?php

namespace App\Model;

use PDO;
use Exception;

class Service
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllServices()
    {
        $stmt = $this->pdo->query("SELECT * FROM services");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServiceById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $service = $stmt->fetch(PDO::FETCH_ASSOC);

        return $service;
    }

    public function updateService($id, $name, $description, ?string $imagePath = null)
    {
        try {

            $fields = [
                'name = :name',
                'description = :description',
            ];

            if($imagePath !== null) {
                $fields[] = 'image = :imagePath';
            }
            
            $sql = 'UPDATE services SET ' . implode(', ', $fields) . ' WHERE id = :id';
            
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if($imagePath !== null) {
                $stmt->bindParam(':imagePath', $imagePath);
            }
            
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour du service : " . $e->getMessage();
            return false;
        }
    }

    public function addService(string $name, string $description, string $category, string $imagePath)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO services (services.name, services.description, services.category, services.image) VALUES (:name, :description, :category, :image)");
            return $stmt->execute(['name' => $name, 'description' => $description, 'category' => $category, 'image' => $imagePath]);
        } catch (Exception $e) {
            echo "Erreur lors de l'ajout du service : " . $e->getMessage();
            return false;
        }
    }

    public function deleteService($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM services WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            echo "Erreur lors de la suppression du service : " . $e->getMessage();
            return false;
        }
    }
}

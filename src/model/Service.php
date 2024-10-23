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

    // Récupérer tous les services
    public function getAllServices()
    {
        $stmt = $this->pdo->query("SELECT * FROM services");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un service par son ID
    public function getServiceById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $service = $stmt->fetch(PDO::FETCH_ASSOC);

        return $service;
    }

    // Mettre à jour un service
    public function updateService($id, $name, $description, $imagePath)
    {
        try {
            $stmt = $this->pdo->prepare('UPDATE services SET name = :name, description = :description, image = :imagePath WHERE id = :id');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':imagePath', $imagePath);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de la mise à jour du service : " . $e->getMessage();
            return false;
        }
    }
    // Ajouter un service
    public function addService($name, $description, $imagePath)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO services (name, description, image) VALUES (:name, :description, :imagePath)");
            return $stmt->execute(['name' => $name, 'description' => $description, 'image' => $imagePath]);
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de l'ajout du service : " . $e->getMessage();
            return false;
        }
    }


    // Supprimer un service
    public function deleteService($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM services WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de la suppression du service : " . $e->getMessage();
            return false;
        }
    }
}

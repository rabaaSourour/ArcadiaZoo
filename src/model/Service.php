<?php

namespace App\Model;

use PDO;

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
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   // Mettre à jour un service
public function updateService($id, $name, $description, $imagePath)
{
    $query = $this->pdo->prepare('UPDATE services SET name = :name, description = :description, image_path = :imagePath WHERE id = :id');
    $query->bindParam(':name', $name);
    $query->bindParam(':description', $description);
    $query->bindParam(':imagePath', $imagePath);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    
    return $query->execute();
}

    

    // Supprimer un service
    public function deleteService($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM services WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    // Ajouter un service
    public function addService($name, $description, $imagePath)
    {
        $stmt = $this->pdo->prepare("INSERT INTO services (name, description, image_path) VALUES (:name, :description, :imagePath)");
        return $stmt->execute(['name' => $name, 'description' => $description, 'image_path' => $imagePath]);
    }

}

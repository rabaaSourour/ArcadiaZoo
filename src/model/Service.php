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

    // Méthode pour récupérer tous les services
    public function getAllServices()
{
    $query = $this->pdo->query('SELECT * FROM services');
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

    // Méthode pour créer un nouveau service
    public function createService($name, $description, $imageLink)
    {
        $query = $this->pdo->prepare('INSERT INTO services (name, description, image_link) VALUES (?, ?, ?)');
        $query->execute([$name, $description, $imageLink]);
    }

    // Méthode pour mettre à jour un service existant
    public function updateService($id, $name, $description, $imageLink)
    {
        $query = $this->pdo->prepare('UPDATE services SET name = ?, description = ?, image_link = ? WHERE id = ?');
        $query->execute([$name, $description, $imageLink, $id]);
    }

    // Méthode pour supprimer un service
    public function deleteService($id)
    {
        $query = $this->pdo->prepare('DELETE FROM services WHERE id = ?');
        $query->execute([$id]);
    }
}

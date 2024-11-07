<?php

namespace App\Model;

use PDO;
use Exception;

class Report
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Récupérer tous les reports
    public function getAllReports()
    {
        $stmt = $this->pdo->query("SELECT * FROM veterinary_reports");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un report par son ID
    public function getReportById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM veterinary_reports WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $report = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

        return $report;
    }

    // Mettre à jour un report
    public function updateReport (int $id, string $status, string $food, string $foodQuantity, ?string $details)
    {
        try {

            $fields = [
                'status = :status',
                'food = :food',
                'food_quantity = :food_quantity',
                'details = :details',
            ];

            $sql = 'UPDATE veterinary_reports SET ' . implode(', ', $fields) . ' WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':food', $food);
            $stmt->bindParam(':food_quantity', $foodQuantity);
            $stmt->bindParam(':details', $details);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            

            return $stmt->execute();
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de la mise à jour du report : " . $e->getMessage();
            return false;
        }
    }
    // Ajouter un report
    public function addReport(string $status, string $food, string $foodQuantity, string $details, int $animalId)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO veterinary_reports (status, food, food_quantity, details, animals_id) VALUES (:status, :food, :food_quantity, :details, :animals_id)");
            return $stmt->execute(['status' => $status, 'food' => $food, 'food_quantity' => $foodQuantity, 'details' => $details, 'animals_id' =>$animalId]);
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de l'ajout du report : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un report
    public function deleteReport(int $id): bool
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM veterinary_reports WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de la suppression du report : " . $e->getMessage();
            return false;
        }
    }
}

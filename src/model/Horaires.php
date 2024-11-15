<?php

namespace App\Model;

use PDO;

class Horaires
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getHoraires(): array
    {
        $stmt = $this->pdo->query('SELECT id, day, openingTime, closingTime FROM openinghours');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateHoraire(string $id, string $openingTime, string $closingTime): void
    {
        $stmt = $this->pdo->prepare('UPDATE openinghours SET openingTime = ?, closingTime = ? WHERE id = ?');
        $stmt->execute([$openingTime, $closingTime, $id]);
    
        // Vérifier si la requête a bien fonctionné
        if ($stmt->rowCount() > 0) {
            echo "Mise à jour réussie.";
        } else {
            echo "Aucune mise à jour effectuée.";
        }
    }
}
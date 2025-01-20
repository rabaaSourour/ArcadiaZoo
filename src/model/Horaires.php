<?php

namespace App\Model;

use PDO;
use App\Services\FormValidator;
use Exception;

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

    public function updateHoraire(string $id, string $openingTime, string $closingTime): bool
    {
        if (!FormValidator::isValidId($id)) {
            throw new Exception('Cannot update horaire: id "' . $id . '" is not valid');
        }
    
        if (!FormValidator::isValidHoraire($openingTime) || !FormValidator::isValidHoraire($closingTime)) {
            return false;
        }
    
        $stmt = $this->pdo->prepare('UPDATE openinghours SET openingTime = ?, closingTime = ? WHERE id = ?');
        $stmt->execute([$openingTime, $closingTime, $id]);
    
        return $stmt->rowCount() > 0;
    }
    
    public function updateHoraires(array $horaires): array
    {
        $modificationsEffectuees = false;
    
        foreach ($horaires as $horaire) {
            if (isset($horaire['id'], $horaire['openingTime'], $horaire['closingTime'])) {
                $resultat = $this->updateHoraire($horaire['id'], $horaire['openingTime'], $horaire['closingTime']);
                if ($resultat) {
                    $modificationsEffectuees = true;
                }
            }
        }
    
        if ($modificationsEffectuees) {
            return ['success' => true, 'message' => 'Les modifications ont été enregistrées avec succès.'];
        }
    
        return ['success' => false, 'message' => 'Aucune modification n’a été effectuée.'];
    }
    
}

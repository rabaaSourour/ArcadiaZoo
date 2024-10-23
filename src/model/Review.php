<?php

namespace App\Model;

use PDO;

class Review
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Ajouter un avis
    public function createReview($pseudo, $review)
    {
        $stmt = $this->pdo->prepare('INSERT INTO reviews (pseudo, review, isValid) VALUES (:pseudo, :review, 0)');
        $stmt->execute([
            'pseudo' => $pseudo,
            'review' => $review
        ]);
    }

    // Récupérer les avis validés
    public function getApprovedReviews()
    {
        $stmt = $this->pdo->query('SELECT * FROM reviews WHERE isValid = 1 ORDER BY date DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les avis en attente de validation
    public function getPendingReviews()
    {
        $stmt = $this->pdo->query('SELECT * FROM reviews WHERE isValid = 0 ORDER BY date DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Valider un avis
    public function approveReview($id)
    {
        $stmt = $this->pdo->prepare('UPDATE reviews SET isValid = 1 WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    // Supprimer un avis
    public function deleteReview($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM reviews WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}

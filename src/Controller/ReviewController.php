<?php

namespace App\Controller;

use App\Model\Review;
use App\Database\DbConnection;
use PDO;

class ReviewController
{
    private $reviewModel;

    public function __construct(PDO $pdo)
    {
        $this->reviewModel = new Review($pdo);
    }

    public function view() : array
    {
        return [
            'page' => 'reviews',
            'variables' => []
        ];
    }

    public function addReview() : array
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $review = $_POST['review'];

            if (!empty($pseudo) && !empty($review)) {
                // Protéger les données avant l'insertion
                $pseudo = DbConnection::protectDbData($pseudo);
                $review = DbConnection::protectDbData($review);

                // Appeler la méthode du modèle pour créer l'avis
                $this->reviewModel->createReview($pseudo, $review);

                // Redirection après ajout de l'avis
                header('Location: /home/view');
                exit();
            } else {
                // Afficher un message d'erreur si les champs sont vides
                echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
            }
        }

        return $this->view();
    }


    public function getValidReviews()
    {
        return $this->reviewModel->getApprovedReviews();
    }

    public function getPendingReviews()
    {
        return $this->reviewModel->getPendingReviews();
    }

    public function validateReview($id)
    {
        $this->reviewModel->approveReview($id);
    }

    public function deleteReview($id)
    {
        $this->reviewModel->deleteReview($id);
    }
}

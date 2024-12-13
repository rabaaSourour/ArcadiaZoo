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

    public function show(): array
    {
        return [
            'page' => 'review',
            'variables' => []
        ];
    }

    public function addReview(): array
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $review = $_POST['review'];

            if (!empty($pseudo) && !empty($review)) {
                $pseudo = DbConnection::protectDbData($pseudo);
                $review = DbConnection::protectDbData($review);

                $this->reviewModel->new($pseudo, $review);

                header('Location: /home/view');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
            }
        }

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('Erreur CSRF : jeton invalide.');
            }
        }


        return $this->show();
    }


    public function getValidReviews()
    {
        return $this->reviewModel->getApprovedReviews();
    }

    public function pendingReviews(): array
    {
        $pendingReviews = $this->reviewModel->getPendingReviews();

        $role = isset($_SESSION['role']) && $_SESSION['role'] === 'employe'
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'isValidateReview',
            'variables' => [
                'pendingReviews' => $pendingReviews,
                'role' => $role
            ]
        ];
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

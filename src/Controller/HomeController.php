<?php

namespace App\Controller;

use App\Model\Horaires;
use App\Model\Review;
use PDO;

class HomeController
{
    private Review $reviewModel;
    private Horaires $horairesModel;

    public function __construct(PDO $pdo)
    {
        $this->reviewModel = new Review($pdo);
        $this->horairesModel = new Horaires($pdo);
    }

    public function show() : array
    {
        $getPendingReviews = $this->reviewModel->getApprovedReviews();
        $horaires = $this->horairesModel->getHoraires();

        $role = isset($_SESSION['role']) && $_SESSION['role'] === 'admin'
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'home',
            'variables' => [
                'getPendingReviews' => $getPendingReviews,
                'horaires' => $horaires,
                'role' => $role,
            ]
        ];
    }
}

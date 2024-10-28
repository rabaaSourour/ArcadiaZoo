<?php

namespace App\Controller;

use App\Model\Review;
use App\Model\Horaires;
use App\Model\Service;
use PDO;

class AdminController
{
    private readonly Review $reviewModel;
    private readonly Horaires $horairesModel;
    private readonly service $serviceModel;

    public function __construct(PDO $pdo)
    {
        $this->reviewModel = new Review($pdo);
        $this->horairesModel = new Horaires($pdo);
        $this->serviceModel = new Service($pdo);
    }

    // URI : '/admin/pendingReviews'
    public function pendingReviews(): array
    {
        $pendingReviews = $this->reviewModel->getPendingReviews();

        return [
            'page' => 'isValidateReview',
            'variables' => [
                'pendingReviews' => $pendingReviews,
            ]
        ];
    }

    // URI : '/admin/viewOpeningHours'
    public function viewOpeningHours(): array
    {
        $horaires = $this->horairesModel->getHoraires();

        return [
            'page' => 'OpeningHours',
            'variables' => [
                'horaires' => $horaires
            ]
        ];
    }

    // URI : '/admin/updateOpeningHours'
    public function updateOpeningHours(): array
    {
        // Vérifier la méthode de requête
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['horaires']) && is_array($_POST['horaires'])) {
                foreach ($_POST['horaires'] as $data) {
                    if (isset($data['id'], $data['openingTime'], $data['closingTime'])) {
                        $this->horairesModel->updateHoraire($data['id'], $data['openingTime'], $data['closingTime']);
                    }
                }

                // Redirection vers la page d'administration après la mise à jour
                header('Location: /home/view');
                exit();
            } else {
                echo "Données du formulaire manquantes.";
            }
        }

        $horaires = $this->horairesModel->getHoraires();

        return [
            'page' => 'OpeningHours',
            'variables' => [
                'horaires' => $horaires
            ]
        ];
    }
}

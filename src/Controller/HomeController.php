<?php

namespace App\Controller;

use App\Model\Horaires;
use App\Model\Review;
use App\Model\Habitat;
use App\Model\Animal;
use PDO;

class HomeController
{
    private Review $reviewModel;
    private Horaires $horairesModel;
    private Habitat $habitatModel;
    private Animal $animalModel;

    public function __construct(PDO $pdo)
    {
        $this->reviewModel = new Review($pdo);
        $this->horairesModel = new Horaires($pdo);
        $this->habitatModel = new Habitat($pdo);
        $this->animalModel = new Animal($pdo);
    }

    public function show() : array
    {
        $getPendingReviews = $this->reviewModel->getApprovedReviews();
        $horaires = $this->horairesModel->getHoraires();
        $habitats = $this->habitatModel->getAllHabitats();
        $animal = $this->animalModel->getAllAnimals();

        $role = isset($_SESSION['role']) && $_SESSION['role'] === 'admin'
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'home',
            'variables' => [
                'getPendingReviews' => $getPendingReviews,
                'horaires' => $horaires,
                'role' => $role,
                'habitats' => $habitats,
                'animals' => $animal
            ]
        ];
    }
}

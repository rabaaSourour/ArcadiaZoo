<?php

namespace App\Controller;

use App\Model\AnimalConsultation;

class AnimalConsultationController
{
    private $consultationModel;

    public function __construct()
    {
        $this->consultationModel = new AnimalConsultation();
    }

    public function increment(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            if ($data) {
                foreach ($data as $animalId => $views) {
                    $this->consultationModel->incrementConsultation($animalId, $views);
                }
                header('Content-Type: application/json');
            } 
        }
    }

    public function show(): array
    {
        $consultation = $this->consultationModel->getAnimalsWithViews();

        return [
            'page' => 'animalConsultation',
            'variables' => [
                'consultations' => $consultation,
            ]
        ];
    }
}

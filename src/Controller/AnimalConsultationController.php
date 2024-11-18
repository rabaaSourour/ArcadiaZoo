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

    public function increment($name): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->consultationModel->incrementConsultation($name);
            echo json_encode(['message' => "Consultation ajoutée pour $name."]);
        }
    }

    public function show(): array
    {
        $consultation = $this->consultationModel->getAllConsultations();

        return [
            'page' => 'animalConsultation',
            'variables' => [
                'consultations' => $consultation,
            ]
        ];
    }
}

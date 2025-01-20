<?php

namespace App\Controller;

use App\Model\Horaires;
use PDO;

class HorairesController
{
    private Horaires $horairesModel;

    public function __construct(PDO $pdo)
    {
        $this->horairesModel = new Horaires($pdo);
    }

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

public function show(): array
{
    $status = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['horaires'])) {
        $status = $this->horairesModel->updateHoraires($_POST['horaires']);
    }

    return [
        'page' => 'OpeningHours',
        'variables' => [
            'horaires' => $this->horairesModel->getHoraires(),
            'status' => $status
        ]
    ];
}

}


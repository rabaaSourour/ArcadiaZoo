<?php

namespace App\Controller;

use App\Model\Horaires;
use PDO;

class HorairesController
{
    private Horaires $horairesModel;

    public function __construct(Horaires $horairesModel)
    {
        $this->horairesModel = $horairesModel;
    }

    public function showHoraires(): array
    {
        return $this->horairesModel->getHoraires();
    }

    public function updateHoraires(array $data): void
    {
        if (isset($data['day'], $data['openingTime'], $data['closingTime'])) {
            $this->horairesModel->updateHoraire($data['day'], $data['openingTime'], $data['closingTime']);
        }
    }
}

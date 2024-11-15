<?php

namespace App\Controller;

use App\Model\Horaires;


class HorairesController
{
    private Horaires $horairesModel;

    public function __construct(Horaires $horairesModel)
    {
        $this->horairesModel = $horairesModel;
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

    public function showHoraires(): array
    {
        return $this->horairesModel->getHoraires();
    }

    public function updateHoraires(array $data): array
    {
        if (isset($data['id'], $data['openingTime'], $data['closingTime'])) {
            $this->horairesModel->updateHoraire($data['id'], $data['openingTime'], $data['closingTime']);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['horaires']) && is_array($_POST['horaires'])) {
                    foreach ($_POST['horaires'] as $data) {
                        if (isset($data['id'], $data['openingTime'], $data['closingTime'])) {
                            $this->horairesModel->updateHoraire($data['id'], $data['openingTime'], $data['closingTime']);
                        }
                    }

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
}

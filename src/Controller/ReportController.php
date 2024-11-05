<?php

namespace App\Controller;

use App\Model\Report;
use App\Model\Animal;
use PDO;

class ReportController
{
    private $reportModel;
    private $animalModel;

    public function __construct(PDO $pdo)
    {
        $this->reportModel = new Report($pdo);
        $this->animalModel = new Animal($pdo);

    }
    
    // URI : '/habitat/show'
    public function show(): array
    {
        $report = $this->reportModel->getAllReports();

        $isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

        return [
            'page' => 'habitat',
            'variables' => [
                'reports' => $report,
                'isAdmin' => $isAdmin,
            ]
        ];
    }

    // URI : '/report/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->reportModel->deleteReport($id); // Supprimer le report
            header('Location: /habitat/show'); // Redirection après la suppression
            exit();
        }
    }

    // URI : '/report/new'
    public function new(): array
    {
        $message = '';
        $animal = $this->animalModel->getAllAnimals();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valider les données ici
            $status = htmlspecialchars($_POST['status']);
            $food = htmlspecialchars($_POST['food']);
            $foodQuantity = htmlspecialchars($_POST['food_quantity']);
            $details = htmlspecialchars($_POST['details']);
            $animalId = (int) htmlspecialchars($_POST['animals_id']);

            if (!empty($animal) && !empty($status) && !empty($food) && !empty($foodQuantity) && !empty($details) && $animalId > 0) {
                $this->reportModel->addReport($status, $food, $foodQuantity, $details, $animalId);
                header('Location: /habitat/show'); // Redirection après l'ajout
                exit();
            } else {
                $message = 'Tous les champs doivent être remplis';
            }
        }

        return [
            'page' => 'addReport',
            'variables' => [
                'message' => $message,
                'animals' => $animal,           ]
        ];
    }


    // URI : '/report/update'
    public function update(): array
    {
        $id = (int)($_GET['id'] ?? 0); // Récupération de l'ID du report

        $report = $this->reportModel->getReportById($id); // Récupération des données du report

        if (!$report) {
            echo "report non trouvé.";
            exit();
        }

        // Traitement du formulaire d'édition
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $status = htmlspecialchars($_POST['status'] ?? '');
            $food = htmlspecialchars($_POST['food'] ?? '');
            $foodQuantity = htmlspecialchars($_POST['food_quantity'] ?? '');
            $details = htmlspecialchars($_POST['details'] ?? '');
            $animalId = (int) htmlspecialchars($_POST['animals_id'] ?? '');

            if ($animalId > 0 && !empty($status) && !empty($food) && !empty($foodQuantity) && !empty($details)) {
                $this->reportModel->updateReport($id, $status, $food, $foodQuantity, $details, $animalId); // Mise à jour du report

                header('Location: /habitat/show'); // Redirection après la mise à jour
                exit();
            } else {
                echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
            }
        }

        return [
            'page' => 'editReportForm',
            'variables' => [
                'report' => $report
            ]
        ];
    }
}
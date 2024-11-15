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

        $role = isset($_SESSION['role']) && $_SESSION['role'] === 'veterinaire'
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'habitat',
            'variables' => [
                'reports' => $report,
                'role' => $role,
            ]
        ];
    }

    // URI : '/report/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->reportModel->deleteReport($id);
            header('Location: /report/show');
            exit();
        }
    }

    // URI : '/report/new'
    public function new(): array
    {
        $message = '';
        $animal = $this->animalModel->getAllAnimals();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = htmlspecialchars($_POST['status']);
            $food = htmlspecialchars($_POST['food']);
            $foodQuantity = htmlspecialchars($_POST['food_quantity']);
            $details = htmlspecialchars($_POST['details']);
            $animalId = (int) htmlspecialchars($_POST['animals_id']);

            if (!empty($animal) && !empty($status) && !empty($food) && !empty($foodQuantity) && !empty($details) && $animalId > 0) {
                $this->reportModel->addReport($status, $food, $foodQuantity, $details, $animalId);
                header('Location: /report/show');
                exit();
            } else {
                $message = 'Tous les champs doivent être remplis';
            }
        }

        return [
            'page' => 'addReport',
            'variables' => [
                'message' => $message,
                'animals' => $animal,           
                ]
        ];
    }


    // URI : '/report/update'
    public function update(): array
    {
        $id = (int)($_GET['id'] ?? 0);

        $report = $this->reportModel->getReportById($id);

        if (!$report) {
            echo "report non trouvé.";
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = htmlspecialchars($_POST['status'] ?? '');
            $food = htmlspecialchars($_POST['food'] ?? '');
            $foodQuantity = htmlspecialchars($_POST['food_quantity'] ?? '');
            $details = htmlspecialchars($_POST['details'] ?? '');
            $animalId = (int) htmlspecialchars($_POST['animals_id'] ?? '');

            if ($animalId > 0 && !empty($status) && !empty($food) && !empty($foodQuantity) && !empty($details)) {
                $this->reportModel->updateReport($id, $status, $food, $foodQuantity, $details, $animalId);

                header('Location: /report/show');
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
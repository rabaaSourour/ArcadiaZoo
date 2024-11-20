<?php

namespace App\Controller;

use App\Model\Review;
use App\Model\Service;
use App\Model\Habitat;
use App\Model\Animal;
use App\Model\Report;
use App\Model\Food;
use App\Model\User;
use App\Model\AnimalConsultation;
use PDO;

class ApiController
{
    private readonly Review $reviewModel;
    private readonly Service $serviceModel;
    private readonly habitat $habitatModel;
    private readonly Animal $animalModel;
    private readonly Report $reportModel;
    private readonly Food $foodModel;
    private readonly User $userModel;
    private readonly AnimalConsultation $consultationModel;

    public function __construct(PDO $pdo)
    {
        $this->reviewModel = new Review($pdo);
        $this->serviceModel = new Service($pdo);
        $this->habitatModel = new Habitat($pdo);
        $this->animalModel = new Animal($pdo);
        $this->reportModel = new Report($pdo);
        $this->foodModel = new Food($pdo);
        $this->userModel = new User($pdo);
        $this->consultationModel = new AnimalConsultation();
    }

    public function validateReview(): array
    {
        if (isset($_POST['id'])) {
            $id = (int)$_POST['id'];
            $this->reviewModel->approveReview($id);
            $status = ['status' => 'success', 'message' => 'Un message de succès'];
        } else {
            $status = ['status' => 'error', 'message' => 'Un message d\'erreur'];
        }
        echo json_encode($status);
        exit();
    }

    public function deleteReview(): array
    {
        if (isset($_POST['id'])) {
            $id = (int)$_POST['id'];
            $this->reviewModel->deleteReview($id);
            $status = ['status' => 'success', 'message' => 'Un message de succès'];
        } else {
            $status = ['status' => 'error', 'message' => 'Un message d\'erreur'];
        }
        echo json_encode($status);
        exit();
    }

    public function deleteService(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->serviceModel->deleteService($id);
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }

    public function deleteHabitat(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->habitatModel->deleteHabitat($id);
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }

    public function deleteAnimal(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->animalModel->deleteAnimal($id);
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }
    public function deleteReport(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->reportModel->deleteReport($id);
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }
    public function deleteFood(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->foodModel->deleteFood($id);
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }

    public function deleteUser(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->userModel->deleteUser($id);
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }

    public function animalConsultationIncrement(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            if (isset($data['name'])) {
                $this->consultationModel->incrementConsultation($data['name']);
                header('Content-Type: application/json');
                echo json_encode(['success' => "Nombre de consultations d'animaux incrémenté."]);
            }
        }
    }
}

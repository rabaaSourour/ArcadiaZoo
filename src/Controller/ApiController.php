<?php

namespace App\Controller;

use App\Model\Review;
use App\Model\Service;
use App\Model\Habitat;
use PDO;

class ApiController
{
    private readonly Review $reviewModel;
    private readonly Service $serviceModel;
    private readonly habitat $habitatModel;

    public function __construct(PDO $pdo)
    {
        $this->reviewModel = new Review($pdo);
        $this->serviceModel = new Service($pdo);
        $this->habitatModel = new Habitat($pdo);
    }

    // URI : '/api/validateReview'
    public function validateReview() : array 
    {
        // Vérifiez si l'ID est passé en POST pour la validation
        if (isset($_POST['id'])) {
            $id = (int)$_POST['id'];
            $this->reviewModel->approveReview($id);
            
            // Réponse pour indiquer que la validation a été effectuée
            $status = ['status' => 'success', 'message' => 'Un message de succès'];
        } else {
            $status = ['status' => 'error', 'message' => 'Un message d\'erreur'];
        }

        echo json_encode($status);
        die();
    }

    // URI : '/api/deleteReview'
    public function deleteReview() : array
    {
        if (isset($_POST['id'])) {
            $id = (int)$_POST['id'];
            $this->reviewModel->deleteReview($id);
            
            // Réponse pour indiquer que la validation a été effectuée
            $status = ['status' => 'success', 'message' => 'Un message de succès'];
        } else {
            $status = ['status' => 'error', 'message' => 'Un message d\'erreur'];
        }

        echo json_encode($status);
        die();
    }

    // URI : '/api/deleteService'
    public function deleteService(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->serviceModel->deleteService($id);

            // Répondre avec un format JSON
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }

    // URI : '/api/deleteHabitat'
    public function deleteHabitat(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $success = $this->habitatModel->deleteHabitat($id);

            // Répondre avec un format JSON
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit();
        }
    }
}
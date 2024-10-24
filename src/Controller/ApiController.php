<?php

namespace App\Controller;

use App\Model\Review;
use PDO;

class ApiController
{
    private Review $reviewModel;

    public function __construct(PDO $pdo)
    {
        $this->reviewModel = new Review($pdo);
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
}
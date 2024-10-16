<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\ReviewController;
use App\Model\Review;
use App\Database\DbConnection;

// Obtenez une instance de PDO
$pdo = DbConnection::getPdo();

// Créez une instance du modèle Review
$reviewModel = new Review($pdo);

// Passez l'instance de Review au contrôleur
$reviewController = new ReviewController($reviewModel);

// Vérifiez si l'ID est passé en POST pour la suppression
if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $reviewController->deleteReview($id);
    
    // Réponse pour indiquer que la suppression a été effectuée
    echo json_encode(['status' => 'success', 'message' => 'Commentaire supprimé avec succès.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID de commentaire manquant.']);
}


<?php
require_once '../Database/DbConnection.php'; // Chemin d'accès correct
require_once '../Model/Service.php';

use App\Controller\ServiceController;
use App\Model\Service;
use App\Database\DbConnection;

// Obtenez une instance de PDO
$pdo = DbConnection::getPdo();

// Créez une instance du modèle Review
$serviceModel = new Service($pdo);

// Passez l'instance de Review au contrôleur
$serviceController = new serviceController($serviceModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) 
{
    $id = (int)$_GET['id']; 
    $service = new Service($pdo); 
    $success = $service->deleteService($id); 

    // Répondre avec un format JSON
    header('Content-Type: application/json');
    echo json_encode(['success' => $success]);
}

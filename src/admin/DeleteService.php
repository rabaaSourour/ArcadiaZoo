<?php
require_once '../Database/DbConnection.php'; // Chemin d'accès correct
require_once '../model/Service.php';

use App\Model\Service;
use App\Database\DbConnection;

$pdo = DbConnection::getPdo();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) 
{
    $serviceId = (int)$_GET['id']; 
    $service = new Service($pdo); 
    $success = $service->deleteService($serviceId); 

    // Répondre avec un format JSON
    header('Content-Type: application/json');
    echo json_encode(['success' => $success]);
}

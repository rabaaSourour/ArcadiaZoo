<?php
require_once '../Database/DbConnection.php';
require_once '../Model/Service.php';

use App\Model\Service;
use App\Database\DbConnection;
use App\Controller\ServiceController;

// Obtenez une instance de PDO
$pdo = DbConnection::getPdo();

$id = (int)$_GET['id']; // Récupération de l'ID du service

$service = new Service($pdo);
$serviceData = $service->getServiceById($id); // Récupération des données du service
$ServiceController = new ServiceController($serviceModel);

if (!$serviceData) {
    echo "Service non trouvé.";
    exit();
}

// Traitement du formulaire d'édition
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imagePath = $_POST['image'];
    $service->updateService($id, $name, $description, $imagePath); // Mise à jour du service

    header('Location: /pages/service'); // Redirection après la mise à jour
    exit();
}


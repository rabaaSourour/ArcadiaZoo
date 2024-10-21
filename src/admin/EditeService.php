<?php
require_once '../Database/DbConnection.php';
require_once '../model/Service.php';

use App\Model\Service;
use App\Database\DbConnection;

// Obtenez une instance de PDO
$pdo = DbConnection::getPdo();

$serviceId = (int)$_GET['id']; // Récupération de l'ID du service

$service = new Service($pdo);
$serviceData = $service->getServiceById($serviceId); // Récupération des données du service

if (!$serviceData) {
    echo "Service non trouvé.";
    exit();
}

// Traitement du formulaire d'édition
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imageLink = $_POST['image_path'];
    $service->updateService($serviceId, $name, $description, $imagePath); // Mise à jour du service

    header('Location: /pages/service'); // Redirection après la mise à jour
    exit();
}

// Inclure le formulaire pour l'édition
include __DIR__ . '/../../views/pages/editServiceForm.php';


<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../src/Database/DbConnection.php';
require_once __DIR__ . '/../../src/model/Service.php';

use App\Model\Service;
use App\Database\DbConnection;

// Vérifiez si l'utilisateur est un administrateur
//session_start();
//if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
  //  header('Location: /'); // Redirige vers la page d'accueil si l'utilisateur n'est pas admin
  //  exit();
//}

// Récupérez la connexion à la base de données
$pdo = DbConnection::getPdo();
$service = new Service($pdo);

// Vérifiez si l'ID du service est présent dans l'URL et si les données POST sont présentes
if (isset($_GET['id']) && !empty($_POST)) {
    $id = (int)$_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imagePath = $_POST['image_path'];

    // Mise à jour du service
    $updated = $service->updateService($id, $name, $description, $imagePath);

    if ($updated) {
        echo "Service mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du service.";
    }
} else {
    echo "Données manquantes pour la mise à jour.";
}

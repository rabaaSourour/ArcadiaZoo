<?php
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/Database/DbConnection.php';

use App\Controller\HorairesController;
use App\Model\Horaires;

// Connexion à la base de données
$pdo = DbConnection::getPdo();
$horairesModel = new Horaires($pdo);
$horairesController = new HorairesController($horairesModel);

// Récupération des données du formulaire
$id = $_POST['id'];
$openingTime = $_POST['openingTime'];
$closingTime = $_POST['closingTime'];

if (isset($_POST['id'], $_POST['openingTime'], $_POST['closingTime'])) {
    $id = $_POST['id'];
    $openingTime = $_POST['openingTime'];
    $closingTime = $_POST['closingTime'];

    // Debug: afficher les valeurs
    var_dump($id, $openingTime, $closingTime);

    // Mise à jour des horaires
    $horairesController->updateHoraires($id, $openingTime, $closingTime);

    // Redirection vers la page d'administration
    header('Location: /ArcadiaZoo/views/pages/home.php');
    exit();
} else {
    echo "Données du formulaire manquantes.";
}

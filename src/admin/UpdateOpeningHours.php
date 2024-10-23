<?php
require_once '../Database/DbConnection.php';
require_once '../Model/Horaires.php';
require_once '../Controller/HorairesController.php';

use App\Controller\HorairesController;
use App\Model\Horaires;
use App\Database\DbConnection;

// Connexion à la base de données
$pdo = DbConnection::getPdo();
$horairesModel = new Horaires($pdo);
$horairesController = new HorairesController($horairesModel);

// Vérifier la méthode de requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['horaires']) && is_array($_POST['horaires'])) {
        foreach ($_POST['horaires'] as $data) {
            if (isset($data['id'], $data['openingTime'], $data['closingTime'])) {
                $horairesController->updateHoraires([
                    'id' => $data['id'],
                    'openingTime' => $data['openingTime'],
                    'closingTime' => $data['closingTime']
                ]);
            }
        }

        // Redirection vers la page d'administration après la mise à jour
        header('Location: /pages/home');
        exit();
    } else {
        echo "Données du formulaire manquantes.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}


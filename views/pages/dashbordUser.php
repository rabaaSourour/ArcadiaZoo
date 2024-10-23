<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
include 'C:/xampp/htdocs/ArcadiaZoo/src/Database/DbConnection.php'; // Inclure le fichier de connexion à la base de données
use App\Model\Horaires;
use App\Controller\HorairesController;
//session_start();
//if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
  //  header('Location: login.php');
    //exit();
//}

?>
<div class="container text-bg-secondary rounded mt-4">
    <div class="row">
        <!-- Card Animaux -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Gestion des Animaux</h5>
                    <p class="card-text text-clear">Ajouter, modifier ou supprimer des animaux du zoo.</p>
                    <a href="#" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>

        <!-- Card Habitats -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestion des Habitats</h5>
                    <p class="card-text">Gérer les habitats</p>
                    <a href="#" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>

        <!-- Card Utilisateurs -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Gestion des Utilisateurs</h5>
                    <p class="card-text text-clear">Créer, modifier ou supprimer des utilisateurs.</p>
                    <a href="#" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>

        <!-- Card Services -->
        <div class="col-lg-4 mb-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Gestion des Services</h5>
                    <p class="card-text">Ajouter un nouveau service au zoo</p>
                    <a href="/views/pages/addService.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>

        <!-- Card Horaires -->
        <div class="col-lg-4 mb-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Gestion des Horaires</h5>
                    <p class="card-text">Configurer les horaires d'ouverture et de fermeture du zoo.</p>
                    <a href="OpeningHours.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <!-- Card Consultations -->
        <div class="col-lg-4 mb-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Consultations des Animaux</h5>
                    <p class="card-text">Voir les animaux les plus consultés.</p>
                    <a href="#" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <!-- Card views -->
        <div class="col-lg-4 mb-4">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Gestion des views</h5>
                    <p class="card-text">Valider les avis </p>
                    <a href="isValidateReview.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
    </div>
</div>
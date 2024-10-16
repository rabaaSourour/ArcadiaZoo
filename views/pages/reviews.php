<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/Database/DbConnection.php';
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/Model/Review.php';
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/Controller/ReviewController.php';

use App\Database\DbConnection;
use App\Model\Review;
use App\Controller\ReviewController;

// Connexion à la base de données
$pdo = DbConnection::getPdo();

// Initialisation du modèle Review
$reviewModel = new Review($pdo);

// Initialisation du contrôleur Review avec le modèle
$reviewController = new ReviewController($reviewModel);

// Gérer la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewController->addReview(); // Appeler la méthode pour ajouter l'avis
    // Note : Ne pas ré-instancier le contrôleur ici, utilisez l'existant
}

// Afficher le formulaire pour laisser un avis
?>
<div class="container text-bg-secondary rounded mt-5">
    <h2 class="card-title text-center text-bg-primary rounded pt-3 pb-3">Laissez un avis</h2>
    <form method="post" action="">
        <div class="mb-3 pt-3">
            <label for="PseudoInput" class="form-label">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" id="PseudoInput" required>
        </div>
        <div class="mb-3">
            <label for="commentText" class="form-label">Commentaire</label>
            <textarea name="review" class="form-control" id="commentText" rows="3" required></textarea>
        </div>
        <div class="text-center pb-3">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>

    <?php
    // Afficher un message de succès si un avis a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<div class='alert alert-success'>Merci pour votre avis, il sera examiné avant publication.</div>";
    }
    ?>
</div>

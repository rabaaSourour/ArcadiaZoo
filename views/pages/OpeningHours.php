<?php 
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php'; 
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/Database/DbConnection.php';
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/model/Horaires.php';
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/controller/HorairesController.php';

use App\Model\Horaires;
use App\Controller\HorairesController;

// Connexion à la base de données
$pdo = DbConnection::getPdo();

// Modèle et contrôleur des horaires
$horairesModel = new Horaires($pdo);
$horairesController = new HorairesController($horairesModel);

// Récupération des horaires actuels
$horaires = $horairesController->showHoraires();

?>
<div class="container text-bg-secondary rounded mt-5">
<h1 class="text-center text-bg-primary rounded">Modifier les horaires d'ouverture</h1>

<?php foreach ($horaires as $horaire): ?>
    <form method="POST" action="UpdateOpeningHours.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars($horaire['id']) ?>">
        <label class="card-title">Jour: <?= htmlspecialchars($horaire['day']) ?></label><br>
        <label>Heure d'ouverture:</label>
        <input class="text-bg-primary rounded" type="time" name="openingTime" value="<?= substr(htmlspecialchars($horaire['openingTime']), 0, 5) ?>"><br>
        <label>Heure de fermeture:</label>
        <input class="text-bg-primary rounded" type="time" name="closingTime" value="<?= substr(htmlspecialchars($horaire['closingTime']), 0, 5) ?>"><br>
        <hr>
        <?php endforeach; ?>
        <button class="btn btn-outline-light" type="submit">Modifier</button>
    </form>
    </div>

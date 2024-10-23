<?php 
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php'; 


use App\Model\Horaires;
use App\Controller\HorairesController;
use App\Database\DbConnection;

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
    <form method="POST" action="/src/Admin/UpdateOpeningHours.php">
        <?php foreach ($horaires as $horaire): ?>
            <input type="hidden" name="horaires[<?= $horaire['id'] ?>][id]" value="<?= htmlspecialchars($horaire['id']) ?>">
            <label class="card-title">Jour: <?= htmlspecialchars($horaire['day']) ?></label><br>
            <label>Heure d'ouverture:</label>
            <input class="text-bg-primary rounded" type="time" name="horaires[<?= $horaire['id'] ?>][openingTime]" value="<?= substr(htmlspecialchars($horaire['openingTime']), 0, 5) ?>"><br>
            <label>Heure de fermeture:</label>
            <input class="text-bg-primary rounded" type="time" name="horaires[<?= $horaire['id'] ?>][closingTime]" value="<?= substr(htmlspecialchars($horaire['closingTime']), 0, 5) ?>"><br>
            <hr>
        <?php endforeach; ?>
        <button class="btn btn-outline-light mt-2" type="submit">Modifier</button>
    </form>
</div>

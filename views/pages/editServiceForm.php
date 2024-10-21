<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../src/Database/DbConnection.php';
require_once __DIR__ . '/../../src/model/Service.php';

use App\Model\Service;
use App\Database\DbConnection;

$pdo = DbConnection::getPdo();
$service = new Service($pdo);


// Récupération de l'ID à partir de l'URL
if (isset($_GET['id'])) {
    $serviceId = (int)$_GET['id'];
    $serviceData = $service->getServiceById($serviceId);
    
    if (!$serviceData) {
        echo "Service non trouvé.";
        exit();
    }
}
    // Connexion à la base de données et récupération du servic
//session_start();
//if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
//   header('Location: /views/pages/home.php'); // Redirige vers la page d'accueil si l'utilisateur n'est pas administrateur
//  exit();
//}
?>
<div class="container rounded mt-5">
    <h1 class="text-center text-bg-primary rounded">Modifier le Service</h1>
    <?php if (isset($service) && !empty($service)): ?>

        <form action="/src/admin/updateService.php?id=<?= htmlspecialchars($service['id']) ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Modifier le nom:</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($service['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" rows="4" required><?= htmlspecialchars($service['description']) ?></textarea>
            </div>
            <div class="mb-3">
            <label for="image_path" class="form-label">Modifier l'image:</label>
        <input type="file" id="image_path" name="image_path" accept="image/*">
        <!-- Champ caché pour conserver l'image existante si aucune nouvelle image n'est téléchargée -->
        <input type="hidden" name="existing_image_path" value="<?= htmlspecialchars($service['image_path']) ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
<?php else: ?>
    <p>Aucun service trouvé pour cet ID.</p>
<?php endif; ?>
</div>
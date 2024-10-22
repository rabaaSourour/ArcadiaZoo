<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../src/Database/DbConnection.php';
require_once __DIR__ . '/../../src/Model/Service.php';

use App\Model\Service;
use App\Database\DbConnection;

$pdo = DbConnection::getPdo();
$service = new Service($pdo);

// Récupération de l'ID à partir de l'URL
if (isset($_GET['id'])) {
    $serviceId = (int)$_GET['id'];
    $service = $service->getServiceById($serviceId);
    
    if (!$service) {
        echo "Service non trouvé.";
        exit();
    }
}
    // Connexion à la base de données et récupération du service
//session_start();
//if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
//   header('Location: /views/pages/home.php'); // Redirige vers la page d'accueil si l'utilisateur n'est pas administrateur
//  exit();
//}
?>
<div class="container rounded mt-5">
    <h1 class="text-center text-bg-primary rounded">Modifier le Service</h1>
    <?php if (isset($service)) : ?>
        <form action="/src/admin/updateService.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($service['id']); ?>">

            <label for="name">Nom du service :</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($service['name']); ?>" required>

            <label for="description">Description :</label>
            <textarea name="description" id="description" required><?php echo htmlspecialchars($service['description']); ?></textarea>

            <label for="image">Image actuelle :</label>
            <img src="/asset/uploaded_images/<?php echo htmlspecialchars($service['image']); ?>" alt="Image du service" style="width: 150px;">
            <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($service['image']); ?>">

            <label for="image">Nouvelle image (facultatif) :</label>
            <input type="file" name="image" id="image">

            <button type="submit">Enregistrer les modifications</button>
        </form>
    <?php else : ?>
        <p>Aucun service trouvé pour modification.</p>
    <?php endif; ?>
</div>
<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../src/Database/DbConnection.php';

use App\Database\DbConnection;
use App\Controller\ServiceController;
use App\Model\Service;

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que les champs existent dans le tableau $_POST
    $serviceName = isset($_POST['serviceName']) ? htmlspecialchars($_POST['serviceName']) : '';
    $serviceDescription = isset($_POST['serviceDescription']) ? htmlspecialchars($_POST['serviceDescription']) : '';
    $serviceCategory = isset($_POST['serviceCategory']) ? htmlspecialchars($_POST['serviceCategory']) : '';
    $imagePath = '';

    // Vérifier que tous les champs requis sont remplis
    if (empty($serviceName) || empty($serviceDescription) || empty($serviceCategory)) {
        $message = "Le nom, la description et la catégorie du service sont requis.";
    } else {
        // Vérification de l'image
        if (isset($_FILES['serviceImage']) && $_FILES['serviceImage']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['serviceImage']['tmp_name'];
            $fileName = $_FILES['serviceImage']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Extensions autorisées
            $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                // Chemin pour sauvegarder l'image
                $uploadFileDir = __DIR__ .'/public/asset/uploaded_images/';
                $dest_path = $uploadFileDir . uniqid() . '_' . $fileName;

                // Déplacer le fichier téléchargé
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $imagePath = $dest_path;
                    $message = "Image téléchargée avec succès.";
                } else {
                    $message = "Erreur lors du téléchargement de l'image.";
                }
            } else {
                $message = "Veuillez sélectionner une image valide.";
            }
        } else {
            $message = "Erreur dans le téléchargement de l'image.";
        }

        // Ajout du service à la base de données (à condition que $imagePath soit défini)
        if ($imagePath) {
            // Connectez-vous à votre base de données
            $dbConnection = new mysqli('localhost', 'votre_utilisateur', 'votre_mot_de_passe', 'nom_de_votre_base');

            if ($dbConnection->connect_error) {
                die("Erreur de connexion : " . $dbConnection->connect_error);
            }

            // Préparer la requête SQL pour insérer le service avec sa catégorie
            $stmt = $dbConnection->prepare("INSERT INTO services (name, description, image_path, category) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $serviceName, $serviceDescription, $imagePath, $serviceCategory);

            if ($stmt->execute()) {
                $message = "Service ajouté avec succès.";
            } else {
                $message = "Erreur lors de l'ajout du service : " . $stmt->error;
            }

            $stmt->close();
            $dbConnection->close();
        }
    }
}
?>
<div class="container rounded mt-5">
    <h2>Ajouter un Nouveau Service</h2>
    
    <?php if ($message): ?>
        <div class="alert alert-info">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form action="/views/pages/addService.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="serviceName" class="form-label">Titre du Service</label>
            <input type="text" class="form-control" id="title" name="serviceName" required>
        </div>
        <div class="mb-3">
            <label for="serviceDescription" class="form-label">Description</label>
            <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="serviceCategory" class="form-label">Catégorie</label>
            <select class="form-select" id="serviceCategory" name="serviceCategory" required>
                <option value="restauration">Restauration</option>
                <option value="visite">Visite</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="serviceImage" class="form-label">Image du Service</label>
            <input type="file" class="form-control" id="serviceImageage" name="serviceImage" accept="image/*" required>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary">Ajouter le Service</button>
        </div>
    </form>
</div>

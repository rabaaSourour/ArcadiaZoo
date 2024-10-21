<?php
namespace App\Controller;

use App\Model\Service;
use App\Database\DbConnection;

class ServiceController {
    private $serviceModel;


    public function __construct(Service $serviceModel)
    {
        $db = DbConnection::getPdo();
        $this->serviceModel = $serviceModel;
    }
    // Afficher tous les services
    public function index() {
        $services = $this->serviceModel->getAllServices(); // Récupérer tous les services
        include __DIR__ . '/../views/pages/service.php'; // Inclure la vue
    }

    // Afficher un service spécifique
    public function show($id) {
        $service = $this->serviceModel->getServiceById($id); // Récupérer le service par ID
    
        if (!$service) {
            // Gestion de l'erreur si le service n'est pas trouvé
            echo "Service non trouvé.";
            exit();
        }
    
        include __DIR__ . '/../views/pages/editServiceForm.php'; // Inclure le formulaire d'édition
    }

    // Mettre à jour un service
public function update($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        // Gestion de l'upload de l'image
        $imagePath = $_POST['existing_image_path']; // Par défaut, utiliser l'image existante
        if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
            $targetDir = __DIR__ . '/../../public/asset/uploaded_images/';
            $imagePath = $targetDir . basename($_FILES['image_path']['name']);
            // Vérifiez le type de fichier (optionnel)
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['image_path']['type'], $allowedTypes)) {
                move_uploaded_file($_FILES['image_path']['tmp_name'], $imagePath);
            } else {
                echo "Type de fichier non autorisé.";
                exit();
            }
        }

        $this->serviceModel->updateService($id, $name, $description, $imagePath); // Mettre à jour le service
        header('Location: /pages/service'); // Redirection après la mise à jour
        exit();
    } else {
        // Si ce n'est pas une requête POST, récupérer les données du service pour pré-remplir le formulaire
        $this->show($id); // Appelle la méthode show pour afficher le formulaire avec les données
    }
}


    // Supprimer un service
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->serviceModel->deleteService($id); // Supprimer le service
            header('Location: pages/service'); // Redirection après la suppression
            exit();
        }
    }
}
?>


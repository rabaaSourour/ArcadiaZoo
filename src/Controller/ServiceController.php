<?php

namespace App\Controller;

use App\Model\Service;

class ServiceController
{
    private $serviceModel;

    public function __construct(Service $serviceModel)
    {

        $this->serviceModel = $serviceModel;
    }
    // Afficher tous les services
    public function index()
    {
        $service = $this->serviceModel->getAllServices(); // Récupérer tous les services
        include __DIR__ . '/../pages/service'; // Inclure la vue
    }

    // Afficher un service spécifique
    public function show($id)
    {
        $service = $this->serviceModel->getServiceById($id); // Récupérer le service par ID

        if (!$service) {
            // Gestion de l'erreur si le service n'est pas trouvé
            echo "Service non trouvé.";
            exit();
        }

        include __DIR__ . '/../pages/editServiceForm'; // Inclure le formulaire d'édition
    }

    public function editServiceForm(int $id)
    {
          // Récupérer les détails du service à partir de son ID
        $service = $this->serviceModel->getServiceById($id);

    // Vérifier si le service existe
        if (!$service) {
            throw new \Exception("Service not found with ID: {$id}");
        }


        // Retourne la vue avec les détails du service pour l'afficher dans le formulaire d'édition
        return [
            'view' => 'pages/editServiceForm', // Spécifie la vue à charger
            'data' => [
                'service' => $service // Passe les détails du service à la vue
            ]
        ];
    }

    public function addService() : array
    {
        die('Bonjour ttout le monde !');
        return [];
    }

    // Mettre à jour un service
    public function update(int $id) 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valider les données ici
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            // Récupérer le service par ID
            $service = $this->serviceModel->getServiceById($id);

            if (!$service) {
                throw new \Exception("Service non trouvé avec l'ID : {$id}");
            }

            // Gestion de l'upload de l'image
            $imagePath = $_POST['existing_image'] ?? ''; // Utiliser l'image existante par défaut
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $targetDir = __DIR__ . '/../../public/asset/uploaded_images/';
                $imagePath = $targetDir . basename($_FILES['image']['name']);
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (in_array($_FILES['image']['type'], $allowedTypes)) {
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                        echo "Erreur lors du téléchargement de l'image.";
                        exit();
                    }
                } else {
                    echo "Type de fichier non autorisé.";
                    exit();
                }
            }

            if (!$this->serviceModel->updateService($id, $name, $description, $imagePath)) {
                echo "Erreur lors de la mise à jour du service.";
                exit();
            }

            header('Location: /pages/service'); // Redirection après la mise à jour
            exit();
        } else {
            // Si ce n'est pas une requête POST, récupérer les données du service pour pré-remplir le formulaire
            $this->show($id); // Appelle la méthode show pour afficher le formulaire avec les données
        }
    }


    // Supprimer un service
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->serviceModel->deleteService($id); // Supprimer le service
            header('Location: pages/service'); // Redirection après la suppression
            exit();
        }
    }
}

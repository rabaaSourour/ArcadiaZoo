<?php

namespace App\Controller;

use App\Model\Service;
use App\Services\FileUploader;
use PDO;

class ServiceController
{
    private $serviceModel;

    public function __construct(PDO $pdo)
    {
        $this->serviceModel = new Service($pdo);
    }
    
    // Afficher un service spécifique
    // URI : '/service/show'
    public function show(): array
    {
        $service = $this->serviceModel->getAllServices();

        $isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

        return [
            'page' => 'service',
            'variables' => [
                'services' => $service,
                'isAdmin' => $isAdmin,
            ]
        ];
    }

    // URI : '/service/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->serviceModel->deleteService($id); // Supprimer le service
            header('Location: service/view'); // Redirection après la suppression
            exit();
        }
    }

    // URI : '/service/new'
    public function new()
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valider les données ici
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $category = htmlspecialchars($_POST['category']);

            // Gestion de l'upload de l'image
            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();

                $this->serviceModel->addService($name, $description, $category, $imagePath);
            } else {
                $message = 'L\'image du service est obligatoire';
            }
        }

        return [
            'page' => 'addService',
            'variables' => [
                'message' => $message,
            ]
        ];
    }

    // URI : '/service/update'
    public function update(): array
    {
        $id = (int)($_GET['id'] ?? 0); // Récupération de l'ID du service

        $service = $this->serviceModel->getServiceById($id); // Récupération des données du service

        if (!$service) {
            echo "Service non trouvé.";
            exit();
        }

        // Traitement du formulaire d'édition
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $imagePath = null;

            if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                // Upload l'image sur le serveur
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();
            }

            if (!empty($name) && !empty($description)) {
                $this->serviceModel->updateService($id, $name, $description, $imagePath); // Mise à jour du service

                header('Location: /service/show'); // Redirection après la mise à jour
                exit();
            } else {
                echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
            }
        }

        return [
            'page' => 'editServiceForm',
            'variables' => [
                'service' => $service
            ]
        ];
    }
}
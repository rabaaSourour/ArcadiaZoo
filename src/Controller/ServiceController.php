<?php

namespace App\Controller;

use App\Model\Service;
use App\Database\DbConnection;

class ServiceController
{
    private $serviceModel;

    public function __construct(Service $serviceModel)
    {
        $this->serviceModel = $serviceModel;
    }

    // Méthode pour gérer l'ajout d'un service
    public function addService()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['description'], $_POST['image_link'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $imageLink = $_POST['image_link'];

            if (!empty($name) && !empty($description) && !empty($imageLink)) {
                $this->serviceModel->createService($name, $description, $imageLink);
                header('Location: /views/pages/service.php');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
            }
        }
    }

    // Méthode pour récupérer les services validés
    public function getServices()
    {
        return $this->serviceModel->getAllServices();
    }

    // Méthode pour mettre à jour un service
    public function updateService($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['description'], $_POST['image_link'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $imageLink = $_POST['image_link'];
            $this->serviceModel->updateService($id, $name, $description, $imageLink);
            header('Location: /views/pages/service.php');
            exit();
        }
    }

    // Méthode pour supprimer un service
    public function deleteService($id)
    {
        $this->serviceModel->deleteService($id);
    }
}

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

    // URI : '/service/show'
    public function show(): array
    {
        $service = $this->serviceModel->getAllServices();

        $role = isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'employe'])
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'service',
            'variables' => [
                'services' => $service,
                'role' => $role,
            ]
        ];
    }

    // URI : '/service/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->serviceModel->deleteService($id);
            header('Location: service/show');
            exit();
        }
    }

    // URI : '/service/new'
    public function new(): array
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $category = htmlspecialchars($_POST['category']);

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
        $id = (int)($_GET['id'] ?? 0);

        $service = $this->serviceModel->getServiceById($id);

        if (!$service) {
            echo "Service non trouvé.";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $imagePath = null;

            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();
            }

            if (!empty($name) && !empty($description)) {
                $this->serviceModel->updateService($id, $name, $description, $imagePath);

                header('Location: /service/show');
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

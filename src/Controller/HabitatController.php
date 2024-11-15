<?php

namespace App\Controller;

use App\Model\Habitat;
use App\Model\Animal;
use App\Model\Report;
use App\Services\FileUploader;
use PDO;

class HabitatController
{
    private $habitatModel;
    private $animalModel;
    private $reportModel;

    public function __construct(PDO $pdo)
    {
        $this->habitatModel = new Habitat($pdo);
        $this->animalModel = new Animal($pdo);
        $this->reportModel = new Report($pdo);
    }

    // URI : '/habitat/show'
    public function show(): array
    {
        $habitat = $this->habitatModel->getAllHabitats();
        $animal = $this->animalModel->getAllAnimals();
        $report = $this->reportModel->getAllReports();

        $role = isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'veterinaire'])
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'habitat',
            'variables' => [
                'habitats' => $habitat,
                'animals' => $animal,
                'reports' => $report,
                'role' => $role,
            ]
        ];
    }

    // URI : '/habitat/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->habitatModel->deleteHabitat($id);
            header('Location: /habitat/show');
            exit();
        }
    }

    // URI : '/habitat/new'
    public function new(): array
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);

            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();

                $this->habitatModel->addHabitat($name, $description, $imagePath);
            } else {
                $message = 'L\'image du habitat est obligatoire';
            }
        }

        return [
            'page' => 'addhabitat',
            'variables' => [
                'message' => $message,
            ]
        ];
    }

    // URI : '/habitat/update'
    public function update(): array
    {
        $id = (int)($_GET['id'] ?? 0);

        $habitat = $this->habitatModel->getHabitatById($id);

        if (!$habitat) {
            echo "habitat non trouvé.";
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
                $this->habitatModel->updateHabitat($id, $name, $description, $imagePath);

                header('Location: /habitat/show');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
            }
        }

        return [
            'page' => 'editHabitatForm',
            'variables' => [
                'habitat' => $habitat
            ]
        ];
    }
}

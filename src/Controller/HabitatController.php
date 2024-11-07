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

        $isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

        return [
            'page' => 'habitat',
            'variables' => [
                'habitats' => $habitat,
                'animals' => $animal,
                'reports' => $report,
                'isAdmin' => $isAdmin,
            ]
        ];
    }

    // URI : '/habitat/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->habitatModel->deleteHabitat($id); // Supprimer le habitat
            header('Location: /habitat/show'); // Redirection après la suppression
            exit();
        }
    }

    // URI : '/habitat/new'
    public function new(): array
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valider les données ici
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);


            // Gestion de l'upload de l'image
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
        $id = (int)($_GET['id'] ?? 0); // Récupération de l'ID du habitat

        $habitat = $this->habitatModel->getHabitatById($id); // Récupération des données du habitat

        if (!$habitat) {
            echo "habitat non trouvé.";
            exit();
        }

        // Traitement du formulaire d'édition
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $imagePath = null;

            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                // Upload l'image sur le serveur
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();
            }

            if (!empty($name) && !empty($description)) {
                $this->habitatModel->updateHabitat($id, $name, $description, $imagePath); // Mise à jour du habitat

                header('Location: /habitat/show'); // Redirection après la mise à jour
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

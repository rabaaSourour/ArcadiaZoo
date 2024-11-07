<?php

namespace App\Controller;

use App\Model\Animal;
use App\Model\Habitat;
use App\Services\FileUploader;
use PDO;

class AnimalController
{
    private $animalModel;
    private Habitat $habitatModel;

    public function __construct(PDO $pdo)
    {
        $this->animalModel = new Animal($pdo);
        $this->habitatModel = new Habitat($pdo);
    }

    // URI : '/animal/show'
    public function show(): array
    {
        $animal = $this->animalModel->getAllAnimals();
        $habitats = $this->habitatModel->getAllHabitats();

        $isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

        return [
            'page' => 'habitat',
            'variables' => [
                'animals' => $animal,
                'habitats' => $habitats,
                'isAdmin' => $isAdmin,
            ]
        ];
    }

    // URI : '/animal/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->animalModel->deleteAnimal($id); // Supprimer le animal
            header('Location: /habitat/show'); // Redirection après la suppression
            exit();
        }
    }

    // URI : '/animal/new'
    public function new() : array
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valider les données ici
            $name = htmlspecialchars($_POST['name']);
            $breed = htmlspecialchars($_POST['breed']);
            $habitatId = htmlspecialchars($_POST['habitat_id']);


            // Gestion de l'upload de l'image
            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();

                $this->animalModel->addAnimal($name, $breed, $imagePath, $habitatId);
            } else {
                $message = 'L\'image du animal est obligatoire';
            }
        }
        $habitats = $this->habitatModel->getAllHabitats();
        return [
            'page' => 'addAnimal',
            'variables' => [
                'habitats' => $habitats,
                'message' => $message,
            ]
        ];
    }

    // URI : '/animal/update'
    public function update(): array
    {
        $id = (int)($_GET['id'] ?? 0); // Récupération de l'ID du animal

        $animal = $this->animalModel->getAnimalById($id); // Récupération des données du animal

        if (!$animal) {
            echo "animal non trouvé.";
            exit();
        }

        // Traitement du formulaire d'édition
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $name = $_POST['name'] ?? '';
            $breed = $_POST['breed'] ?? '';
            $imagePath = null;

            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                // Upload l'image sur le serveur
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();
            }

            if (!empty($name) && !empty($breed)) {
                $this->animalModel->updateAnimal($id, $name, $breed, $imagePath); // Mise à jour du animal

                header('Location: /habitat/show'); // Redirection après la mise à jour
                exit();
            } else {
                echo "<div class='alert alert-danger'>Tous les champs doivent être remplis.</div>";
            }
        }

        return [
            'page' => 'editAnimalForm',
            'variables' => [
                'animal' => $animal
            ]
        ];
    }
}

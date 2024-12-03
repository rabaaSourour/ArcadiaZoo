<?php

namespace App\Controller;

use App\Model\Animal;
use App\Model\Habitat;
use App\Services\FileUploader;
use App\Services\MongoDBService;

use PDO;

class AnimalController
{
    private $animalModel;
    private Habitat $habitatModel;
    private $mongoDBService;

    public function __construct(PDO $pdo, MongoDbService $mongoDBService)
    {
        $this->animalModel = new Animal($pdo);
        $this->habitatModel = new Habitat($pdo);
        $this->mongoDBService = $mongoDBService;
    }

    // URI : '/animal/show'
    public function show(): array
    {
        $animal = $this->animalModel->getAllAnimals();
        $habitats = $this->habitatModel->getAllHabitats();

        $role = isset($_SESSION['role']) && $_SESSION['role'] === 'admin'
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'habitat',
            'variables' => [
                'animals' => $animal,
                'habitats' => $habitats,
                'role' => $role,
            ]
        ];
    }

    // URI : '/animal/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->animalModel->deleteAnimal($id);
            $this->mongoDBService->synchronize();
            header('Location: /habitat/show');
            exit();
        }
    }

    // URI : '/animal/new'
    public function new(): array
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = htmlspecialchars($_POST['name']);
            $breed = htmlspecialchars($_POST['breed']);
            $habitatId = htmlspecialchars($_POST['habitat_id']);

            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();

                $this->animalModel->addAnimal($name, $breed, $imagePath, $habitatId);
            } else {
                $message = 'L\'image du animal est obligatoire';
            }
        }
        $habitats = $this->habitatModel->getAllHabitats();
        $this->mongoDBService->synchronize();
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
        $id = (int)($_GET['id'] ?? 0);

        $animal = $this->animalModel->getAnimalById($id);

        if (!$animal) {
            echo "animal non trouvé.";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'] ?? '';
            $breed = $_POST['breed'] ?? '';
            $imagePath = null;

            if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                FileUploader::upload($_FILES['image']);
                $imagePath = FileUploader::getUploadedFilePath();
            }

            if (!empty($name) && !empty($breed)) {
                $this->animalModel->updateAnimal($id, $name, $breed, $imagePath);

                header('Location: /habitat/show');
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

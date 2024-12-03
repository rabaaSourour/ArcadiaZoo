<?php

namespace App\Controller;

use App\Model\Food;
use App\Model\Animal;
use PDO;

class FoodController
{
    private $foodModel;
    private $animalModel;

    public function __construct(PDO $pdo)
    {
        $this->foodModel = new Food($pdo);
        $this->animalModel = new Animal($pdo);

    }
    
    // URI : '/food/show'
    public function show(): array
    {
        $food = $this->foodModel->getAllFoods();
        $animal = $this->animalModel->getAllAnimals();

        $role = isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'veterinaire', 'employe'])
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'food',
            'variables' => [
                'foods' => $food,
                'animals' =>$animal,
                'role' => $role,
            ]
        ];
    }

    // URI : '/food/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->foodModel->deleteFood($id);
            header('Location: /food/show');
            exit();
        }
    }

    // URI : '/food/new'
    public function new(): array
    {
        $message = '';
        $animal = $this->animalModel->getAllAnimals();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valider les données ici
            $food = htmlspecialchars($_POST['food']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $animalId = (int) htmlspecialchars($_POST['animals_id']);

            if (!empty($animal) && !empty($food) && !empty($quantity) && $animalId > 0) {
                $this->foodModel->addFood($food, $quantity,  $animalId);
                header('Location: /food/show');
                exit();
            } else {
                $message = 'Tous les champs doivent être remplis';
            }
        }

        return [
            'page' => 'addFood',
            'variables' => [
                'message' => $message,
                'animals' => $animal,
            ]
        ];
    }


    // URI : '/food/update'
    public function update(): array
    {
        $id = (int)($_GET['id'] ?? 0);

        $food = $this->foodModel->getFoodById($id);
        $animal = $this->animalModel->getAllAnimals();
        if (!$food) {
            echo "Nourriture non trouvé.";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $food = htmlspecialchars($_POST['food'] ?? '');
            $quantity = htmlspecialchars($_POST['quantity'] ?? '');
            $animalId = (int) htmlspecialchars($_POST['animals_id'] ?? '');

            if ($animalId > 0 && !empty($food) && !empty($quantity) ) {
                $this->foodModel->updateFood($id, $food, $quantity, $animalId);

                header('Location: /food/show');
                exit();
            } 
        }

        return [
            'page' => 'editFoodForm',
            'variables' => [
                'food' => $food,
                'animals' => $animal,
            ]
        ];
    }
}
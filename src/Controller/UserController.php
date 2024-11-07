<?php

namespace App\Controller;

use App\Model\User;
use PDO;

class UserController
{
    private $userModel;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
    }

    // URI : '/user/show'
    public function show(): array
    {
        $users = $this->userModel->getAllUsers();

        //$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

        return [
            'page' => 'user',
            'variables' => [
                'users' => $users,
                //'isAdmin' => $isAdmin,
            ]
        ];
    }

    // URI : '/animal/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userModel->deleteUser($id);
            header('Location: /user/show'); // Redirection après la suppression
            exit();
        }
    }

    // URI : '/user/new'
    public function new(): array
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valider les données ici
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $passWord = htmlspecialchars($_POST['password']);
            $role = htmlspecialchars($_POST['role']);

            if (!empty($email) && !empty($passWord) && !empty($role)) {
                $this->userModel->addUser($email, $passWord, $role);
                $message = 'Utilisateur ajouté avec succès';
            } else {
                $message = 'Tous les champs doivent être remplis';
            }
        } else {
            $message = 'Tous les champs doivent être remplis';
        }
        //session_start();
        //if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
           // header('Location: /user/show');
            //exit;
        //}
        return [
            'page' => 'addUser',
            'variables' => [
                'message' => $message,
            ]
        ];
    }

    // URI : '/user/update'
    public function update(): array
    {
        // Récupération de l'ID de l'utilisateur à partir de la requête GET
        $id = (int)($_GET['id'] ?? 0);
        $user = $this->userModel->getUserById($id); // Récupérer l'utilisateur par ID
    
        // Vérifier si l'utilisateur existe
        if (!$user) {
            echo "Utilisateur non trouvé.";
            exit();
        }
    
        // Traitement du formulaire d'édition
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $userId = $_POST['id'] ?? null;
            $email = $_POST['email'] ?? null;
            $oldPassword = $_POST['OldPassword'] ?? null;
            $newPassword = $_POST['Password'] ?? null;
            $confirmPassword = $_POST['PasswordConfirm'] ?? null;
    
            // Vérifier si l'utilisateur existe en base de données
            if ($userId) {
                // Vérifier si tous les champs requis sont remplis
                if (!empty($email) && !empty($oldPassword) && !empty($newPassword)) {
                    // Vérifier si l'ancien mot de passe est correct
                    if (password_verify($oldPassword, $user['password'])) {
                        // Vérifier que le nouveau mot de passe correspond aux critères
                        if ($newPassword === $confirmPassword && strlen($newPassword) >= 12) {
                            // Hacher le nouveau mot de passe
                            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                            
                            // Mettre à jour le mot de passe de l'utilisateur
                            $this->userModel->updateUser($userId, $hashedPassword);
                            
                            // Redirection après la mise à jour
                            header('Location: /signin');
                            exit();
                        } else {
                            echo "Le nouveau mot de passe et la confirmation doivent être identiques et comporter au moins 12 caractères.";
                        }
                    } else {
                        echo "L'ancien mot de passe est incorrect.";
                    }
                } else {
                    echo "Veuillez remplir tous les champs requis.";
                }
            } else {
                echo "Utilisateur non trouvé.";
            }
        }
    
        // Retourne la page de formulaire avec les données de l'utilisateur
        return [
            'page' => 'editUserForm',
            'variables' => [
                'user' => $user
            ]
        ];
    }
}

<?php

namespace App\Controller;

use App\Model\User;
use App\Services\Mailer;
use App\Services\CSRFToken;

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

        $role = isset($_SESSION['role']) && $_SESSION['role'] === 'admin'
            ? $_SESSION['role']
            : null;

        return [
            'page' => 'user',
            'variables' => [
                'users' => $users,
                'role' => $role
            ]
        ];
    }

    // URI : '/user/delete'
    public function delete($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!CSRFToken::validate($_POST['csrf_token'] ?? '')) {
                header('Location: /error/server-error');
                die;
            }
            $this->userModel->deleteUser($id);
            header('Location: /user/show');
            exit();
        }
    }

    // URI : '/user/new'
    public function new(): array
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!CSRFToken::validate($_POST['csrf_token'] ?? '')) {
                header('Location: /error/server-error');
                die;
            }
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $passWord = $_POST['password'];
            $role = htmlspecialchars($_POST['role']);

            if (!empty($email) && !empty($passWord) && !empty($role)) {
                if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W_]).{12,}$/', $passWord)) {
                    $message = 'Le mot de passe doit contenir au moins 12 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.';
                } else {
                    $userId = $this->userModel->addUser($email, $passWord, $role);
                    if ($userId) {
                        $message = 'Utilisateur ajouté avec succès';

                        $mailer = new Mailer();
                        $mailer->sendUserCreationEmail($email, $role);
                    } else {
                        $message = 'Erreur lors de l\'ajout de l\'utilisateur.';
                    }
                }
            } else {
                $message = 'Tous les champs doivent être remplis';
            }
        }

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
        $message = '';

        $id = (int)($_GET['id'] ?? 0);
        $user = $this->userModel->getUserById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!CSRFToken::validate($_POST['csrf_token'] ?? '')) {
                header('Location: /error/server-error');
                die;
            }
            $userId = $_POST['id'] ?? null;
            $email = $_POST['email'] ?? null;
            $oldPassword = $_POST['OldPassword'] ?? null;
            $newPassword = $_POST['Password'] ?? null;
            $confirmPassword = $_POST['PasswordConfirm'] ?? null;

            if ($userId) {
                if (!empty($email) && !empty($oldPassword) && !empty($newPassword)) {

                    if (password_verify($oldPassword, $user['password'])) {

                        if ($newPassword === $confirmPassword && $this->isValidPassword($newPassword)) {
                            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                            $this->userModel->updateUser($userId, $hashedPassword);

                            header('Location: /signin');
                            exit();
                        } else {
                            $message = "Le nouveau mot de passe et la confirmation doivent être identiques et comporter au moins 12 caractères.";
                        }
                    } else {
                        $message = "L'ancien mot de passe est incorrect.";
                    }
                } else {
                    $message = "Veuillez remplir tous les champs requis.";
                }
            } else {
                $message = "Utilisateur non trouvé.";
            }
        }

        return [
            'page' => 'editUserForm',
            'variables' => [
                'user' => $user,
                'message' => $message
            ]
        ];
    }

    /**
     * Valide si un mot de passe répond aux critères de sécurité.
     *
     * @param string $password
     * @return bool
     */
    private function isValidPassword(string $password): bool
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{12,}$/', $password);
    }
}

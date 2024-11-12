<?php

namespace App\Controller;

use App\Model\Signin;
use PDO;

class SigninController
{
    private $signinModel;

    public function __construct(PDO $pdo)
    {
        $this->signinModel = new Signin($pdo);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $role = $_POST['role'] ?? null;


            $user = $this->signinModel->login($email, $role);
            var_dump($email, $role, $user); 
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: /home/show');
                exit;
            } else {
                echo 'Email ou mot de passe incorrect';
            }
        }

        return [
            'page' => 'signin',
            'variables' => []
        ];
    }

    public function isAdmin()
    {
        if ($this->signinModel->isAdmin()) {

            return true;
        } else {
            return header('location: /login');
            exit();
        }
    }

    public function logout()
    {
        $this->signinModel->logout();
    }
}

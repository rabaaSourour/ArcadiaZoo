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
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('Erreur CSRF : jeton invalide.');
            }

            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $passWord = $_POST['password'] ?? null;
            $role = $_POST['role'] ?? null;
    
            if ($email && $passWord) {
                $user = $this->signinModel->login($email, $role);
    
                if ($user && password_verify($passWord, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    header('Location: /home/show');
                    exit;
                } else {
                    echo 'Email ou mot de passe incorrect';
                    $this->incrementLoginAttempts();
                }
            }
        } else {
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = 0;
                $_SESSION['lockout_time'] = 0;
            }
    
            $this->checkLoginAttempts();
        }
    
        return [
            'page' => 'signin',
            'variables' => []
        ];
    }
    
    private function incrementLoginAttempts()
    {
        $_SESSION['login_attempts']++;
        if ($_SESSION['login_attempts'] >= 5) {
            $_SESSION['lockout_time'] = time();
            die('Trop de tentatives échouées. Essayez à nouveau plus tard.');
        }
    }

    private function checkLoginAttempts()
    {
        if ($_SESSION['login_attempts'] >= 5) {
            if (time() - $_SESSION['lockout_time'] < 900) {
                die('Trop de tentatives échouées. Essayez à nouveau plus tard.');
            } else {
                $_SESSION['login_attempts'] = 0;
            }
        }
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

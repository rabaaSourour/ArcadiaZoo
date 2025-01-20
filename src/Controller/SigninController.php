<?php

namespace App\Controller;

use App\Model\Signin;
use PDO;
use App\Services\CSRFToken;

class SigninController
{
    private $signinModel;

    private const MAX_ATTEMPTS = 3;

    public function __construct(PDO $pdo)
    {
        $this->signinModel = new Signin($pdo);
    }

    public function login()
    {
        $errors = [];
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->checkLoginAttempts()) {
                $errors[] = 'Trop de tentatives échouées. Essayez à nouveau plus tard.';
            } else {
                if (!CSRFToken::validate($_POST['csrf_token'] ?? '')) {
                    header('Location: /error/server-error');
                    die;
                }
    
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $passWord = $_POST['password'] ?? null;
                $role = $_POST['role'] ?? null;
        
                if ($email && $passWord) {
                    $user = $this->signinModel->login($email, $role);
        
                    if ($user && password_verify($passWord, $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['role'] = $user['role'];
                        unset($_SESSION['csrf_token']);
                        $this->resetLoginAttempts();
                        header('Location: /home/show');
                        exit;
                    } else {
                        $errors[] = 'Email ou mot de passe incorrect';
                    }
                }
            }

            $this->incrementLoginAttempts();
        } else {
            if (!isset($_SESSION['login_attempts'])) {
                $this->resetLoginAttempts();
            }
    
            if($this->checkLoginAttempts()) {
                $errors[] = 'Trop de tentatives échouées. Essayez à nouveau plus tard.';
            }
        }
    
        return [
            'page' => 'signin',
            'variables' => [
                'errors' => $errors,
            ]
        ];
    }
    
    private function incrementLoginAttempts()
    {
        $_SESSION['login_attempts']++;
        if ($_SESSION['login_attempts'] >= self::MAX_ATTEMPTS) {
            $_SESSION['lockout_time'] = time();
        }
    }

    private function checkLoginAttempts() : bool
    {
        if ($_SESSION['login_attempts'] >= self::MAX_ATTEMPTS) {
            if (time() - $_SESSION['lockout_time'] < 900) {
                return true;
            } else {
                $_SESSION['login_attempts'] = 0;
            }
        }

        return false;
    }

    private function resetLoginAttempts() : void
    {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
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

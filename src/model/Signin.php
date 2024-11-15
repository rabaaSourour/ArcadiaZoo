<?php

namespace App\Model;

use PDO;

class Signin
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($email, $role): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND role = :role");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':role', $role);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    
    public function getUserByRole($role): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE role = :role");
        $stmt->bindValue(':role', $role);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isAdmin(): bool
    {
        session_start();
        return isset($_SESSION['role']) && in_array($_SESSION['role'], ['admin', 'veterinaire', 'employe']);
    }

    public function logout(){

    session_start();
    session_destroy();
    return header('location: /home/show');
    exit();
    }

}
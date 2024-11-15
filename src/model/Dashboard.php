<?php

namespace App\Model;

class Dashboard
{
    private int $id;
    private string $role;

    // Constructeur pour initialiser les propriétés de l'utilisateur
    public function __construct(int $id, string $role)
    {
        $this->id = $id;
        $this->role = $role;
    }
    public static function isAdmin()
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    public static function isVeterinaire()
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'veterinaire';
    }

    public static function isEmploye()
    {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'employe';
    }

    // Méthode pour obtenir le rôle de l'utilisateur
    public function getRole(): string
    {
        return $this->role;
    }
}

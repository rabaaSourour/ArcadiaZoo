<?php

namespace App\Controller;

class DashboardController
{

    public function show(): array
    {
        $role = $_SESSION['role'] ?? '';

        if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['admin', 'veterinaire', 'employe'])) {
            header('Location: dashbord/show');
            exit();
        }

        return [
            'page' => 'dashboard',
            'variables' => [
                'role' => $role
            ]
        ];
    }
}

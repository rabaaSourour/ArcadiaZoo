<?php

namespace App\Controller;

class HomepageController
{
    public function home(): array
    {
        // Retourne le nom de la vue et les éventuelles données à passer
        return [
            'view' => 'homepage/home', // Spécifie la vue à charger (ici 'views/homepage/home.php')
        ];
    }
}

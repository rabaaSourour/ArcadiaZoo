<?php

namespace App\Controller;

class HomePageController
{
    public function home(): array
    {
        // Retourne le nom de la vue et les éventuelles données à passer
        return [
            'view' => 'pages/home', // Spécifie la vue à charger (ici 'views/page/home.php')
        ];
    }
}

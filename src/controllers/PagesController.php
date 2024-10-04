<?php

namespace App\Controllers;

class PagesController
{
    public function view(string $page)
    {
        $file = __DIR__ . "/../../pages/{$page}.php";
        if (file_exists($file)) {
            return [
                'view' => "pages/{$page}" // Spécifie la vue à charger
            ];
        } else {
            throw new \Exception("Page not found: {$page}");
        }
    }
}

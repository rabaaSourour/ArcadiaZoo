<?php

namespace App\Controller;

use PDO;

class PagesController
{
    public function __construct(PDO $pdo){
        if(session_status()=== PHP_SESSION_NONE){
            session_start();
        }
    }
    
    public function view(string $page) 
    {
        $file = __DIR__ . "/../../views/pages/{$page}.php";
        if (file_exists($file)) {
            return [
                'view' => "pages/{$page}" // Spécifie la vue à charger
            ];
        } else {
            throw new \Exception("Page not found: {$page}");
        }
    }
    
}

<?php

use App\Router;

require_once __DIR__.'/vendor/autoload.php';

session_start();

$error = null;

// Initialisation du routeur avec la méthode de requête et l'URI actuelle
$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

// Exécution de l'action appropriée en fonction de l'URI
try {
    $data = $router->doAction();
} catch (Exception $e) {
    // Gestion des erreurs si le contrôleur ou la méthode n'existent pas
    $error = $e->getMessage();
    $data = [
        'view' => 'error', // Vue d'erreur à afficher
        'message' => $error
    ];
}

// Définition du fichier de vue à charger
$page = 'views/' . $data['view'] . '.php';

require_once 'views/base_view.php';

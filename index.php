<?php

use App\Router;

require_once __DIR__.'/vendor/autoload.php';

session_start();

// Initialisation du routeur avec la méthode de requête et l'URI actuelle
$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

$controller = $router->getController();
$method = $router->getMethod();

if($controller !== null && method_exists($controller, $method)) {
    $data = $controller->{$method}();
}

$page = __DIR__ . "/views/pages/404.php";
if(isset($data)) {
    $file = __DIR__ . "/views/pages/{$data['page']}.php";
    if(file_exists($file)) {
        $page = $file;
        extract($data['variables']);
    }
}

require_once 'views/base_view.php';
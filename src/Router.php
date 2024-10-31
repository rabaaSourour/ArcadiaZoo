<?php

namespace App;

use App\Database\DbConnection;

class Router
{
    private ?object $controller = null;
    private ?string $method = null;

    public function __construct(private string $requestMethod, string $uri)
    {
        // Analyse l'URI pour déterminer le contrôleur et la méthode à appeler.
        $this->parseUri($uri);
    }

    // BUT :
    // Quand l'URI est '/service/addService' -> ServiceController->addService();
    // Quand l'URI est '/home/view' -> HomeController->view();
    // Quand l'URI est '/review/addReview' -> ReviewController->addReview();

    // Router appelle un controller
    // Controller utiliser le Modèle (Service.php par exemple) pour récupérer des données
    // Controller fait un include '../pages/addService.php';

    private function parseUri(string $uri): void
    {
        // Redirection vers la page d'accueil si l'URI est vide
        if ('/' === $uri) {
            $uri = 'pages/home';
        }

        $path = parse_url($uri, PHP_URL_PATH);

        $uriExplode = explode('/', $path);
        $controllerAlias = $uriExplode[1];
        $method = $uriExplode[2];

        $pdo = DbConnection::getPdo();

        // Création d'une instance du contrôleur
        $controllerName = 'App\\Controller\\' . ucfirst($controllerAlias) . 'Controller';

        if(class_exists($controllerName)) {
            $this->controller = new $controllerName($pdo);
            $this->method = $method;
        }
    }

    public function getController() : ?object
    {
        return $this->controller;
    }

    public function getMethod() : ?string
    {
        return $this->method;
    }

    /**
     * Assainit les données d'entrée pour éviter les injections
     * 
     * @param array $input Données à assainir
     * @return array Données assainies
     */

    private function sanitizeInput(array $input): array
    {
        // Utilisation de htmlspecialchars pour nettoyer chaque valeur de l'entrée
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $input;
    }
}

<?php

namespace App;

use App\Database\DbConnection;


class Router
{
    private string $controllerName = "App\\Controller\\";
    private string $page;
    private ?string $parameter = null;

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
        $controller = new $controllerName($pdo);
        $controller->{$method}();



        $uriLength = count($uriExplode);

        // Si le dernier élément de l'URI est un nombre, il devient un paramètre
        if (is_numeric($uriExplode[$uriLength - 1])) {
            $this->parameter = (int)array_pop($uriExplode);
        }

        // Détermination de la méthode à appeler
        $this->page = array_pop($uriExplode);
        $uriLength = count($uriExplode);
        $counter = 1;

        // Construction du nom complet du contrôleur
        foreach ($uriExplode as $uriPart) {
            if (!$uriPart) {
                continue;
            }

            $separator = '\\';
            if ($counter === $uriLength) {
                $separator = '';
            }

            // Capitalisation de chaque partie du chemin pour correspondre à la convention de nommage des classes
            $this->controllerName .= ucfirst($uriPart) . $separator;

            $counter++;
        }
    }


    public function doAction(): string
    {
        // Vérifie si le contrôleur existe
        if (!class_exists($this->controllerName)) {
            throw new \Exception("Controller not found: {$this->controllerName}");
        }

        // Création d'une instance du contrôleur
        $pdo = DbConnection::getPdo();
        $controller = new $this->$controllerName($pdo);


        // Vérifie si la méthode existe dans le contrôleur
        if (!method_exists($controller, $this->page)) {
            throw new \Exception("Method not found: {$this->page} in controller {$this->controllerName}");
        }

        // Gestion des requêtes POST avec validation des données
        //     if ($this->requestMethod == 'POST') {
        //         $postData = $this->sanitizeInput($_POST); // Assainir les données POST

        //         if (null !== $this->parameter) {
        //             $result = $controller->{$this->page}($this->parameter, $postData);
        //         } else {
        //             $result = $controller->{$this->page}($postData);
        //         }
        //     } else {
        //         // Gestion des requêtes GET
        //         if (null !== $this->parameter) {
        //             $result = $controller->{$this->page}($this->parameter);
        //         } else {
        //             $result = $controller->{$this->page}();
        //         }
        //     }


        //     return $result;
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

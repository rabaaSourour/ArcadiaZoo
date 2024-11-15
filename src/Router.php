<?php

namespace App;

use App\Controller\UserController;
use App\Database\DbConnection;

class Router
{
    private ?object $controller = null;
    private ?string $method = null;

    public function __construct(private string $requestMethod, string $uri)
    {
        $this->parseUri($uri);
    }

    private function parseUri(string $uri): void
    {
        if ('/' === $uri || '' === $uri) {
            $uri = '/home/show';
        }

        $path = parse_url($uri, PHP_URL_PATH);

        $uriExplode = explode('/', $path);
        $controllerAlias = $uriExplode[1];
        $method = $uriExplode[2];

        $pdo = DbConnection::getPdo();

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
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $input;
    }
}

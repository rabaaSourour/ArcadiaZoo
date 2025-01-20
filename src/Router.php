<?php

namespace App;

use App\Database\DbConnection;

class Router
{
    private ?object $controller = null;
    private ?string $method = null;
    private string $path;

    public function __construct(private string $requestMethod, string $uri)
    {
        $this->parseUri($uri);
    }

    public function parseUri(string $uri): void
    {
        if ('/' === $uri || '' === $uri) {
            $uri = '/home/show';
        }

        $this->path = parse_url($uri, PHP_URL_PATH);

        $uriExplode = explode('/', $this->path);
        $controllerAlias = $uriExplode[1];
        $method = $uriExplode[2];

        $pdo = DbConnection::getPdo();

        $controllerName = 'App\\Controller\\' . ucfirst($controllerAlias) . 'Controller';

        if(class_exists($controllerName)) {
            $this->controller = new $controllerName($pdo);
            $this->method = $method;
        }
    }

    public function getPath() : string
    {
        return $this->path;
    }

    public function getController() : ?object
    {
        return $this->controller;
    }

    public function getMethod() : ?string
    {
        return $this->method;
    }
    
}

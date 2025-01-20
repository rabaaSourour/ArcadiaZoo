<?php

declare(strict_types=1);

use App\Controller\HomeController;
use App\Router;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public static function pathProvider() : array
    {
        return [
            ['GET', '/', '/home/show'],
            ['GET', '/home/show', '/home/show'],
            ['GET', '/home/patate', '/home/patate'],
            ['POST', '/patate/home', '/patate/home'],
            ['GET', '/patate', '/patate']
        ];
    }

    #[DataProvider('pathProvider')]
    public function testPath(string $method, string $uri, string $expected) : void
    {
        $router = new Router($method, $uri);

        $path = $router->getPath();
        $this->assertSame($expected, $path);
    }

    public static function controllerProvider() : array
    {
        return [
            ['GET', '/', HomeController::class],
        ];
    }

    #[DataProvider('controllerProvider')]
    public function testController(string $method, string $uri, string $expected) : void
    {
        $router = new Router($method, $uri);

        $controller = $router->getController();
        $this->assertSame($controller::class, $expected);
    }
}

// ./vendor/bin/phpunit ./tests/RouterTest.php
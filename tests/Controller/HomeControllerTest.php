<?php

declare(strict_types=1);

use App\Controller\HomeController;
use App\Database\DbConnection;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    public function testMentionsLegals() : void
    {
        $pdo = DbConnection::getPdo();
        $controller = new HomeController($pdo);
        $array = $controller->mentionsLegals();

        $this->assertSame($array, ['page' => 'mentionsLegals', 'variables' => []]);
    }
}
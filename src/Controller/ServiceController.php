<?php

namespace App\Controller;

use PDO;

class ServiceController
{
    public function __construct(PDO $pdo)
    {
    
    }

    public function view() : array
    {
        return ['page' => 'service', 'variables' => []];
    }
}
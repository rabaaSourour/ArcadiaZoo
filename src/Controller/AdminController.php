<?php

namespace App\Controller;

use App\Model\Review;
use App\Model\Horaires;
use App\Model\Service;
use PDO;

class AdminController
{
    private readonly Review $reviewModel;
    private readonly Horaires $horairesModel;
    private readonly service $serviceModel;

    public function __construct(PDO $pdo)
    {

        
    }
}


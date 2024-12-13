<?php

namespace App\Database;

use App\Model\AnimalConsultation;
use MongoDB\Client;

class MongoDbConnection
{
    private $client;
    private $database;

    public function __construct()
    {
        $config = require 'C:/xampp/htdocs/ArcadiaZoo/Config.php';

        try {
            $this->client = new Client($config['URI']);
            $this->database = $this->client->selectDatabase('Arcadia');
        } catch (\Exception $e) {
            die("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }

    public function getCollection()
    {
        return $this->database->selectCollection("animalConsultation");
    }
}

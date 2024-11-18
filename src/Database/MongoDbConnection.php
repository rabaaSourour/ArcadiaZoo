<?php

namespace App\Database;

use MongoDB\Client;

class MongoDbConnection
{
    private $client;
    private $database;

    public function __construct()
    {
        try {
            $this->client = new Client("mongodb://localhost:27017");
            $this->database = $this->client->Arcadia;
        } catch (\Exception $e) {
            die("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }

    public function getCollection(string $collectionName)
    {
        return $this->database->$collectionName;
    }
}

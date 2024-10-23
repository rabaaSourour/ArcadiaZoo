<?php

namespace App\Database;

use PDO;
use PDOException;

class DbConnection
{
    // définition de notre variable qui stockera notre PDO
    static ?PDO $pdo = null;


    public static function getPdo(): PDO
    {
        // si pdo existe et a déjà été rempli avec le new PDO on le retourne directement pour éviter
        // d'enregistrer x pdo et ouvrir x connexion à notre bdd
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        // Charger la configuration
        $config = require 'Config.php';

        try {
            // Créer la connexion PDO avec les valeurs du fichier de configuration
            $dsn = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'] . ';port=' . $config['DB_PORT'];
            // ici seulement si self::pdo n'est pas défini on ouvre notre connexion à la base
            self::$pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        // et on retourne la valeur
        return self::$pdo;
    }

    // Méthode pour protéger les données avant l'insertion ou l'affichage
    public static function protectDbData($value)
    {
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $value = strip_tags($value);
        return $value;
    }
}

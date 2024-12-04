<?php

namespace App\Database;

use PDO;
use PDOException;

class DbConnection
{
    static ?PDO $pdo = null;


    public static function getPdo(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $config = require 'C:/xampp/htdocs/ArcadiaZoo/Config.php';

        try {
                $dsn = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'] . ';port=' . $config['DB_PORT'];
                self::$pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }

        return self::$pdo;
    }

    public static function protectDbData($value)
    {
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $value = strip_tags($value);
        return $value;
    }
}

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

        $config = require 'C:/xampp/htdocs/ArcadiaZoo/src/Config.php';

        try {
                $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . ';port=' . $config['port'];
                self::$pdo = new PDO($dsn, $config['user'], $config['password']);
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

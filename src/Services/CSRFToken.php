<?php

namespace App\Services;

class CSRFToken
{
    public static function init(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public static function getToken(): string
    {
        self::init();
        return $_SESSION['csrf_token'];
    }

    public static function validate(string $token): bool
    {
        self::init();
        return isset($token) && $token === $_SESSION['csrf_token'];
    }
}

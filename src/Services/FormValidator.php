<?php

namespace App\Services;

class FormValidator
{
    public static function isValidId(mixed $id) : bool
    {
        return (is_numeric($id) && (int) $id > 0);
    }

    public static function isValidHoraire(mixed $horaire) : bool
    {
        return is_string($horaire) && preg_match('/[0-9]{2}:[0-9]{2}/', $horaire) === 1;
    }
}
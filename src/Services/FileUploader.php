<?php

namespace App\Services;

use Exception;

class FileUploader
{
    private static string $uploadedFilePath;
    
    public static function upload(array $file) : void
    {
        $targetDir = __DIR__ . '/../../public/asset/uploaded_images/';
        $imagePath = $targetDir . basename($file['name']);
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/gif'];
        if (in_array($file['type'], $allowedTypes)) {
            if (!move_uploaded_file($file['tmp_name'], $imagePath)) {
                throw new Exception ("Erreur lors du téléchargement de l'image.");
                exit();
            }
        } else {
            throw new Exception ("Type de fichier non autorisé.");
            exit();
        }

        self::$uploadedFilePath = '/public/asset/uploaded_images/' . basename($file['name']);
    }

    public static function getUploadedFilePath() : string
    {
        return self::$uploadedFilePath;
    }
}
<?php

namespace App\Model;

use PDO;
use Exception;

class User
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    // Récupérer tous les animals
    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un user par son ID
    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    // Mettre à jour un user
    public function updateUser($userId, $hashedPassword)
    {
        try {

            $sql = 'UPDATE users SET password = :password WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de la mise à jour du l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // Ajouter un user
    public function addUser(string $email, string $passWord, string $role)
    {
        try {
            // Hachage du mot de passe avant l'insertion
            $hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO Users (users.email, users.password, users.role) VALUES (:email, :password,  :role)");
            $stmt->execute(['email' => $email, 'password' => $hashedPassword, 'role' => $role]);
            return $this->pdo->lastInsertId();
            
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un user
    public function deleteUser($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (Exception $e) {
            // Gérer l'erreur ici
            echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
            return false;
        }
    }
}

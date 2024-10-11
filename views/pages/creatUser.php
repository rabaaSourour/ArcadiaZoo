<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../back/login.php');
    exit;
}
?>
<div class="container text-bg-secondary rounded mt-5">
    <h1 class="text-center pt-3">Créer un compte utilisateur</h1>
    <form action="../back/create_user.php" method="post">
        <div class="form-group">
            <label for="email">Courriel</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="role">Rôle</label>
            <select class="form-control" id="role" name="role" required>
                <option value="employe">Employé</option>
                <option value="veterinaire">Vétérinaire</option>
            </select>
        </div>
        <div class="text-center p-4">
        <button type="submit" class="btn btn-primary mt-3">Créer le compte</button>
        </div>
    <div class="text-center">
    </form>
    <a href="../back/logout.php" class="btn btn-primary mb-3">Déconnexion</a>
    </div>
</div>
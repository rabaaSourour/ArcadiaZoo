<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<div class="container text-bg-secondary rounded mt-5">
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        <div class="mb-3 pt-3">
            <select class="form-select" id="role" name="role" required>
                <option selected>Connectez-vous en tant que</option>
                <option value="admin">Admin</option>
                <option value="veterinaire">Vétérinaire</option>
                <option value="employe">Employé(e)</option>
            </select>
            <div class="invalid-feedback">
                Veuillez sélectionner un rôle.
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" placeholder="test@mail.fr" name="email" required>
            <div class="invalid-feedback">
                Veuillez entrer une adresse email valide.
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">
                Veuillez entrer votre mot de passe.
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3 mb-3" id="btn-validation-connexion">Connexion</button>
        </div>
        <div id="error-message" style="display: none; color: red;"></div>
    </form>

    <div class="text-center pb-3">
        <a href="/user/update">Mot de passe oublié ? Changer le mot de passe par ici !</a>
    </div>
</div>

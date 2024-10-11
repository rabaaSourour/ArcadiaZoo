<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<div class="container text-bg-secondary rounded mt-5">
    <form>
        <div class="mb-3 pt-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>Connectez-vous en tant que</option>
                <option value="1">Administrateur</option>
                <option value="2">Vétérinaire</option>
                <option value="3">Employé</option>
            </select>
            <div class="invalid-feedback" id="role">
                Veuillez sélectionner un rôle.
            </div>
        </div>

        <div class="mb-3">
            <label for="EmailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="test@mail.fr" name="Email">
            <div class="invalid-feedback" id="emailFeedback">
                Veuillez entrer une adresse email valide.
            </div>
        </div>

        <div class="mb-3">
            <label for="PasswordInput" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password">
            <div class="invalid-feedback" id="passwordFeedback">
                Veuillez entrer votre mot de passe.
            </div>


        </div>

        <div class="text-center">
            <button type="button" class="btn btn-primary mt-3 mb-3" id="btn-validation-connexion">Connexion</button>
        </div>
        <div id="error-message" style="display: none; color: red;"></div>
    </form>

    <div class="text-center pb-3">
        <a href="/ArcadiaZoo/views/Pages/myAccount.php">Mot de passe oublié ? Changer le mot de passe par ici !</a>
    </div>
</div>
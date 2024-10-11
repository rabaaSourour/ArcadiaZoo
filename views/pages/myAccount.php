<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<h1 class="text-center text-dark p-4">Changer le mot de passe </h1>

<div class="container text-bg-secondary rounded p-4">
    <form id="accountForm">
        <div class="mb-3">
            <label for="NomInput" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="NomInput" placeholder="Votre nom" name="Nom">
            <div class="invalid-feedback">
                Veuillez entrer votre pseudo.
            </div>
        </div>

        <div class="mb-3">
            <label for="OldPasswordInput" class="form-label">Ancien mot de passe</label>
            <input type="password" class="form-control" id="OldPasswordInput" name="Password">
            <div class="invalid-feedback">
                Veuillez entrer votre ancien mot de passe.
            </div>
        </div>

        <div class="mb-3">
            <label for="PasswordInput" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="PasswordInput" name="Password">
            <div class="invalid-feedback">
                Votre mot de passe doit comporter au moins 12 caractères<br>
                Utilisez une combinaison de lettres majuscules et minuscules,
                de chiffres et de caractères spéciaux (par exemple, !, @, #, $).
            </div>
            <div class="valid-feedback">
                le mot de passe est Validez
            </div>
        </div>

        <div class="mb-3">
            <label for="ValidatePasswordInput" class="form-label">Validez votre mot de passe</label>
            <input type="password" class="form-control" id="ValidatePasswordInput" name="PasswordConfirm">
            <div class="invalid-feedback">
                la confirmation n'est pas identique au mot de passe
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3" id="btn-validation-modification">Modifier</button>
        </div>
    </form>

    <div class="text-center pt-3">
        <a href="/ArcadiaZoo/views/Pages/signin.html">Connectez-vous ici !</a>
    </div>
</div>
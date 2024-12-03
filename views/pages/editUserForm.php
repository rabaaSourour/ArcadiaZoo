<div class="container text-bg-secondary rounded mt-5">
    <h1 class="text-center bg-primary rounded p-3">Changer le mot de passe</h1>
    <?php if (isset($user)) : ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Votre email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
                <div class="invalid-feedback">
                    Veuillez entrer votre adresse email.
                </div>
            </div>

            <div class="mb-3">
                <label for="OldPassword" class="form-label">Ancien mot de passe</label>
                <input type="password" class="form-control" id="OldPassword" name="OldPassword" required>
                <div class="invalid-feedback">
                    Veuillez entrer votre ancien mot de passe.
                </div>
            </div>

            <div class="mb-3">
                <label for="PasswordInput" class="form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="PasswordInput" name="Password" minlength="12" required>
                <div class="invalid-feedback">
                    Votre mot de passe doit comporter au moins 12 caractères et inclure des lettres majuscules et minuscules, des chiffres et des caractères spéciaux.
                </div>
                <div class="valid-feedback">
                    Mot de passe valide.
                </div>
            </div>

            <div class="mb-3">
                <label for="ValidatePasswordInput" class="form-label">Confirmez votre nouveau mot de passe</label>
                <input type="password" class="form-control" id="ValidatePasswordInput" name="PasswordConfirm" required>
                <div class="invalid-feedback">
                    La confirmation ne correspond pas au mot de passe.
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3" id="btn-validation-modification">Modifier</button>
            </div>
        </form>

        <div class="text-center pt-3">
            <a href="/signin">Retour à la connexion</a>
        </div>
    <?php else : ?>
        <p class="text-center text-danger">Utilisateur non trouvé.</p>
    <?php endif; ?>
</div>
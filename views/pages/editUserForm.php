<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 text-center">
                    <h2 class="text-secondary p-3">Changer le mot de passe</h2>
                </div>
                <div class="col-lg-12 login-form">
                    <?php if (isset($user)) : ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(App\Services\CSRFToken::getToken(), ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">

                            <div class="text-primary mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Votre email"
                                    value="<?= htmlspecialchars($user['email'] ?? ''); ?>" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer votre adresse email.
                                </div>
                            </div>

                            <div class="text-primary mb-3">
                                <label for="OldPassword" class="form-label">Ancien mot de passe</label>
                                <input type="password" class="form-control" id="OldPassword" name="OldPassword" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer votre ancien mot de passe.
                                </div>
                            </div>

                            <div class="text-primary mb-3">
                                <label for="PasswordInput" class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="PasswordInput" name="Password" minlength="12" required>
                                <div class="invalid-feedback">
                                    Votre mot de passe doit comporter au moins 12 caractères, incluant lettres, chiffres et caractères spéciaux.
                                </div>
                            </div>

                            <div class="text-primary mb-3">
                                <label for="ValidatePasswordInput" class="form-label">Confirmez votre nouveau mot de passe</label>
                                <input type="password" class="form-control" id="ValidatePasswordInput" name="PasswordConfirm" required>
                                <div class="invalid-feedback">
                                    La confirmation ne correspond pas au mot de passe.
                                </div>
                            </div>

                            <div class="text-center p-3">
                                <button type="submit" class="btn" id="btn-validation-modification">Modifier</button>
                            </div>
                        </form>

                        <div class="col-lg-12 text-center pb-3">
                            <a class="text-primary" href="/signin">Retour à la connexion</a>
                        </div>
                    <?php else : ?>
                        <p class="text-center text-danger">Utilisateur non trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
</section>
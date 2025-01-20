<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 text-center">
                    <h2 class="text-secondary p-3">Connexion</h2>
                </div>
                <div class="col-lg-12 login-form">
                    <div class="errors">
                        <?php foreach($errors as $error) : ?>
                            <p class="color-danger"><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(App\Services\CSRFToken::getToken(), ENT_QUOTES, 'UTF-8') ?>">
                        <div class="text-primary mb-3">
                            <label for="role" class="form-label">Connectez-vous en tant que :</label>
                            <select class="form-select text-primary" id="role" name="role" required>
                                <option selected></option>
                                <option value="admin">Admin</option>
                                <option value="veterinaire">Vétérinaire</option>
                                <option value="employe">Employé(e)</option>
                            </select>
                            <div class="invalid-feedback">
                                Veuillez sélectionner un rôle.
                            </div>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" id="email" placeholder="test@mail.fr" name="email" required>
                            <div class="invalid-feedback">
                                Veuillez entrer une adresse email valide.
                            </div>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Veuillez entrer votre mot de passe.
                            </div>
                        </div>

                        <div class="text-center p-3">
                            <button type="submit" class="btn" id="btn-validation-connexion">Connexion</button>
                        </div>

                        <div id="error-message" style="display: none; color: red;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>
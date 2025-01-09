<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h1 class="text-center">Créer un compte utilisateur</h1>
                </div>
                <div class="col-lg-12">
                    <?php if (!empty($message)): ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role">Rôle</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="employe">Employé(e)</option>
                                <option value="veterinaire">Vétérinaire</option>
                            </select>
                        </div>
                        <div class="text-center pb-4">
                            <button type="submit" class="btn btn-primary mt-3">Créer le compte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
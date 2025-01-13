<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h2 class="text-secondary p-3">Créer un compte utilisateur</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (!empty($message)): ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="text-primary mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="role">Rôle</label>
                            <select class="form-control text-primary" id="role" name="role" required>
                                <option value="employe">Employé(e)</option>
                                <option value="veterinaire">Vétérinaire</option>
                            </select>
                        </div>
                        <div class="text-center p-3">
                            <button type="submit" class="btn">Créer le compte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
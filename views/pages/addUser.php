<div class="container text-bg-secondary rounded mt-5">
    <h1 class="text-center bg-primary pb-3 pt-3">Créer un compte utilisateur</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Email</label>
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
    </form>
</div>
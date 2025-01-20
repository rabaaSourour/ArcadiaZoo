<section class="container py-4">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="text-secondary p-4">Tous les utilisateurs !</h2>
        </div>
    </div>

    <div class="row">
        <?php foreach ($users as $user): ?>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100 p-3">
                    <div class="card-body">
                        <h4 class="card-title"><strong>Role :</strong> <?= nl2br(htmlspecialchars($user['role'])) ?></h4>
                        <p class="card-text"><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
                    </div>
                    <div>
                        <?php if ($role === 'admin'): ?>
                            <input type="hidden" id="csrf_token" value="<?= htmlspecialchars(App\Services\CSRFToken::getToken(), ENT_QUOTES, 'UTF-8') ?>">
                            <button class="btn btn-warning" onclick="window.location.href='/user/update?id=<?= $user['id'] ?>'">Modifier</button>
                            <button class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)">Supprimer</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center p-4">
        <?php if ($role === 'admin'): ?>
            <button class="btn btn-primary" onclick="window.location.href='/user/new'">Ajouter un nouvel utilisateur</button>
        <?php endif; ?>
    </div>
</section>

<script src="/public/js/user.js"></script>

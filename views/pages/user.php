<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h1 class="text-center">Tous les utilisateurs !</h1>
                </div>
                <div class="col-lg-12">
                    <?php foreach ($users as $user): ?>
                        <div class="card rounded my-3">
                            <div class="card-body">
                                <h4 class="card-text"><strong>Role :</strong> <?= nl2br(htmlspecialchars($user['role'])) ?></h4>
                                <p class="card-text"><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
                            </div>
                            <div>
                                <?php if ($role === 'admin'): ?>
                                    <button class="btn btn-warning" onclick="window.location.href='/user/update?id=<?= $user['id'] ?>'">Modifier</button>
                                    <button class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)">Supprimer</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="text-center mt-4">
                        <?php if ($role === 'admin'): ?>
                            <button class="btn btn-primary" onclick="window.location.href='/user/new'">Ajouter un nouvel utilisateur</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/public/js/user.js"></script>
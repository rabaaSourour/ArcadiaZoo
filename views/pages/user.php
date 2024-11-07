<?php //session_start()?>
<section class="container rounded mt-4"> 
    <div class="container rounded">
        <h1 class="text-center">Tous les utilisateurs !</h1>

        <?php foreach ($users as $user): ?>
            <div class="card rounded my-3">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($user['email']) ?></h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($user['role'])) ?></p>
                </div>
                <div>
                    <?php //if ($isAdmin): ?>
                        <button class="btn btn-warning" onclick="window.location.href='/user/update?id=<?= $user['id'] ?>'">Modifier</button>
                        <button class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)">Supprimer</button>
                    <?php //endif; ?>
        <?php endforeach; ?>
        <?php //if ($isAdmin): ?>
            <button class="btn btn-primary" onclick="window.location.href='/user/new'">Ajouter un nouvel utilisateur</button>
        <?php //endif; ?>
    </div>
            </div>
    </div>
</section>

<script src="/public/js/user.js"></script>
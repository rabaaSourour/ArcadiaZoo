<?php //session_start()?>
<section class="container rounded mt-4"> 
    <h1 class="text-center bg-primary">Tous les utilisateurs !</h1>

    <?php foreach ($users as $user): ?>
        <div class="card rounded my-3">
            <div class="card-body">
                <h4 class="card-text"><strong>Role :</strong> <?= nl2br(htmlspecialchars($user['role'])) ?></h4>
                <p class="card-text"><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
            </div>
            <div>
                <?php // if ($isAdmin): ?>
                    <button class="btn btn-warning" onclick="window.location.href='/user/update?id=<?= $user['id'] ?>'">Modifier</button>
                    <button class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)">Supprimer</button>
                <?php // endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    
    <div class="text-center mt-4">
        <?php // if ($isAdmin): ?>
            <button class="btn btn-primary" onclick="window.location.href='/user/new'">Ajouter un nouvel utilisateur</button>
        <?php // endif; ?>
    </div>
</section>

<script src="/public/js/user.js"></script>

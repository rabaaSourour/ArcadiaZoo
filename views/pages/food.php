<section class="container p-4">
    <!-- Les habitats -->
    <div class="container text-center">
        <h2 class="text-secondary pt-3 pb-3">Les animaux ont mangé quoi aujourd'hui !</h2>

        <div class="row">
            <?php foreach ($foods as $food): ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card rounded my-3">
                        <div class="card-body">
                            <?php 
                            foreach ($animals as $animal) {
                                if ($animal['id'] == $food['animals_id']): ?>
                                    <h5 class="card-title"><?= htmlspecialchars($animal['name']) ?> :</h5>

                                    <?php if (!empty($food['food']) && !empty($food['quantity'])): ?>
                                        <p class="card-text"><strong>Nourriture :</strong> <?= nl2br(htmlspecialchars($food['food'])) ?></p>
                                        <p class="card-text"><strong>Quantité :</strong> <?= nl2br(htmlspecialchars($food['quantity'])) ?></p>
                                    <?php else: ?>
                                        <p class="card-text text-muted">L'animal n'a pas encore été nourri !</p>
                                    <?php endif; ?>

                                <?php break; endif; ?>
                            <?php } ?>
                        </div>
                        <div>
                            <?php if ($role === 'employe'): ?>
                                <input type="hidden" id="csrf_token" value="<?= htmlspecialchars(App\Services\CSRFToken::getToken(), ENT_QUOTES, 'UTF-8') ?>">
                                <button class="btn btn-warning" onclick="window.location.href='/food/update?id=<?= $food['id'] ?>'">Modifier</button>
                                <button class="btn btn-danger" onclick="deleteFood(<?= $food['id'] ?>)">Supprimer</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="/public/js/food.js"></script>

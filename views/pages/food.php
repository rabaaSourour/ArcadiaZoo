<section class="container rounded mt-4"> 
    <!-- Les habitats -->
    <div class="container rounded">
        <h1 class="text-center bg-primary rounded pt-3 pb-3">Les animaux ont mangé quoi aujourd'hui !</h1>

        <?php foreach ($foods as $food): ?>
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

                        <?php break; endif; // Si l'animal correspondant est trouvé, on arrête la recherche ?>
                    <?php } ?>
                </div>
                <div>

                    <?php //if ($isAdmin): ?>
                        <button class="btn btn-warning" onclick="window.location.href='/food/update?id=<?= $food['id'] ?>'">Modifier</button>
                        <button class="btn btn-danger" onclick="deleteFood(<?= $food['id'] ?>)">Supprimer</button>
                    <?php //endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script src="/public/js/food.js"></script>
<div class="container rounded mt-5">
    <h2 class="text-center text-bg-primary rounded mb-5">Avis en attente de validation</h2>
    <div id="message" style="display:none;"></div> <!-- Ajout du conteneur pour le message -->

    <?php if (!empty($pendingReviews)): ?>
        <div id="comments">
            <?php foreach ($pendingReviews as $review): ?>
                <div class="card review mb-3 pt-3">
                    <input type="hidden" class="review-id" value="<?= $review['id'] ?>">
                    <h4 class="card-title"><?= htmlspecialchars($review['pseudo']. ' :') ?></h4>
                    <p class="card-text"><?= htmlspecialchars($review['review']) ?></p>
                    <button class="btn btn-success validate-btn" data-review-id="<?= $review['id'] ?>">Valider</button>
                    <button class="btn btn-danger delete-btn mb-3" data-review-id="<?= $review['id'] ?>">Supprimer</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            Aucun nouvel avis en attente de validation.
        </div>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/public/js/review.js"></script>

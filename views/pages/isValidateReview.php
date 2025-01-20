<section class="container py-4">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="text-primary mb-4">Avis en attente de validation</h2>
        </div>
    </div>

    <div class="reviews row">
        <?php if (!empty($pendingReviews)): ?>
            <?php foreach ($pendingReviews as $review): ?>
                <div class="review col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 p-3">
                        <input type="hidden" class="review-id" value="<?= $review['id'] ?>">
                        <h4 class="card-title"><?= htmlspecialchars($review['pseudo'] . ' :') ?></h4>
                        <p class="card-text"><?= htmlspecialchars($review['review']) ?></p>
                        <input type="hidden" id="csrf_token" value="<?= htmlspecialchars(App\Services\CSRFToken::getToken(), ENT_QUOTES, 'UTF-8') ?>">
                        <button class="btn btn-success validate-btn" data-review-id="<?= $review['id'] ?>">Valider</button>
                        <button class="btn btn-danger delete-btn mt-2" data-review-id="<?= $review['id'] ?>">Supprimer</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Aucun nouvel avis en attente de validation.
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<script src="/public/js/review.js"></script>
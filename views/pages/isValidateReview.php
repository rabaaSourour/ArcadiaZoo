<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h2 class="text-center">Avis en attente de validation</h2>
                </div>
                <div class="col-lg-12">
                    <div id="message" style="display:none;"></div> <!-- Ajout du conteneur pour le message -->

                    <?php if (!empty($pendingReviews)): ?>
                        <div id="comments">
                            <?php foreach ($pendingReviews as $review): ?>
                                <div class="card review mb-3 pt-3">
                                    <input type="hidden" class="review-id" value="<?= $review['id'] ?>">
                                    <h4 class="card-title"><?= htmlspecialchars($review['pseudo'] . ' :') ?></h4>
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
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/public/js/review.js"></script>
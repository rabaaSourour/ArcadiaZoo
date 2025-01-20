<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h2 class="text-secondary p-3">Laissez un avis</h2>
                </div>
                <form method="post" action="/review/addReview">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(App\Services\CSRFToken::getToken(), ENT_QUOTES, 'UTF-8') ?>">
                    <div class="text-primary mb-3 pt-3">
                        <label for="PseudoInput" class="form-label">Pseudo</label>
                        <input type="text" name="pseudo" class="form-control" id="PseudoInput" required>
                    </div>
                    <div class="text-primary mb-3">
                        <label for="commentText" class="form-label">Commentaire</label>
                        <textarea type="text" name="review" class="form-control" id="commentText" rows="3" required></textarea>
                    </div>
                    <div class="text-center pb-3">
                        <button type="submit" class="btn">Envoyer</button>
                    </div>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo "<div class='alert alert-success'>Merci pour votre avis, il sera examiné avant publication.</div>";
                }
                ?>

            </div>
        </div>
    </div>
</section>
<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h2 class="text-secondary p-3">Modifier la nouriture</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (isset($food)) : ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(App\Services\CSRFToken::getToken(), ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="animals_id" value="<?= htmlspecialchars($food['animals_id']); ?>">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($food['id']); ?>">
                            <div class="text-primary mb-3">
                                <label for="food" class="form-label fw-bold">Nourriture :</label>
                                <textarea type="text" class="form-control" name="food" id="food" rows="2" required><?php echo htmlspecialchars($food['food']); ?></textarea>
                            </div>

                            <div class="text-primary mb-3">
                                <label for="quantity" class="form-label fw-bold">Quantité de la nourriture :</label>
                                <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo htmlspecialchars($food['quantity']); ?>" required>
                            </div>
                            
                            <div class="text-center p-3">
                                <button type="submit" class="btn">Enregistrer les modifications</button>
                            </div>
                        </form>

                    <?php else : ?>
                        <div class="alert alert-warning text-center mt-4" role="alert">
                            Aucun rapport trouvé pour modification.
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
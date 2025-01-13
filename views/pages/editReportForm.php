<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h2 class="text-secondary p-3">Modifier le Rapport</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (isset($report)) : ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($report['id']); ?>">
                            <div class="text-primary mb-3">
                                <label for="status" class="form-label fw-bold">Statut :</label>
                                <input type="text" class="form-control" name="status" id="status" value="<?php echo htmlspecialchars($report['status']); ?>" required>
                            </div>
                            <div class="text-primary mb-3">
                                <label for="food" class="form-label fw-bold">Nourriture :</label>
                                <textarea type="text" class="form-control" name="food" id="food" rows="2" required><?php echo htmlspecialchars($report['food']); ?></textarea>
                            </div>
                            <div class="text-primary mb-3">
                                <label for="food_quantity" class="form-label fw-bold">Quantité de la nourriture :</label>
                                <input type="text" class="form-control" name="food_quantity" id="food_quantity" value="<?php echo htmlspecialchars($report['food_quantity']); ?>" required>
                            </div>
                            <div class="text-primary mb-4">
                                <label for="details" class="form-label fw-bold">Détails :</label>
                                <textarea type="text" class="form-control" name="details" id="details" rows="3" required><?php echo htmlspecialchars($report['details']); ?></textarea>
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
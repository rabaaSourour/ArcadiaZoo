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
                    <h2 class="text-secondary p-3">Ajouter un Nouveau Rapport</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (!empty($message)): ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="text-primary mb-3">
                            <label for="animals_id" class="form-label">Animal</label>
                            <select class="form-control text-primary" id="animals_id" name="animals_id" required>
                                <option value="">Sélectionnez un animal</option>
                                <?php foreach ($animals as $animal): ?>
                                    <option value="<?php echo htmlspecialchars($animal['id']); ?>">
                                        <?php echo htmlspecialchars($animal['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="food" class="form-label">Nourriture</label>
                            <textarea type="text" class="form-control" id="food" name="food" rows="4" required></textarea>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="food_quantity" class="form-label">Quantité de la nourriture</label>
                            <textarea type="text" class="form-control" id="food_quantity" name="food_quantity" rows="4" required></textarea>

                        </div>
                        <div class="text-primary mb-3">
                            <label for="details" class="form-label">Détails</label>
                            <textarea type="text" class="form-control" id="details" name="details" rows="4" required></textarea>
                        </div>
                        <div class="text-center p-3">
                            <button type="submit" class="btn">Ajouter le rapport</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
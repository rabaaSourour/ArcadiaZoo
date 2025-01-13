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
                    <h2 class="text-secondary p-3">Modifier le Service</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (isset($service)) : ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($service['id']); ?>">
                            <div class="text-primary mb-3">
                                <label for="name" class="form-label fw-bold">Nom du service :</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($service['name']); ?>" required>
                            </div>
                            <div class="text-primary mb-3">
                                <label for="description" class="form-label fw-bold">Description :</label>
                                <textarea type="text" class="form-control" name="description" id="description" rows="4" required><?php echo htmlspecialchars($service['description']); ?></textarea>
                            </div>
                            <div class="text-primary mb-3">
                                <label for="image" class="form-label fw-bold">Image actuelle :</label>
                                <div class="d-flex align-items-center">
                                    <img src="/asset/uploaded_images/<?php echo htmlspecialchars($service['image']); ?>" alt="Image du service" class="img-thumbnail me-3" style="width: 150px;">
                                    <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($service['image']); ?>">
                                </div>
                            </div>
                            <div class="text-primary mb-4">
                                <label for="image" class="form-label fw-bold">Nouvelle image (facultatif) :</label>
                                <input type="file" class="form-control text-primary" name="image" id="image">
                            </div>
                            <div class="text-center p-3">
                                <button type="submit" class="btn">Enregistrer les modifications</button>
                            </div>
                        </form>
                    <?php else : ?>
                        <div class="alert alert-warning text-center mt-4" role="alert">
                            Aucun service trouvé pour modification.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
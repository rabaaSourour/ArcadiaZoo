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
                    <h2 class="text-secondary p-3">Ajouter un Nouveau habitat</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (!empty($message)): ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="text-primary mb-3">
                            <label for="title" class="form-label">Titre du habitat</label>
                            <input type="text" class="form-control" id="title" name="name" required>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="habitatDescription" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="habitatDescription" name="description" rows="4" required></textarea>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="habitatImage" class="form-label">Image du habitat</label>
                            <input type="file" class="form-control text-primary" id="habitatImage" name="image" accept="image/*" required>
                        </div>
                        <div class="text-center p-3">
                            <button type="submit" class="btn">Ajouter le habitat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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
                    <h2 class="text-secondary p-3">Ajouter un Nouveau animal</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (!empty($message)): ?>
                        <p><?php echo $message; ?></p>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="text-primary mb-3">
                            <label for="title" class="form-label">Titre du animal</label>
                            <input type="text" class="form-control" id="title" name="name" required>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="animalBreed" class="form-label">Race</label>
                            <textarea type="text" class="form-control" id="animalBreed" name="breed" rows="4" required></textarea>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="animalHabitat_id" class="form-label">Habitat</label>
                            <select class="form-select text-primary" id="animalHabitat_id" name="habitat_id" required>
                                <?php foreach($habitats as $habitat) : ?>
                                    <option value="<?= $habitat['id'] ?>"><?= $habitat['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="text-primary mb-3">
                            <label for="animalImage" class="form-label">Image du animal</label>
                            <input type="file" class="form-control text-primary" id="animalImage" name="image" accept="image/*" required>
                        </div>
                        <div class="text-center p-3">
                            <button type="submit" class="btn">Ajouter l'animal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

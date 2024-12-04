<div class="container rounded mt-5">
    <h1 class="text-center text-bg-primary rounded">Modifier le animal</h1>
    <?php if (isset($animal)) : ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id']); ?>">
            <div class="form-group mb-3">
                <label for="name" class="form-label fw-bold">Nom de l'animal :</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($animal['name']); ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="breed" class="form-label fw-bold">Race :</label>
                <textarea type="text" class="form-control" name="breed" id="breed" rows="2" required><?php echo htmlspecialchars($animal['breed']); ?></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="image" class="form-label fw-bold">Image actuelle :</label>
                <div class="d-flex align-items-center">
                    <img src="/asset/uploaded_images/<?php echo htmlspecialchars($animal['image']); ?>" alt="Image de l'animal" class="img-thumbnail me-3" style="width: 150px;">
                    <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($animal['image']); ?>">
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="image" class="form-label fw-bold">Nouvelle image (facultatif) :</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Enregistrer les modifications</button>
            </div>
        </form>
    <?php else : ?>
        <div class="alert alert-warning text-center mt-4" role="alert">
            Aucun animal trouvé pour modification.
        </div>
    <?php endif; ?>
</div>
<div class="container rounded mt-5">
    <h2>Ajouter un Nouveau habitat</h2>

    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Titre du habitat</label>
            <input type="text" class="form-control" id="title" name="name" required>
        </div>
        <div class="mb-3">
            <label for="habitatDescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="habitatDescription" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="habitatImage" class="form-label">Image du habitat</label>
            <input type="file" class="form-control" id="habitatImage" name="image" accept="image/*" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter le habitat</button>
        </div>
    </form>
</div>
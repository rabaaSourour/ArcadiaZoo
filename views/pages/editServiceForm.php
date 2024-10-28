<div class="container rounded mt-5">
    <h1 class="text-center text-bg-primary rounded">Modifier le Service</h1>
    <?php if (isset($service)) : ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($service['id']); ?>">

            <label for="name">Nom du service :</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($service['name']); ?>" required>

            <label for="description">Description :</label>
            <textarea name="description" id="description" required><?php echo htmlspecialchars($service['description']); ?></textarea>

            <label for="image">Image actuelle :</label>
            <img src="/asset/uploaded_images/<?php echo htmlspecialchars($service['image']); ?>" alt="Image du service" style="width: 150px;">
            <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($service['image']); ?>">

            <label for="image">Nouvelle image (facultatif) :</label>
            <input type="file" name="image" id="image">

            <button type="submit">Enregistrer les modifications</button>
        </form>
    <?php else : ?>
        <p>Aucun service trouvé pour modification.</p>
    <?php endif; ?>
</div>
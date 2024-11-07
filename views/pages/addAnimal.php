<div class="container rounded mt-5">
    <h2>Ajouter un Nouveau animal</h2>

    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Titre du animal</label>
            <input type="text" class="form-control" id="title" name="name" required>
        </div>
        <div class="mb-3">
            <label for="animalBreed" class="form-label">Race</label>
            <textarea class="form-control" id="animalBreed" name="breed" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="animalHabitat_id" class="form-label">Habitat</label>
            <select class="form-select" id="animalHabitat_id" name="habitat_id" required>
            <?php foreach($habitats as $habitat) : ?>
                    <option value="<?= $habitat['id'] ?>"><?= $habitat['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="animalImage" class="form-label">Image du animal</label>
            <input type="file" class="form-control" id="animalImage" name="image" accept="image/*" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter l'animal</button>
        </div>
    </form>
</div>
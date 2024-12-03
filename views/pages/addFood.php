<div class="container rounded mt-5">
    <h2>Ajouter la nourriture donner a l'animal</h2>

    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="animals_id" class="form-label">Animal</label>
            <select class="form-control" id="animals_id" name="animals_id" required>
    <option value="">Sélectionnez un animal</option>
    <?php foreach ($animals as $animal): ?>
        <option value="<?php echo htmlspecialchars($animal['id']); ?>">
            <?php echo htmlspecialchars($animal['name']); ?>
        </option>
    <?php endforeach; ?>
</select>
        <div class="mb-3">
            <label for="food" class="form-label">Nourriture</label>
            <textarea class="form-control" id="food" name="food" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantité de la nourriture</label>
            <textarea class="form-control" id="quantity" name="quantity" rows="4" required></textarea>
            
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter le rapport</button>
        </div>
    </form>
</div>
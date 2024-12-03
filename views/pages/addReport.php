<div class="container rounded mt-5">
    <h2>Ajouter un Nouveau Rapport</h2>

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
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <div class="mb-3">
            <label for="food" class="form-label">Nourriture</label>
            <textarea class="form-control" id="food" name="food" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="food_quantity" class="form-label">Quantité de la nourriture</label>
            <textarea class="form-control" id="food_quantity" name="food_quantity" rows="4" required></textarea>
            
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">Détails</label>
            <textarea class="form-control" id="details" name="details" rows="4" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter le rapport</button>
        </div>
    </form>
</div>

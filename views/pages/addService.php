<div class="container rounded mt-5">
    <h2>Ajouter un Nouveau Service</h2>

    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Titre du Service</label>
            <input type="text" class="form-control" id="title" name="name" required>
        </div>
        <div class="mb-3">
            <label for="serviceDescription" class="form-label">Description</label>
            <textarea class="form-control" id="serviceDescription" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="serviceCategory" class="form-label">Catégorie</label>
            <select class="form-select" id="serviceCategory" name="category" required>
                <option value="restauration">Restauration</option>
                <option value="visite">Visite</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="serviceImage" class="form-label">Image du Service</label>
            <input type="file" class="form-control" id="serviceImage" name="image" accept="image/*" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter le Service</button>
        </div>
    </form>
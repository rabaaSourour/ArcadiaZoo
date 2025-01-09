<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h1>Ajouter un Nouveau Service</h1>
                </div>
                <div class="col-lg-12">
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
                            <textarea type="text" class="form-control" id="serviceDescription" name="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="serviceCategory" class="form-label">Catégorie</label>
                            <select class="form-select" id="serviceCategory" name="category" required>
                                <option value="restauration">Restauration</option>
                                <option value="visite">Visite</option>
                            </select>
                        </div>
                        <div class="pb-3">
                            <label for="serviceImage" class="form-label">Image du Service</label>
                            <input type="file" class="form-control" id="serviceImage" name="image" accept="image/*" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter le Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h1 class="text-center">Modifier la nouriture</h1>
                </div>
                <div class="col-lg-12">
                    <?php if (isset($food)) : ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($food['id']); ?>">
                            <div class="mb-3">
                                <label for="food" class="form-label fw-bold">Nourriture :</label>
                                <textarea type="text" class="form-control" name="food" id="food" rows="2" required><?php echo htmlspecialchars($food['food']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label fw-bold">Quantité de la nourriture :</label>
                                <input type="text" class="form-control" name="quantity" id="quantity" value="<?php echo htmlspecialchars($food['quantity']); ?>" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Enregistrer les modifications</button>
                            </div>
                        </form>

                    <?php else : ?>
                        <div class="alert alert-warning text-center mt-4" role="alert">
                            Aucun rapport trouvé pour modification.
                        </div>
                        
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
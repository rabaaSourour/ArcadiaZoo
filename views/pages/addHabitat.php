<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h1 class="text-center">Ajouter un Nouveau habitat</h1>
                </div>
                <div class="col-lg-12">
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
                        <div class="text-center pb-5">
                            <button type="submit" class="btn btn-primary">Ajouter le habitat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
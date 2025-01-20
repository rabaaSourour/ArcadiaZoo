<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h2 class="text-secondary p-3">Modifier les horaires d'ouverture</h2>
                </div>
                <div class="col-lg-12">
                    <?php if (isset($status)): ?>
                        <div class="alert <?= $status['success'] ? 'alert-success' : 'alert-danger' ?>" role="alert">
                            <?= htmlspecialchars($status['message']) ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php foreach ($horaires as $horaire): ?>
                            <input type="hidden" name="horaires[<?= $horaire['id'] ?>][id]" value="<?= htmlspecialchars($horaire['id']) ?>">
                            <label class="text-secondary">Jour: <?= htmlspecialchars($horaire['day']) ?></label><br>
                            <label class="text-primary">Heure d'ouverture:</label>
                            <input class="text-bg-primary rounded" type="time" name="horaires[<?= $horaire['id'] ?>][openingTime]" value="<?= substr(htmlspecialchars($horaire['openingTime']), 0, 5) ?>"><br>
                            <label class="text-primary">Heure de fermeture:</label>
                            <input class="text-bg-primary rounded" type="time" name="horaires[<?= $horaire['id'] ?>][closingTime]" value="<?= substr(htmlspecialchars($horaire['closingTime']), 0, 5) ?>"><br>
                            <hr>
                        <?php endforeach; ?>
                        <div class="text-center p-3">
                            <button class="btn" type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
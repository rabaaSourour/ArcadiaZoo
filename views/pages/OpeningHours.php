<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="col-lg-6 col-md-8">
                <div class="col-lg-12 text-center">
                    <h1 class="text-center">Modifier les horaires d'ouverture</h1>
                </div>
                <div class="col-lg-12">
                    <form method="POST" action="">
                        <?php foreach ($horaires as $horaire): ?>
                            <input type="hidden" name="horaires[<?= $horaire['id'] ?>][id]" value="<?= htmlspecialchars($horaire['id']) ?>">
                            <label class="card-title">Jour: <?= htmlspecialchars($horaire['day']) ?></label><br>
                            <label>Heure d'ouverture:</label>
                            <input class="text-bg-primary rounded" type="time" name="horaires[<?= $horaire['id'] ?>][openingTime]" value="<?= substr(htmlspecialchars($horaire['openingTime']), 0, 5) ?>"><br>
                            <label>Heure de fermeture:</label>
                            <input class="text-bg-primary rounded" type="time" name="horaires[<?= $horaire['id'] ?>][closingTime]" value="<?= substr(htmlspecialchars($horaire['closingTime']), 0, 5) ?>"><br>
                            <hr>
                        <?php endforeach; ?>
                        <button class="btn btn-outline-light mt-2" type="submit">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
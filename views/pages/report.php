<div class="container rounded mt-4 p-4 shadow-lg">
    <h1 class="text-center bg-primary py-2 rounded">Comptes rendus vétérinaires</h1>

    <div class="mb-3">
        <label for="animal-filter" class="form-label">Filtrer par animal :</label>
        <select id="animal-filter" class="form-select">
            <option value="">Tous les animaux</option>
            <?php foreach ($animals as $animal): ?>
                <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="table-responsive">
        <table id="report-table" class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>Animal</th>
                    <th>Vétérinaire</th>
                    <th>Date</th>
                    <th>Rapport</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report): ?>
                    <?php 
                    $animal = array_filter($animals, fn($a) => $a['id'] === $report['animals_id']);
                    if (!empty($animal)) {
                        $animalName = htmlspecialchars(current($animal)['name']);
                    } else {
                        $animalName = "Non spécifié";
                    }
                    ?>
                    <tr data-animal-id="<?= $report['animals_id'] ?>">
                        <td><?= $animalName ?></td>
                        <td><?= htmlspecialchars($report['users_id']) ?></td>
                        <td><?= htmlspecialchars($report['last_check']) ?></td>
                        <td><?= nl2br(htmlspecialchars($report['details'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="/public/js/reportAdmin.js"></script>

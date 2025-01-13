<div class="container rounded p-4">
    <h2 class="text-center text-secondary">Comptes rendus vétérinaires</h2>

    <div class="text-primary mb-3">
        <label for="animal-filter" class="form-label">Filtrer par animal :</label>
        <select id="animal-filter" class="form-select text-primary">
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
                    <th class="text-primary">Animal</th>
                    <th class="text-primary">Vétérinaire</th>
                    <th class="text-primary">Date</th>
                    <th class="text-primary">Rapport</th>
                    <th class="text-primary">Actions</th>
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
                        <td class="text-primary"><?= $animalName ?></td>
                        <td class="text-primary"><?= htmlspecialchars($report['users_id']) ?></td>
                        <td class="text-primary"><?= htmlspecialchars($report['last_check']) ?></td>
                        <td class="text-primary"><?= nl2br(htmlspecialchars($report['details'])) ?></td>
                        <td class="text-center">
                            <button class="btn m-2" onclick="window.location.href='/report/update?id=<?= $report['id'] ?>'">Modifier</button>
                            <button class="btn" onclick="deleteReport(<?= $report['id'] ?>)">Supprimer</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="/public/js/reportAdmin.js"></script>
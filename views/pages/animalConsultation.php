<div class="container rounded p-5">
    <h2 class="text-center mb-4">Consultations des Animaux</h2>
    <table id="consultation-table" class="table table-striped table-bordered">
        <thead class="thead-dark pb-5">
            <tr>
                <th class="text-primary">Nom de l'Animal :</th>
                <th class="text-primary">Nombre de Consultations :</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultations as $consultation): ?>
                <tr>
                    <td class="text-secondary"><?= htmlspecialchars($consultation['name']) ?></td>
                    <td class="text-secondary"><?= htmlspecialchars($consultation['consultations']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

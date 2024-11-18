<div class="container rounded mt-5">
    <h2 class="text-center mb-4">Consultations des Animaux</h2>
    <table id="consultation-table" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nom de l'Animal :</th>
                <th>Nombre de Consultations :</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultations as $consultation): ?>
                <tr>
                    <td><?= htmlspecialchars($consultation['animal_name']) ?></td>
                    <td><?= htmlspecialchars($consultation['consultations']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

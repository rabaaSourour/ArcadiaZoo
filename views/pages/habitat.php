<section class="container rounded mt-4"> 
    <!-- Les habitats -->
    <div class="container rounded">
        <h1 class="text-center">Découvrez nos différents habitats !</h1>

        <?php foreach ($habitats as $habitat): ?>
            <div class="card habitat-card rounded my-3">
                <div>
                    <img src="<?= htmlspecialchars($habitat['image']) ?>" class="card-img rounded p-4" alt="Image de l'habitat">
                </div>
                <div class="card-body habitat">
                    <h5 class="card-title"><?= htmlspecialchars($habitat['name']) ?></h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($habitat['description'])) ?></p>
                </div>
                <div>
                    <?php if ($role === 'admin'): ?>
                        <button class="btn btn-warning" onclick="window.location.href='/habitat/update?id=<?= $habitat['id'] ?>'">Modifier</button>
                        <button class="btn btn-danger" onclick="deleteHabitat(<?= $habitat['id'] ?>)">Supprimer</button>
                    <?php endif; ?>
                </div>
                <button onclick="toggleAnimals(<?= $habitat['id'] ?>)" class="btn btn-secondary mb-3">Afficher les animaux</button>

                <!-- Liste des animaux spécifique à cet habitat -->
                <div id="animals-<?= $habitat['id'] ?>" class="animal-list" style="display: none;">
                    <?php foreach ($animals as $animal): ?>
                        <?php if ($animal['habitat_id'] === $habitat['id']): ?>
                            <div class="card rounded my-3">
                                <div>
                                    <img src="<?= htmlspecialchars($animal['image']) ?>" class="card-img rounded p-4" alt="Image de l'animal">
                                </div>
                                <div class="card-body habitat">
                                    <h5 class="card-title"><?= htmlspecialchars($animal['name']) ?></h5>
                                    <p class="card-text"><?= nl2br(htmlspecialchars($animal['breed'])) ?></p>
                                </div>
                                <div>
                                    <?php if ($role === 'admin'): ?>
                                        <button class="btn btn-warning" onclick="window.location.href='/animal/update?id=<?= $animal['id'] ?>'">Modifier</button>
                                        <button class="btn btn-danger" onclick="deleteAnimal(<?= $animal['id'] ?>)">Supprimer</button>
                                    <?php endif; ?>
                                </div>
                                <button onclick="toggleReports(<?= $animal['id'] ?>)" class="btn btn-secondary mb-3">Afficher les détails de l'animal</button>
                                
                                <!-- Rapport vétérinaire de chaque animal -->
                                <div id="report-<?= $animal['id'] ?>" class="report-list" style="display: none;">
                                    <?php foreach ($reports as $report): ?>
                                        <?php if ($report['animals_id'] === $animal['id']): ?>
                                            <div class="card rounded my-3">
                                                <div class="card-body habitat">
                                                    <p class="card-text"><strong>Statut :</strong> <?= htmlspecialchars($report['status']) ?></p>
                                                    <p class="card-text"><strong>Nourriture :</strong> <?= nl2br(htmlspecialchars($report['food'])) ?></p>
                                                    <p class="card-text"><strong>Quantité de la nourriture :</strong> <?= nl2br(htmlspecialchars($report['food_quantity'])) ?></p>
                                                    <p class="card-text"><strong>Détails :</strong> <?= nl2br(htmlspecialchars($report['details'])) ?></p>
                                                </div>
                                                <div>
                                                    <?php if ($role === 'admin'): ?>
                                                        <button class="btn btn-warning" onclick="window.location.href='/report/update?id=<?= $report['id'] ?>'">Modifier</button>
                                                        <button class="btn btn-danger" onclick="deleteReport(<?= $report['id'] ?>)">Supprimer</button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if ($role === 'admin'): ?>
        <button class="btn btn-primary" href="/habitat/new">Ajouter un nouveau habitat</button>
        <?php endif; ?>
    </div>
</section>

<!-- Scripts -->
<script src="/public/js/habitat.js"></script>
<script src="/public/js/animal.js"></script>
<script src="/public/js/report.js"></script>


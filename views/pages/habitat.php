<section>
    <div class="container habitat-container pb-5">
        <!-- Titre principal -->
        <h1 class="text-center">Découvrez nos différents habitats !</h1>

        <div class="row row-cols-1 row-cols-md-2 g-4 rounded">
            <?php foreach ($habitats as $habitat): ?>
                <div class="col habitats-list">
                    <!-- Carte de l'habitat -->
                    <div class="card h-100">
                        <img src="<?= htmlspecialchars($habitat['image']) ?>" class="card-img-habitat" alt="Image de l'habitat">

                        <div class="card-body habitat">
                            <h5 class="card-title"><?= htmlspecialchars($habitat['name']) ?></h5>
                            <p class="card-text"><?= nl2br(htmlspecialchars($habitat['description'])) ?></p>
                        </div>

                        <div>
                            <?php if ($role === 'admin'): ?>
                                <button class="btn btn-warning" onclick="window.location.href='/habitat/update?id=<?= $habitat['id'] ?>'">Modifier</button>
                                <button class="btn btn-danger" onclick="deleteHabitat(<?= $habitat['id'] ?>)">Supprimer</button>
                            <?php endif; ?>
                            <a onclick="toggleAnimals(<?= $habitat['id'] ?>)" class="btn btn-secondary mb-3">Afficher les animaux</a>
                        </div>

                        <!-- Liste des animaux spécifique à cet habitat -->
                        <div id="animals-<?= $habitat['id'] ?>" class="animal-list" style="display: none;">
                            <div class="row row-cols-1 row-cols-md-2 g-4 rounded">
                                <?php foreach ($animals as $animal): ?>
                                    <?php if ($animal['habitat_id'] === $habitat['id']): ?>
                                        <div class="col animal-list" data-animal-id="<?= htmlspecialchars($animal['id']) ?>">
                                            <div class="card rounded my-3">
                                                <img src="<?= htmlspecialchars($animal['image']) ?>" class="card-img-animal" alt="Image de l'animal">

                                                <div class="card animal-card">
                                                    <h5 class="card-title"><?= htmlspecialchars($animal['name']) ?></h5>
                                                    <p class="card-text"><?= nl2br(htmlspecialchars($animal['breed'])) ?></p>
                                                </div>

                                                <div>
                                                    <?php if ($role === 'admin'): ?>
                                                        <button class="btn btn-warning" onclick="window.location.href='/animal/update?id=<?= $animal['id'] ?>'">Modifier</button>
                                                        <button class="btn btn-danger" onclick="deleteAnimal(<?= $animal['id'] ?>)">Supprimer</button>
                                                    <?php endif; ?>
                                                    <button onclick="toggleReports(<?= $animal['id'] ?>)" class="btn btn-secondary mb-3">Afficher les détails de l'animal</button>
                                                </div>

                                                <!-- Rapports vétérinaires -->
                                                <div id="report-<?= $animal['id'] ?>" class="report-list" style="display: none;">
                                                    <?php foreach ($reports as $report): ?>
                                                        <?php if ($report['animals_id'] === $animal['id']): ?>
                                                            <div class="card rounded my-3">
                                                                <div class="card-body">
                                                                    <p class="card-text"><strong>Statut :</strong> <?= htmlspecialchars($report['status']) ?></p>
                                                                    <p class="card-text"><strong>Nourriture :</strong> <?= nl2br(htmlspecialchars($report['food'])) ?></p>
                                                                    <p class="card-text"><strong>Quantité de nourriture :</strong> <?= nl2br(htmlspecialchars($report['food_quantity'])) ?></p>
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
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bouton pour ajouter un habitat -->
        <?php if ($role === 'admin'): ?>
            <button class="btn btn-primary mt-4" onclick="window.location.href='/habitat/new'">Ajouter un nouvel habitat</button>
        <?php endif; ?>
    </div>
</section>

<!-- Scripts -->
<script src="/public/js/habitat.js"></script>
<script src="/public/js/animal.js"></script>
<script src="/public/js/report.js"></script>
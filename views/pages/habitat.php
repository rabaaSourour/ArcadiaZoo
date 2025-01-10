<section>
    <div class="container habitat-container pb-5">
        <!-- Titre principal -->
        <h1 class="text-center">Découvrez nos différents habitats !</h1>

        <div class="row align-items-center g-4 rounded">
            <?php $index = 0; ?>
            <?php foreach ($habitats as $habitat): ?>
                <div class="col-12 habitats-list">
                    <!-- Carte de l'habitat -->
                    <div class="card mb-3 mw-100">
                        <div class="row g-0">
                            <?php if ($index % 2 === 0): ?>
                                <div class="col-md-6">
                                    <img src="<?= htmlspecialchars($habitat['image']) ?>" class="img-fluid rounded" alt="Image de l'habitat">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($habitat['name']) ?></h5>
                                        <p class="card-text"><?= nl2br(htmlspecialchars($habitat['description'])) ?></p>
                                        <?php if ($role === 'admin'): ?>
                                            <button class="btn btn-warning" onclick="window.location.href='/habitat/update?id=<?= $habitat['id'] ?>'">Modifier</button>
                                            <button class="btn btn-danger" onclick="deleteHabitat(<?= $habitat['id'] ?>)">Supprimer</button>
                                        <?php endif; ?>
                                        <button onclick="toggleAnimals(<?= $habitat['id'] ?>)" class="btn btn-secondary mb-3">Afficher les animaux</button>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($habitat['name']) ?></h5>
                                        <p class="card-text"><?= nl2br(htmlspecialchars($habitat['description'])) ?></p>
                                        <?php if ($role === 'admin'): ?>
                                            <button class="btn btn-warning" onclick="window.location.href='/habitat/update?id=<?= $habitat['id'] ?>'">Modifier</button>
                                            <button class="btn btn-danger" onclick="deleteHabitat(<?= $habitat['id'] ?>)">Supprimer</button>
                                        <?php endif; ?>
                                        <button onclick="toggleAnimals(<?= $habitat['id'] ?>)" class="btn btn-secondary mb-3">Afficher les animaux</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="<?= htmlspecialchars($habitat['image']) ?>" class="img-fluid rounded" alt="Image de l'habitat">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Liste des animaux pour cet habitat -->
                    <div id="animals-<?= $habitat['id'] ?>" class="animal-list" style="display: none;">
                        <div class="row row-cols-1 row-cols-md-2 g-4 rounded">
                            <?php foreach ($animals as $animal): ?>
                                <?php if ($animal['habitat_id'] === $habitat['id']): ?>
                                    <div class="col animal-list" data-animal-id="<?= htmlspecialchars($animal['id']) ?>">
                                        <div class="card rounded my-3">
                                            <img src="<?= htmlspecialchars($animal['image']) ?>" class="card-img-animal" alt="Image de l'animal">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= htmlspecialchars($animal['name']) ?></h5>
                                                <p class="card-text"><?= nl2br(htmlspecialchars($animal['breed'])) ?></p>
                                                <?php if ($role === 'admin'): ?>
                                                    <button class="btn btn-warning" onclick="window.location.href='/animal/update?id=<?= $animal['id'] ?>'">Modifier</button>
                                                    <button class="btn btn-danger" onclick="deleteAnimal(<?= $animal['id'] ?>)">Supprimer</button>
                                                <?php endif; ?>
                                                <button data-action="show-details" class="btn btn-secondary mb-3">Afficher les détails de l'animal</button>

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
                <?php $index++; ?>
            <?php endforeach; ?>
        </div>

        <!-- Bouton pour ajouter un habitat -->
        <?php if ($role === 'admin'): ?>
            <button class="btn btn-primary mt-4" onclick="window.location.href='/habitat/new'">Ajouter un nouvel habitat</button>
        <?php endif; ?>
    </div>
</section>

<div id="animal-popup" class="popup-container" style="display: none;">
    <div class="popup-content">
        <button class="close-popup" onclick="closeAnimalPopup()">×</button>
        <div id="popup-details"></div>
    </div>
</div>

<dialog id="dialog-show-details">
    <div class="dialog-content">
        <button class="close-btn btn btn-primary">Fermer</button>
    </div>
</dialog>

<template id="template-animal-details">
    <div class="animal-info">
        <p class="animal-name"></p>
        <p class="report-details"></p>
        <p class="report-status"></p>
        <p class="report-food"></p>
        <p class="report-quantity"></p>
        <p class="report-last-check"></p>
    </div>
</template>

<!-- Scripts -->
<script src="/public/js/habitat.js"></script>
<script src="/public/js/animal.js"></script>
<script src="/public/js/report.js"></script>
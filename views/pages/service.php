<section>
    <!-- Section Restauration -->
    <div class="p-4">
        <h2 class="text-center text-secondary">Où manger !</h2>
        <p class="text-center">Venez découvrir nos différentes spécialités dans un cadre naturel.</p>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($services as $service): ?>
                <?php if ($service['category'] === 'restauration'): ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= htmlspecialchars($service['image']) ?>" class="card-img rounded p-3" alt="image du service">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= htmlspecialchars($service['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($service['description']) ?></p>
                                <?php if (in_array($role, ['admin', 'employe'])): ?>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning" onclick="window.location.href='/service/update?id=<?= $service['id'] ?>'">Modifier</button>
                                        <button class="btn btn-danger" onclick="deleteService(<?= $service['id'] ?>)">Supprimer</button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Section Visite des Habitats -->
<section>
    <div class="p-4">
        <h2 class="text-center text-secondary mb-4">Visite des Habitats</h2>
        <div class="row align-items-center g-4">
            <?php foreach ($services as $index => $service): ?>
                <?php if ($service['category'] === 'visite'): ?>
                    <div class="col-12 mb-3">
                        <div class="card-service">
                            <div class="row g-3">
                                <?php if ($index % 2 === 0): ?>
                                    <div class="col-md-4">
                                        <img src="<?= htmlspecialchars($service['image']) ?>" class="card-img-top rounded" alt="image du service">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-center pt-4"><?= htmlspecialchars($service['name']) ?></h5>
                                            <p class="card-text p-3"><?= htmlspecialchars($service['description']) ?></p>
                                            <?php if (in_array($role, ['admin', 'employe'])): ?>
                                                <button class="btn btn-warning" onclick="window.location.href='/pages/editServiceForm.php?id=<?= $service['id'] ?>'">Modifier</button>
                                                <button class="btn btn-danger" onclick="deleteService(<?= $service['id'] ?>)">Supprimer</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-center pt-4"><?= htmlspecialchars($service['name']) ?></h5>
                                            <p class="card-text p-3"><?= htmlspecialchars($service['description']) ?></p>
                                            <?php if (in_array($role, ['admin', 'employe'])): ?>
                                                <button class="btn btn-warning" onclick="window.location.href='/pages/editServiceForm.php?id=<?= $service['id'] ?>'">Modifier</button>
                                                <button class="btn btn-danger" onclick="deleteService(<?= $service['id'] ?>)">Supprimer</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?= htmlspecialchars($service['image']) ?>" class="card-img-top rounded" alt="image du service">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<script src="/public/js/service.js"></script>
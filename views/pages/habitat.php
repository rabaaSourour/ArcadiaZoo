    <section class="container rounded mt-4">
        <!-- Les animaux de la jungle -->
        <div class="container rounded">
            <h1 class="text-center">Découvrez nos différents habitats !</h1>

            <?php foreach ($habitats as $habitat): ?>
                <div class="card rounded my-3">
                    <div>
                        <img src="<?= htmlspecialchars($habitat['image']) ?>" class="card-img rounded p-4" alt="Image de la jungle">
                    </div>
                    <div class="card-body habitat">
                        <h5 class="card-title text-dark"><?= htmlspecialchars($habitat['name']) ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars($habitat['description'])) ?></p>
                    </div>
                    <div>
                        <?php //if ($isAdmin): ?>
                            <button class="btn btn-warning" onclick="window.location.href='/habitat/update?id=<?= $habitat['id'] ?>'">Modifier</button>
                            <button class="btn btn-danger" onclick="deleteHabitat(<?= $habitat['id'] ?>)">Supprimer</button>
                        <?php //endif; ?>
                    </div>
                    <button onclick="showHideAnimals()" class="btn btn-secondary mb-3">Afficher les animaux </button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
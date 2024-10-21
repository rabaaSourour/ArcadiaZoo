<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';


use App\Model\Service;
use App\Database\DbConnection;

// Récupérez la connexion à la base de données
$pdo = DbConnection::getPdo();
$service = new Service($pdo);
$services = $service->getAllServices();
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
?>

<section>
    <!-- Section Restauration -->
    <div class=" p-4">
        <h1 class="text-center text-bg-primary rounded">Où manger !</h1>
        <p class="text-dark text-center">Venez découvrir nos différentes spécialités dans un cadre naturel.</p>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($services as $service):
            ?>
                <?php if ($service['category'] === 'restauration'): ?>
                    <div class="col">
                        <div class="card text-bg-secondary">
                            <img src="<?= htmlspecialchars($service['image_path']) ?>" class="card-img rounded p-4 " alt="image du service">

                            <div class="card-body">
                                <h5 class="card-title text-dark"><?= htmlspecialchars($service['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($service['description']) ?></p>

                                <?php if ($isAdmin): ?>
                                    <button class="btn btn-warning" onclick="window.location.href='/pages/editServiceForm.php?id=<?= $service['id'] ?>'">Modifier</button>
                                    <button class="btn btn-danger" onclick="deleteService(<?= $service['id'] ?>)">Supprimer</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button class="btn btn-warning" onclick="window.location.href='/pages/editServiceForm.php?id=<?= $service['id'] ?>'">
                            Modifier
                        </button>

                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>


    </div>
</section>

<!-- Section Visite des Habitats -->
<section>
    <div class="p-4">
        <h1 class="text-center text-bg-primary rounded mb-4">Visite des Habitats</h1>
        <div class="row row-cols-1 row-cols-md-2 align-items-center g-4">
            <?php foreach ($services as $index => $service): ?>
                <?php if ($service['category'] === 'visite'): ?>
                    <div class="col mb-3">
                        <div class="card text-bg-secondary">
                            <div class="row g-0">
                                <?php if ($index % 2 === 0): ?>
                                    <div class="col-md-4 rounded">
                                        <img src="<?= htmlspecialchars($service['image_path']) ?>" class="img-fluid rounded mt-3 mb-3" alt="image du service">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-dark"><?= htmlspecialchars($service['name']) ?></h5>
                                            <p class="card-text"><?= htmlspecialchars($service['description']) ?></p>
                                            <?php if ($isAdmin): ?>
                                                <button class="btn btn-warning" onclick="window.location.href='/pages/editServiceForm.php?id=<?= $service['id'] ?>'">Modifier</button>
                                                <button class="btn btn-danger" onclick="deleteService(<?= $service['id'] ?>)">Supprimer</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-dark"><?= htmlspecialchars($service['name']) ?></h5>
                                            <p class="card-text"><?= htmlspecialchars($service['description']) ?></p>
                                            <?php if ($isAdmin): ?>
                                                <button class="btn btn-warning" onclick="window.location.href='/pages/editServiceForm.php?id=<?= $service['id'] ?>'">Modifier</button>
                                                <button class="btn btn-danger" onclick="deleteService(<?= $service['id'] ?>)">Supprimer</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="<?= htmlspecialchars($service['image_path']) ?>" class="img-fluid rounded mt-3" alt="image du service">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button class="btn btn-warning" onclick="window.location.href='/pages/editServiceForm.php?id=<?= $service['id'] ?>'">
                            Modifier
                        </button>

                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>


    </div>
</section>

<script src="/public/js/service.js"></script>
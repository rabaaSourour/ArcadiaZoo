<section>
    <div class="container text-center p-5">
    <p>Zoo Écologique Arcadia, un sanctuaire dédié à la préservation de la biodiversité.
        Découvrez des animaux dans des habitats naturels et engagez-vous avec nous pour protéger notre planète.
        Profitez d’une visite où émerveillement et respect de la nature se rencontrent !</p>
    </div>

    <div class="text-center">
        <img src="/public/asset/images/logo2.png">
    </div>

    <div class="container rounded pt-5">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item text-primary" role="presentation">
                <button class="nav-link active" id="habitats-tab" data-bs-toggle="tab" data-bs-target="#habitats" type="button"
                    role="tab" aria-controls="habitats" aria-selected="true">Habitats</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="animaux-tab" data-bs-toggle="tab" data-bs-target="#animaux" type="button"
                    role="tab" aria-controls="animaux" aria-selected="false">Animaux</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="service-tab" data-bs-toggle="tab" data-bs-target="#services" type="button"
                    role="tab" aria-controls="services" aria-selected="false">Services</button>
            </li>
        </ul>

        <!-- les différent habitats du ZOO -->
        <div class="tab-content rounded" id="myTabContent">

            <!-- les habitats du ZOO-->
            <div class="tab-pane fade show active mb-3" id="habitats" role="tabpanel" aria-labelledby="habitats-tab">
                <p class="text-center p-4">Chaque habitat du Zoo Écologique Arcadia est conçu pour refléter fidèlement
                    les environnements naturels des espèces qu'il abrite,
                    tout en sensibilisant le public aux enjeux environnementaux et aux actions nécessaires pour protéger notre
                    planète.
                </p>
                <div class="row mt-3">
                    <?php foreach ($habitats as $habitat): ?>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <img src="<?= htmlspecialchars($habitat['image']) ?>" class="card-img-habitat" alt="Image de l'habitat">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?= htmlspecialchars($habitat['name']) ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <!-- les animaux du ZOO-->
            <div class="tab-pane fade" id="animaux" role="tabpanel" aria-labelledby="animaux-tab">
                <p class="text-center p-4"></p>

                <!-- debut des animaux de la Jungle-->

                <div class="container my-4">
                    <div class="row">
                        <?php foreach ($animals as $animal): ?>
                            <div class="col-md-3 pb-3">
                                <div class="card
                                ">
                                    <img src="<?= htmlspecialchars($animal['image']) ?>" class="card-img-animal" alt="Image de l'animal">
                                    <div class="card-body ">
                                        <h5 class="card-title text-center"><?= htmlspecialchars($animal['name']) ?></h5>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>


                    </div>
                </div>
            </div>

            <!-- les différent services du ZOO-->
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                <div class="container rounded p-4 mb-3">
                    <p class="text-center pb-3">la découverte de la nature s'accompagne de confort et de commodités pour une
                        expérience inoubliable,
                        Notre parc propose plusieurs services pour enrichir votre visite et vous permettre de profiter pleinement de
                        votre journée parmi les merveilles de la faune et de la flore.</p>

                
                            <!-- Service N°1 Restauration -->
                            <div class="rounded mb-3 p-4" id="service1">
                                <h3 class="text-dark" <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>Services de Restauration</h3>
                                <ul class="text-clear" <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>
                                    <li>
                                        <strong>Cafétérias et Snacks</strong>: Offrant une variété de plats rapides, des sandwiches aux salades fraîches, idéales pour une pause déjeuner ou un goûter.
                                    </li>
                                    <li>
                                        <strong>Thématiques</strong>: Des espaces de restauration offrant des menus inspirés des différentes régions du monde, où vous pourrez déguster des spécialités locales en accord avec les habitats que vous visitez.
                                    </li>
                                    <li>
                                        <strong>Options Végétariennes et Véganes</strong>: Pour répondre aux besoins alimentaires de tous nos visiteurs, nous proposons des menus végétariens, véganes et sans gluten.
                                    </li>
                                </ul>
                                <?php if ($role === 'admin'): ?>
                                    <button class="btn btn-warning btn-sm mb-2" onclick="editSection('service1')">Modifier</button>
                                    <button class="btn btn-danger btn-sm mb-2" onclick="deleteSection('service1')">Supprimer</button>
                                <?php endif; ?>
                            </div>

                            <!-- Service N°2 Visites Guidées -->
                            <div class="rounded mb-3 p-4" id="service2">
                                <h3 class="text-dark" <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>Visites Guidées des Habitats</h3>
                                
                                <p <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>Découvrez les merveilles de la savane, de la jungle et des marais avec nos visites guidées gratuites. Nos guides experts vous accompagneront à travers chaque habitat, vous offrant des explications détaillées sur les animaux et les écosystèmes que vous observez. Ces visites éducatives sont conçues pour enrichir votre expérience et sensibiliser à l'importance de la conservation.</p>
                                <ul <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>
                                    <li>
                                        <strong>Horaires des Visites</strong>: Des visites sont organisées à intervalles réguliers tout au long de la journée. Consultez le programme à l'entrée du parc ou sur notre application mobile pour ne rien manquer.
                                    </li>
                                    <li><strong>Thèmes Spécifiques</strong>: Des visites thématiques sont proposées régulièrement, centrées sur des sujets tels que le comportement animal, les efforts de conservation ou les adaptations écologiques.</li>
                                </ul>
                                <?php if ($role === 'admin'): ?>
                                    <button class="btn btn-warning btn-sm mb-2" onclick="editSection('service2')">Modifier</button>
                                    <button class="btn btn-danger btn-sm mb-2" onclick="deleteSection('service2')">Supprimer</button>
                                <?php endif; ?>
                            </div>

                            <!-- Service N°3 Visite en Train -->
                            <div class="rounded mb-3 p-4" id="service3">
                                <h3 class="text-dark" <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>Visite du Zoo en Petit Train</h3>
                                <p <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>Pour une exploration confortable et relaxante du parc, montez à bord de notre petit train touristique. Ce service pratique vous permet de découvrir l'ensemble du zoo sans vous fatiguer, avec des arrêts aux principaux points d'intérêt.</p>
                                <ul <?php echo ($role === 'admin') ? 'contenteditable="true"' : ''; ?>>
                                    <li><strong>Tour Panoramique</strong>: Profitez d'un circuit complet du parc avec des commentaires en direct sur les habitats et les animaux que vous traversez.</li>
                                    <li><strong>Accessibilité</strong>: Le petit train est accessible aux personnes à mobilité réduite et aux familles avec poussettes.</li>
                                    <li><strong>Fréquence des Départs</strong>: Les trains partent toutes les 30 minutes depuis l'entrée principale, avec des arrêts aux zones de restauration et aux principales attractions du parc.</li>
                                </ul>
                                <?php if ($role === 'admin'): ?>
                                    <button class="btn btn-warning btn-sm mb-2" onclick="editSection('service3')">Modifier</button>
                                    <button class="btn btn-danger btn-sm mb-2" onclick="deleteSection('service3')">Supprimer</button>
                                <?php endif; ?>
                            </div>

                            <p class="text-center">Nous espérons que ces services rendront votre visite au Zoo Écologique Arcadia encore plus agréable et enrichissante. Merci de soutenir notre mission de conservation et d'éducation environnementale. Bonne visite!</p>
                        </div>
                    </div>
                </div>
            </div>
</section>

<article>
    <div class="container">
        <div class="row g-4 d-flex justify-content-center">
            <!-- Localisation -->
            <div class="col-12 col-md-5 rounded p-3 me-md-3">
                <p class="text-center rounded p-3">Où sommes-nous !</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2668.7174835636697!2d-2.179163103210465!3d48.019167799999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edffaf7884ad9%3A0xf218bf672b3dfd0!2sLa%20for%C3%AAt%20de%20Broc%C3%A9liande!5e0!3m2!1sfr!2sfr!4v1718791084054!5m2!1sfr!2sfr"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Horaires d'ouverture -->
            <div class="col-12 col-md-5 rounded p-3">
                <p class="text-center rounded p-3">Horaires d'ouverture</p>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Jour</th>
                                        <th>Heures d'ouverture</th>
                                        <th>Heures de fermeture</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($horaires as $horaire): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($horaire['day']) ?></td>
                                            <td><?= date('H:i', strtotime($horaire['openingTime'])) ?></td>
                                            <td><?= date('H:i', strtotime($horaire['closingTime'])) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>






<article>
    <!-- Commentaire -->
    <div class="p-5">
        <h3 class="text-center pt-3 mb-3">Voici quelques avis sur le ZOO</h3>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                if (!empty($getPendingReviews)) {
                    $chunkedReviews = array_chunk($getPendingReviews, 3);
                    foreach ($chunkedReviews as $index => $reviewsChunk): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <div class="row">
                                <?php foreach ($reviewsChunk as $review): ?>
                                    <div class="col-md-4 mb-5">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <h4 class="card-title"><?= htmlspecialchars($review['pseudo'] . ' :') ?></h4>
                                                <p class="card-text"><?= htmlspecialchars($review['review']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach;
                } else { ?>
                    <div class="alert alert-info text-center">
                        Aucun avis pour le moment. Soyez le premier à laisser votre avis !
                    </div>
                <?php } ?>
            </div>

            <!-- Navigation du carrousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Bouton pour ajouter un nouvel avis -->
        <div class="text-center m-3 pb-3">
            <a href="/review/addReview" class="btn">Ajouter votre avis</a>
        </div>
    </div>
</article>


<script src="/public/js/home.js"></script>
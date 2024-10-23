<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'C:/xampp/htdocs/ArcadiaZoo/src/Database/DbConnection.php';

use App\Model\Horaires;
use App\Controller\HorairesController;
use App\Controller\ReviewController;
use App\Model\Review;
use App\Database\DbConnection;

// Obtenez une instance de PDO
$pdo = DbConnection::getPdo();

// Créez une instance du modèle Review en lui passant l'instance de PDO
$reviewModel = new Review($pdo);

// Créez une instance du contrôleur ReviewController en lui passant le modèle Review
$reviewController = new ReviewController($reviewModel);

// Récupération des avis approuvés pour les afficher sur la page d'accueil

$getPendingReviews = $reviewController->getValidReviews();

?>
>>>>>>> dev
<!-- video presentation du zoo -->
<div class="ratio rounded ratio-16x9">
    <video class="embed-responsive-item" autoplay muted loop preload="auto">
        <source src="/public/asset/images/présentation zoo.mp4" type="video/mp4">
    </video>
</div>


<!-- Fin du présentation-->


<section>
    <!--onglets -->

    <div class="container rounded mt-5">

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
        <div class="tab-content text-bg-secondary rounded" id="myTabContent">

            <!-- les habitats du ZOO-->
            <div class="tab-pane fade show active mb-3" id="habitats" role="tabpanel" aria-labelledby="habitats-tab">
                <p class="text-center text-dark p-4">Chaque habitat du Zoo Écologique Arcadia est conçu pour refléter fidèlement
                    les environnements naturels des espèces qu'il abrite,
                    tout en sensibilisant le public aux enjeux environnementaux et aux actions nécessaires pour protéger notre
                    planète.
                </p>
                <div class="row mt-3">
                    <!-- Premiére habitat : Jungle -->
                    <div class="col-md-4">
                        <div class="card text-bg-primary mb-3">
                            <img src="/public/asset/images/Jungle.png" class="card-im-top p-4" alt="Image du junagle">
                            <div class="card-body text-bg-primary">
                                <h5 class="card-title text-dark">Jungle</h5>
                                <p class="card-text text-clear">Entrez dans la jungle luxuriante d'Arcadia, un sanctuaire verdoyant et
                                    mystérieux où la végétation dense crée un véritable paradis pour une multitude d'espèces exotiques.
                                    Sous la canopée épaisse, des singes espiègles se balancent de liane en liane, tandis que les colorés
                                    oiseaux tropicaux chantent des mélodies envoûtantes.
                                    Les visiteurs peuvent explorer des sentiers sinueux qui traversent des fougères géantes et des arbres
                                    centenaires,
                                    découvrant des habitants discrets comme les jaguars et les pythons.
                                    Des cascades rafraîchissantes et des rivières cristallines ajoutent à l'atmosphère sereine de ce
                                    milieu.
                                    Les expositions interactives et les ateliers pédagogiques permettent aux visiteurs d'en apprendre
                                    davantage sur la biodiversité unique des jungles tropicales et sur les menaces qui pèsent sur ces
                                    écosystèmes vitaux.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Deuxiéme habitat : Savane-->
                    <div class="col-md-4">
                        <div class="card text-bg-primary mb-3">
                            <img src="/public/asset/images/Savane.png" class="card-im-top p-4" alt="Image du savane">
                            <div class="card-body text-bg-primary">
                                <h5 class="card-title text-dark">Savane</h5>
                                <p class="card-text text-clear">Plongez au cœur de la vaste savane d'Arcadia, un espace ouvert et
                                    lumineux où les prairies infinies se déploient sous un ciel bleu éclatant.
                                    Ici, les majestueux éléphants, les rapides guépards, et les imposants lions cohabitent avec des
                                    troupeaux de zèbres et d'antilopes gracieux.
                                    Les acacias parsèment le paysage, offrant de l'ombre aux animaux durant les heures les plus chaudes de
                                    la journée.
                                    Les visiteurs peuvent observer les interactions naturelles entre les espèces depuis des points
                                    d'observation surélevés,
                                    tout en apprenant sur les efforts de conservation pour protéger ces habitats précieux. Des sentiers
                                    éducatifs vous guident à travers ce biotope,
                                    avec des panneaux informatifs sur la biodiversité et les écosystèmes de la savane africaine.</p>
                            </div>
                        </div>
                    </div>

                    <!--Trousiéme habitat : Marias-->
                    <div class="col-md-4">
                        <div class="card text-bg-primary mb-3">
                            <img src="/public/asset/images/marais.png" class="card-im-top p-4" alt="Image du marais">
                            <div class="card-body text-bg-primary">
                                <h5 class="card-title text-dark">Marais</h5>
                                <p class="card-text text-clear">Découvrez l'écosystème fascinant des marais d'Arcadia,
                                    où l'eau et la terre se rencontrent pour créer un habitat riche et diversifié.
                                    Ce biotope humide abrite une variété d'espèces aquatiques et terrestres,
                                    des grenouilles aux chants mélodieux aux tortues paisibles et aux oiseaux aquatiques élégants.
                                    Les marais sont bordés de roseaux et de plantes aquatiques, offrant des refuges naturels pour de
                                    nombreuses créatures.
                                    Des passerelles en bois permettent aux visiteurs de parcourir les marais sans perturber
                                    l'environnement fragile, offrant des vues imprenables sur la faune locale.
                                    Des expositions éducatives mettent en lumière l'importance des zones humides pour l'écosystème global,
                                    leur rôle dans la filtration de l'eau et la protection contre les inondations,
                                    ainsi que les efforts de conservation en cours pour préserver ces habitats essentiels.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- les animaux du ZOO-->
            <div class="tab-pane fade" id="animaux" role="tabpanel" aria-labelledby="animaux-tab">
                <p class="text-center text-dark p-4">Ceci est l'onglet Profile. Vous pouvez ajouter vos informations de profil
                    ici.
                    Le contenu peut être aussi long que nécessaire.</p>

                <!-- debut des animaux de la Jungle-->

                <div class="container my-4">
                    <div class="row">

                        <!-- animal : jaguar-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/jaguar.png" class="card-im-top p-4" alt="image de jaguar">
                                <div class="card-body ">
                                    <h5 class="card-title text-dark">Panthera onca</h5>
                                    <p class="card-text text-clear">Le plus grand félin des Amériques, le jaguar est un prédateur solitaire
                                        puissant.
                                        Il est reconnaissable à son pelage tacheté.</p>
                                </div>
                            </div>
                        </div>

                        <!--animal : singe -->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/singe.png" class="card-im-top p-4" alt="image du singe">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Alouatta</h5>
                                    <p class="card-text text-clear"> Connu pour ses cris puissants qui peuvent être entendus à plusieurs
                                        kilomètres, ces singes vivent en groupes sociaux.</p>
                                </div>
                            </div>
                        </div>

                        <!--animal : toucan -->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/toucan.png" class="card-im-top p-4" alt="image de toucan">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Ramphastos</h5>
                                    <p class="card-text text-clear">Reconnaissable à son grand bec coloré, le toucan est un oiseau sociable
                                        qui vit en petits groupes.</p>
                                </div>
                            </div>
                        </div>

                        <!--animal : paresseux-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/paresseux.png" class="card-im-top p-4" alt="image de paresseux">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Bradypus</h5>
                                    <p class="card-text text-clear">Cet animal lent passe la plupart de son temps accroché aux branches des
                                        arbres, où il se nourrit et dort.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- fin des animaux du Jungle-->



                <!--debut des animaux de la savane-->

                <div class="container my-4">
                    <div class="row">

                        <!-- Animal : lion-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/lion.png" class="card-im-top p-4" alt="image d'un lion">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Panthera leo</h5>
                                    <p class="card-text text-clear">le roi de la savane le lion est un grand félin social qui vit en groupes
                                        appelés hardes</p>
                                </div>
                            </div>
                        </div>

                        <!--Animal : élephant-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/elephant.png" class="card-im-top p-4" alt="image d'un élégant">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Loxodonta</h5>
                                    <p class="card-text text-clear">Le plus grand animal terrestre, les éléphants sont connus pour leur
                                        intelligence, leur mémoire exceptionnelle et leurs structures sociales complexes</p>
                                </div>
                            </div>
                        </div>

                        <!--Animal : guepard-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/guepard.png" class="card-im-top p-4" alt="image d'un guepard">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Acinonyx jubatus</h5>
                                    <p class="card-text text-clear">Le mammifère terrestre le plus rapide, capable d'atteindre des vitesses
                                        allant jusqu'à 100 km/h en courtes rafales</p>
                                </div>
                            </div>
                        </div>

                        <!--Animal : zébre-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/zebre.png" class="card-im-top p-4" alt="image du zébre">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Equus quagga</h5>
                                    <p class="card-text text-clear"> Connu pour ses rayures distinctives, chaque zèbre a un motif unique.
                                        Ils vivent en groupes et migrent sur de longues distances pour trouver de l'eau et des pâturages.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--fin ses animaux de savane -->

                <div class="container my-4">
                    <div class="row">

                        <!-- debut animals de marais-->

                        <!-- animal : alligator-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/alligator.png" class="card-im-top p-4" alt="image d'un alligator">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Alligator mississippiensis</h5>
                                    <p class="card-text text-clear"> Reptile imposant, l'alligator est un prédateur apex des marais
                                        d'Amérique du Nord.</p>
                                </div>
                            </div>
                        </div>

                        <!-- animal : heron bleu-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary mb-3">
                                <img src="/public/asset/images/heron.png" class="card-im-top p-4" alt="image d'un heron bleu">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Ardea herodias</h5>
                                    <p class="card-text text-clear"> Grand oiseau échassier, le héron bleu est connu pour sa silhouette
                                        élancée et son vol majestueux.</p>
                                </div>
                            </div>
                        </div>

                        <!-- animal :tortue-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/tortue.png" class="card-im-top p-4" alt="image de tortue">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Apalone spinifera</h5>
                                    <p class="card-text text-clear">Une tortue d'eau douce avec une carapace souple et un long cou, adaptée
                                        à la vie aquatique.</p>
                                </div>
                            </div>
                        </div>

                        <!-- animal : grenouille-->

                        <div class="col-md-3">
                            <div class="card text-bg-primary">
                                <img src="/public/asset/images/grenouille.png" class="card-im-top p-4" alt="image d'une grenouille">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Lithobates catesbeianus</h5>
                                    <p class="card-text text-clear"> Une des plus grandes grenouilles d'Amérique du Nord, connue pour son
                                        croassement puissant.</p>
                                </div>
                            </div>
                        </div>

                        <!-- fin des animaux-->


                    </div>
                </div>
            </div>

            <!-- les différent services du ZOO-->
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                <div class="container text-bg-secondary rounded p-4 mb-3">
                    <p class="text-center text-dark pb-3">la découverte de la nature s'accompagne de confort et de commodités pour une
                        expérience inoubliable,
                        Notre parc propose plusieurs services pour enrichir votre visite et vous permettre de profiter pleinement de
                        votre journée parmi les merveilles de la faune et de la flore.</p>

                    <!-- sercice N°1 restauration -->


                    <div class="text-bg-primary rounded mb-3 p-4">
                        <h3 class="text-dark">Services de Restauration</h3>
                        <ul class="text-clear">
                            <li>
                                <strong> Cafétérias et Snacks </strong>: Offrant une variété de plats rapides, des sandwiches aux salades
                                fraîches,
                                idéales pour une pause déjeuner ou un goûter.
                            </li>
                            <li>
                                <strong> Thématiques </strong>: Des espaces de restauration offrant des menus inspirés des différentes
                                régions du monde,
                                où vous pourrez déguster des spécialités locales en accord avec les habitats que vous visitez.
                            </li>
                            <li>
                                <strong>Options Végétariennes et Véganes </strong>: Pour répondre aux besoins alimentaires de tous nos
                                visiteurs,
                                nous proposons des menus végétariens, véganes et sans gluten.
                            </li>
                        </ul>
                    </div>

                    <!--services N°2 visite de ZOO -->

                    <div class="text-bg-primary rounded mb-3 p-4">
                        <h3 class="text-dark">Visites Guidées des Habitats</h3>
                        <p>Découvrez les merveilles de la savane, de la jungle et des marais avec nos visites guidées gratuites.
                            Nos guides experts vous accompagneront à travers chaque habitat, vous offrant des explications détaillées sur
                            les animaux et les écosystèmes que vous observez. Ces visites éducatives sont conçues pour enrichir votre
                            expérience et sensibiliser à l'importance de la conservation.</p>
                        <ul>
                            <li>
                                <strong>Horaires des Visites </strong>: Des visites sont organisées à intervalles réguliers tout au long de
                                la journée.
                                Consultez le programme à l'entrée du parc ou sur notre application mobile pour ne rien manquer.
                            </li>
                            <li><strong>Thèmes Spécifiques </strong>: Des visites thématiques sont proposées régulièrement, centrées sur
                                des sujets tels que le comportement animal,
                                les efforts de conservation ou les adaptations écologiques.
                            </li>
                        </ul>
                    </div>

                    <!-- service N°3 visite en train -->


                    <div class="text-bg-primary rounded mb-3 p-4">
                        <h3 class="text-dark">Visite du Zoo en Petit Train</h3>
                        <p>Pour une exploration confortable et relaxante du parc,
                            montez à bord de notre petit train touristique.
                            Ce service pratique vous permet de découvrir l'ensemble du zoo sans vous fatiguer,
                            avec des arrêts aux principaux points d'intérêt.</p>
                        <ul>
                            <li><strong>Tour Panoramique </strong>: Profitez d'un circuit complet du parc avec des commentaires en direct
                                sur les habitats et les animaux que vous traversez.</li>
                            <li><strong>Accessibilité </strong>: Le petit train est accessible aux personnes à mobilité réduite et aux
                                familles avec poussettes.</li>
                            <li><strong>Fréquence des Départs </strong>: Les trains partent toutes les 30 minutes depuis l'entrée
                                principale,
                                avec des arrêts aux zones de restauration et aux principales attractions du parc.</li>
                        </ul>
                    </div>

                    <p class="text-center text-dark">Nous espérons que ces services rendront votre visite au Zoo Écologique Arcadia
                        encore plus agréable et enrichissante.
                        Merci de soutenir notre mission de conservation et d'éducation environnementale. Bonne visite!
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>

<article>
    <div class="container text-center rounded p-4 mt-3 ">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- localisation -->
            <div class="col text-bg-secondary rounded p-3">
                <p class="text-bg-primary text-center rounded p-3">Où sommes-nous !</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2668.7174835636697!2d-2.179163103210465!3d48.019167799999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edffaf7884ad9%3A0xf218bf672b3dfd0!2sLa%20for%C3%AAt%20de%20Broc%C3%A9liande!5e0!3m2!1sfr!2sfr!4v1718791084054!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <!-- les horaires d'overture -->
            <div class=" col text-bg-secondary justify-content-end rounded p-3">
                <p class="text-bg-primary text-center rounded p-3">Horaires d'ouverture </p>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            // Récupérer la connexion PDO
                            $pdo = DbConnection::getPdo();

                            $horairesModel = new Horaires($pdo);
                            $horairesController = new HorairesController($horairesModel);
                            $horaires = $horairesController->showHoraires();
                            ?>
                            <table>
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
    <!--commentaire-->
    <div class="container text-bg-secondary rounded mt-5">
    <h3 class="text-center pt-3 mb-3">Voici quelques avis sur le ZOO</h3>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
        <?php
if (!empty($getPendingReviews)) {
    // Diviser les avis en groupes de 3 pour chaque slide
    $chunkedReviews = array_chunk($getPendingReviews, 3);
    foreach ($chunkedReviews as $index => $reviewsChunk): ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="row">
                <?php foreach ($reviewsChunk as $review): ?>
                    <div class="col-md-4 mb-5">
                        <div class="card text-bg-primary text-center">
                            <div class="card-body">
                                <h4 class="card-title"><?= htmlspecialchars($review['pseudo'].' :') ?></h4>
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
    <div class="text-center mt-4">
        <a href="/views/pages/reviews.php" class="btn btn-primary">Ajouter votre avis</a>
    </div>
</div>


</article>

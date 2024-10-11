<?php
include_once __DIR__ . '/../base_view.php';
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<section class="content mt-3 rounded">
    <!-- conteneur des habitats-->

    <!-- les animaux de la jungle-->
    <section>
        <section>
            <div class="container">
                <h1 class="text-center">Dévouvrez les animaux de la jungle !</h1>
                <div class="card rounded">
                    <div>
                        <img src="/assets/Jungle.png" class="card-img p-3 " alt="image de la Jungle">
                        <div class="action-image-buttons" data-show="admin">
                            <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                data-bs-target="#EditionPhotoModal">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#DeletePhotoModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body habitat" data-habitat="jungle">
                        <h5 class="card-title">Jungle</h5>
                        <p class="card-text">La jungle, une forêt tropicale dense et luxuriante,<br> abrite une biodiversité
                            exceptionnelle et joue un rôle vital dans la régulation climatique et la préservation de la
                            biodiversité.<br>
                            Cependant, elle est confrontée à des menaces telles que la déforestation et le changement climatique.<br>
                            La conservation de cet habitat crucial est essentielle pour maintenir l'équilibre écologique de la planète.
                        </p>
                    </div>
                    <button onclick="showHideAnimals()" class="btn btn-primary mb-3">Afficher les animaux de la Jungle</button>
                </div>
        </section>

        <section class="animals-section hide">
            <!-- Habitat container-->
            <div class="container">
                <!-- card jaguar -->
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/assets/jaguar.png" class="img-fluid rounded-start" alt="image d'un jaguar">
                            <div class="action-image-buttons" data-show="admin">
                                <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                    data-bs-target="#EditionPhotoModal">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#DeletePhotoModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Acinonyx jubatus</h5>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Race :</strong> jaguar (Acinonyx jubatus) est une espèce unique dans sa propre lignée et
                                        ne se divise pas en races comme les chiens ou les chats domestiques.
                                    </li>
                                    <li><strong>Habitat :</strong>Le guépard est affecté principalement aux savanes et aux prairies de
                                        l'Afrique subsaharienne.
                                        Ils préfèrent les espaces ouverts où ils peuvent utiliser leur vitesse pour chasser leurs proies.
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="animal-details hidden">
                        <!-- contenu des détails de l'animal-->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" id="animal-name"> Jaguar </h5>
                                    <div>
                                        <img src="/assets/jaguar.png" class="card-img" alt="Image d'un jaguar" id="animal-image">
                                        <div class="action-image-buttons" data-show="admin">
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#EditionPhotoModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#DeletePhotoModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="card-text" id="animal-description">
                                    <ul>
                                        <li>Poids : 90kg</li>
                                        <li>Pelage : Dense et brillant</li>
                                        <li>Dents: Bon état, pas de tarte significatif</li>
                                        <li>comportement : calme et réactif</li>
                                    </ul>
                                    </p>
                                    <p class="card-text"><strong>État:</strong> <span id="animal-state">En bonne santé générale, léger
                                            surpoids observé</span></p>
                                    <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food"> viande de boeuf, poisson,
                                            supplément en taurine.</span></p>
                                    <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">4kg
                                            par jour.</span></p>
                                    <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                            2024</span></p>
                                    <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">léger
                                            surplus de poids, recommandé d'augmenter l'activité physique et ajuster la ration
                                            alimentaire.<br>
                                            Pas de blessures ousignes de maladie<br> Examen sanguin : Paramétres normaux, fonction rénale et
                                            hépatique en bon état.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- card singe -->

                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/assets/singe.png" class="img-fluid" alt="image d'un singe">
                            <div class="action-image-buttons" data-show="admin">
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#EditionPhotoModal">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                    data-bs-target="#DeletePhotoModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Alouatta</h5>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Race :</strong>Les singes hurleurs appartiennent au genre Alouatta, Famille des
                                        Atelidae, sous-famille des Alouattinae.
                                    </li>
                                    <li><strong>Habitat :</strong>Le singe hurleur roux est largement distribué en Amérique du Sud.<br>
                                        Ils habitent divers types de forêts tropicales, Forêts tropicales humides, Forêts de plaine
                                        ,Forêts de montagne.
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="animal-details hidden">
                            <!-- contenu des détails de l'animal-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title" id="animal-name"> singe </h5>
                                        <div>
                                            <img src="/assets/singe.png" class="card-img" alt="Image d'un jaguar" id="animal-image">
                                            <div class="action-image-buttons" data-show="admin">
                                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                    data-bs-target="#EditionPhotoModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                    data-bs-target="#DeletePhotoModal">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <p class="card-text" id="animal-description">
                                        <ul>
                                            <li>Poids : 5kg</li>
                                            <li>Pelage : Brillant et propre</li>
                                            <li>Dents: Bon état, pas de caries</li>
                                            <li>comportement : social avec ses congénéres,interactif avec les soigneurs</li>
                                        </ul>
                                        </p>
                                        <p class="card-text"><strong>État:</strong> <span id="animal-state">En bonne santé générale,
                                                comportement alerte et actif</span></p>
                                        <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food"> fruits variés (bananes,
                                                pommes, oranges), légumes(carottes, poivrons), supplément en calcium</span></p>
                                        <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">500g
                                                par jour.</span></p>
                                        <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                                2024</span></p>
                                        <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span
                                                id="animal-details">Aucune blessure apparente,membres en bonne condition<br>
                                                Bien hydraté, pas de signe de stress ou d'anxiété apparents</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--card toucan-->

                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/assets/toucan.png" class="img-fluid rounded-start" alt="image d'un toucan">
                            <div class="action-image-buttons" data-show="admin">
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#EditionPhotoModal">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#DeletePhotoModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ramphastos</h5>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Race :</strong>C'est la plus grande espèce de toucan et se distingue par son énorme bec
                                        orange. On le trouve dans les forêts ouvertes et les savanes du centre et de l'est de l'Amérique
                                        du Sud.
                                    </li>
                                    <li><strong>Habitat :</strong>Les toucans habitent principalement les forêts tropicales et
                                        subtropicales humides.
                                        Ces forêts denses offrent une abondance de fruits, qui constituent l'essentiel de leur régime
                                        alimentaire.
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="animal-details hidden">
                            <!-- contenu des détails de l'animal-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title" id="animal-name"> toucan </h5>
                                        <div>
                                            <img src="/assets/toucan.png" class="card-img" alt="Image d'un toucan" id="animal-image">
                                            <div class="action-image-buttons" data-show="admin">
                                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                    data-bs-target="#EditionPhotoModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                    data-bs-target="#DeletePhotoModal">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <p class="card-text" id="animal-description">
                                        <ul>
                                            <li>Poids : 600g</li>
                                            <li>Plumage : Brillant et coloré, aucune plume manquante</li>
                                            <li>Bec : Solide et en bon état, pas de fissures</li>
                                            <li>Comportement : Actif et vocal, montre des comportements exploratoires normaux</li>
                                        </ul>
                                        </p>
                                        <p class="card-text"><strong>État:</strong> <span id="animal-state"> En bonne santé générale,
                                                plumage vif et intact.</span></p>
                                        <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food"> Fruits variés (papaye,
                                                mangue, banane), insectes (grillons, vers de farine), granulés spécialisés pour
                                                oiseaux.</span></p>
                                        <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">200g
                                                par jour.</span></p>
                                        <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                                2024</span></p>
                                        <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span
                                                id="animal-details">Excellente condition physique générale, recommandé de maintenir la
                                                diversité alimentaire pour assurer l'apport nutritionnel complet.
                                                <br> Pas de signes de stress ou d'anomalies comportementales.<br>
                                                Bonne musculature, pas de signes de blessures ou d'infections</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card paresseux-->

                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/assets/paresseux.png" class="img-fluid rounded-start" alt="image d'un parésseux">
                            <div class="action-image-buttons" data-show="admin">
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#EditionPhotoModal">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#DeletePhotoModal">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Bradypus</h5>
                                <p class="card-text">
                                <ul>
                                    <li><strong>Race :</strong>Les paresseux sont des mammifères fascinants connus pour leur
                                        comportement lent et leur mode de vie arboricole.
                                    </li>
                                    <li><strong>Habitat :</strong>Les paresseux sont principalement trouvés dans les forêts tropicales
                                        d'Amérique centrale et d'Amérique du Sud. Leur habitat naturel comprend les canopées des arbres où
                                        ils passent la majeure partie de leur vie.<br>
                                        Ils habitent également les forêts de plaine ainsi que les forêts de montagne.
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="animal-details hidden">
                            <!-- contenu des détails de l'animal-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title" id="animal-name"> Paresseux </h5>
                                        <div>
                                            <img src="/assets/paresseux.png" class="card-img" alt="Image d'un Paresseux" id="animal-image">
                                            <div class="action-image-buttons" data-show="admin">
                                                <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                    data-bs-target="#EditionPhotoModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                    data-bs-target="#DeletePhotoModal">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <p class="card-text" id="animal-description">
                                        <ul>
                                            <li>Poids : 4g</li>
                                            <li>Pelage : Duveteux, en bon état, sans parasites visibles</li>
                                            <li>Dents : En bon état, pas de caries ou d'usures anormales</li>
                                            <li>Comportement : Lent (normal pour l'espèce), mais réactif aux stimuli</li>
                                        </ul>
                                        </p>
                                        <p class="card-text"><strong>État:</strong> <span id="animal-state">En bonne santé générale, léger
                                                ralentissement de la motricité observé</span></p>
                                        <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food"> Feuilles variées
                                                (cécropia, figuier), fruits (pomme, poire), légumes (carottes, patates douces).</span></p>
                                        <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">300g
                                                par jour.</span></p>
                                        <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                                2024</span></p>
                                        <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">:
                                                Digestif en bon état, bon appétit. Hydratation adéquate. Recommandé de surveiller
                                                régulièrement pour éviter la déshydratation et les problèmes digestifs. Pas de signes de
                                                stress ou de maladies.
                                                <br> Pas de blessures apparentes, griffes en bon état.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </section>
    <section class="container">
        <!-- les animaux de la savane-->

        <h1 class="text-center ">Dévouvrez les animaux de la Savane !</h1>
        <div class="card">
            <div>
                <img src="/assets/Savane.png" class="card-img p-3" alt="image de la Savane">
                <div class="action-image-buttons" data-show="admin">
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                        data-bs-target="#EditionPhotoModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                        data-bs-target="#DeletePhotoModal">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
            <div class="card-body habitat">
                <h5 class="card-title ">Savane</h5>
                <p class="card-text">Tla savane est un lieu qui recrée l'écosystème de la savane de manière durable pour
                    abriter et exposer une diversité d'animaux. <br>
                    Il met l'accent sur la conservation,
                    l'éducation et la recherche, <br>tout en favorisant une observation respectueuse des animaux.</p>
                <p class="card-text"></p>
            </div>
            <!-- card lion  -->
            <div class="card ">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/lion.png" class="img-fluid rounded-start" alt="image d'un lion">
                        <div class="action-image-buttons" data-show="admin">
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#EditionPhotoModal">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#DeletePhotoModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Panthera leo</h5>
                            <p class="card-text ">
                            <ul>
                                <li><strong>Race :</strong>Les lions (Panthera leo) sont parmi les grands félins les plus
                                    emblématiques et reconnaissables au monde.<br>Cependant, il existe plusieurs sous-espèces de lions
                                    qui se distinguent par des différences géographiques, physiques et génétiques.
                                </li>
                                <li><strong>Habitat :</strong>Les lions vivent principalement dans les savanes et les prairies
                                    d'Afrique subsaharienne.
                                    Ces habitats ouverts leur offrent de vastes territoires de chasse et une abondance de
                                    proies.<br>On peut également trouver des lions dans les forêts ouvertes et les régions de
                                    bushveld, où la couverture végétale est moins dense.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <div class="animal-details hidden">
                        <!-- contenu des détails de l'animal-->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title" id="animal-name"> Lion </h5>
                                    <div>
                                        <img src="/assets/lion.png" class="card-img" alt="Image d'un Lion" id="animal-image">
                                        <div class="action-image-buttons" data-show="admin">
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#EditionPhotoModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#DeletePhotoModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="card-text" id="animal-description">
                                    <ul>
                                        <li>Poids : 190kg</li>
                                        <li>Pelage : Épais et en bon état, sans zones de perte de poils</li>
                                        <li>Dents : Usées mais en bon état pour son âge, pas de caries</li>
                                        <li>Comportement : Actif et vigilant, comportement territorial normal</li>
                                    </ul>
                                    </p>
                                    <p class="card-text"><strong>État:</strong> <span id="animal-state">En bonne santé générale, léger
                                            vieillissement observé.</span></p>
                                    <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food"> Viande de bœuf, poulet,
                                            lapin, supplément en taurine.</span></p>
                                    <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">7 kg
                                            par jour.</span></p>
                                    <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                            2024</span></p>
                                    <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">:
                                            Léger vieillissement observé dans la démarche, recommandé de surveiller les articulations et
                                            la mobilité. Pas de signes de maladie ou de stress. Maintenir une alimentation riche en
                                            protéines pour soutenir la masse musculaire.
                                            <br> Musculature bien développée, pas de blessures apparentes</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card éléphant-->

            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/elephant.png" class="img-fluid" alt="image d'un elephant">
                        <div class="action-image-buttons" data-show="admin">
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#EditionPhotoModal">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#DeletePhotoModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title ">Loxodonta</h5>
                            <p class="card-text">
                            <ul>
                                <li><strong>Race :</strong>les éléphants sont parmi les plus grands et les plus reconnaissables des
                                    mammifères terrestres, appartenant à la famille des éléphantidés.
                                </li>
                                <li><strong>Habitat :</strong>Ils habitent les savanes, les forêts et parfois les zones
                                    semi-désertiques d'Afrique.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <div class="animal-details hidden">
                        <!-- contenu des détails de l'animal-->
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-body">
                                    <h5 class="card-title" id="animal-name"> Elephant </h5>
                                    <div>
                                        <img src="/assets/elephant.png" class="card-img" alt="Image d'un Elephant" id="animal-image">
                                        <div class="action-image-buttons" data-show="admin">
                                            <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                data-bs-target="#EditionPhotoModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#DeletePhotoModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="card-text" id="animal-description">
                                    <ul>
                                        <li>Poids : 4000 kg</li>
                                        <li>Pelage : Peau épaisse, grise avec des plis profonds</li>
                                        <li>Dents : En bon état, Deux défenses, ainsi que plusieurs molaires</li>
                                        <li>Comportement : Social, intelligent, et souvent vu en troupeaux familiaux.</li>
                                    </ul>
                                    </p>
                                    <p class="card-text"><strong>État:</strong> <span id="animal-state"> Bon. Aucune maladie grave
                                            signalée.</span></p>
                                    <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food"> Herbe, feuilles, écorce,
                                            fruits, et parfois des racines</span></p>
                                    <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">150
                                            kg par jour.</span></p>
                                    <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                            2024</span></p>
                                    <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">: Sa
                                            peau est épaisse et résistante, sans lésions visibles. Les plis profonds sont caractéristiques
                                            mais ne montrent aucun signe d'infection. Ses défenses sont solides et bien entretenues.
                                            <br> Aucune anomalie n'a été observée lors de l'examen physique récent.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card guepard-->

            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/guepard.png" class="img-fluid" alt="image d'un guepard">
                        <div class="action-image-buttons" data-show="admin">
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#EditionPhotoModal">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#DeletePhotoModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Acinonyx jubatus</h5>
                            <p class="card-text">
                            <ul>
                                <li><strong>Race :</strong>Le guépard, également connu sous le nom d'Acinonyx jubatus, est un félin
                                    emblématique, célèbre pour sa vitesse exceptionnelle.
                                </li>
                                <li><strong>Habitat :</strong>l préfère les habitats ouverts tels que les savanes, les prairies et
                                    les zones semi-désertiques,
                                    où sa vitesse élevée est un avantage pour la chasse de proies rapides comme les gazelles et les
                                    antilopes.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <div class="animal-details hidden">
                        <!-- contenu des détails de l'animal-->
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-body">
                                    <h5 class="card-title" id="animal-name"> Guepard </h5>
                                    <div>
                                        <img src="/assets/guepard.png" class="card-img" alt="Image d'un Guepard" id="animal-image">
                                        <div class="action-image-buttons" data-show="admin">
                                            <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                data-bs-target="#EditionPhotoModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#DeletePhotoModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="card-text" id="animal-description">
                                    <ul>
                                        <li>Poids : 60 kg</li>
                                        <li>Pelage : Court et tacheté, de couleur fauve avec des taches noires.</li>
                                        <li>Dents : 30 dents, adaptées pour déchiqueter la viande.</li>
                                        <li>Comportement : Solitaire, chasseur diurne rapide et agile</li>
                                    </ul>
                                    </p>
                                    <p class="card-text"><strong>État:</strong> <span id="animal-state">Bon. Aucune blessure majeure
                                            ou maladie détectée.</span></p>
                                    <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food"> Principalement viande
                                            fraîche de proies comme les gazelles, les antilopes.</span></p>
                                    <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity"> 3
                                            kg par jour.</span></p>
                                    <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                            2024</span></p>
                                    <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">: Son
                                            pelage est brillant et en bon état, ce qui est crucial pour sa camouflage et ses chasse. Il
                                            n'y a pas de signes de parasites ou d'infections cutanées.
                                            <br>Aucune anomalie n'a été détectée lors de l'examen physique récent, et l'animal semble bien
                                            adapté à son environnement.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card zébre-->

            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/zebre.png" class="img-fluid" alt="image d'un zebre">
                        <div class="action-image-buttons" data-show="admin">
                            <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                data-bs-target="#EditionPhotoModal">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#DeletePhotoModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Equus quagga</h5>
                            <p class="card-text">
                            <ul>
                                <li><strong>Race :</strong>Le zèbre est un animal emblématique de la savane africaine, connu pour
                                    ses rayures distinctives et son comportement social.
                                </li>
                                <li><strong>Habitat :</strong>Les zèbres sont originaires d'Afrique subsaharienne et sont trouvés
                                    dans une variété d'habitats ouverts comme les savanes,
                                    les prairies et les steppes.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <div class="animal-details hidden">
                        <!-- contenu des détails de l'animal-->
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-body">
                                    <h5 class="card-title" id="animal-name"> Zébre </h5>
                                    <div>
                                        <img src="/assets/zebre.png" class="card-img" alt="Image d'un zebre" id="animal-image">
                                        <div class="action-image-buttons" data-show="admin">
                                            <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                data-bs-target="#EditionPhotoModal">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#DeletePhotoModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="card-text" id="animal-description">
                                    <ul>
                                        <li>Poids : 250 kg</li>
                                        <li>Pelage : Rayé de noir et blanc, motif distinctif pour le camouflage.</li>
                                        <li>Dents : En bon état, 36 dents, adaptées pour mâcher des herbes et des plantes.</li>
                                        <li>Comportement : Grégaire, vit en troupeaux et est vigilant contre les prédateurs.</li>
                                    </ul>
                                    </p>
                                    <p class="card-text"><strong>État:</strong> <span id="animal-state">Bon. Aucune blessure grave ou
                                            maladie rapportée.</span></p>
                                    <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food">Herbes, feuilles, écorce
                                            et parfois des fruits et des racines.</span></p>
                                    <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">10
                                            kg par jour.</span></p>
                                    <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                            2024</span></p>
                                    <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">: Son
                                            pelage rayé est bien entretenu, sans signes d'irritation cutanée ou de parasites visibles. Les
                                            dents sont en bon état, adaptées à son régime herbivore.
                                            <br> Aucune anomalie significative n'a été observée lors de l'examen physique.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <section>

        <!--les animaux du marais-->
        <div class="container">

            <div class="container">
                <h1 class="text-center">Dévouvrez les animaux du Marais !</h1>
                <div class="card ">
                    <div>
                        <img src="/assets/marais.png" class="card-img p-3" alt="image du Marais">
                        <div class="action-image-buttons" data-show="admin">
                            <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                data-bs-target="#EditionPhotoModal">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#DeletePhotoModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body habitat">
                        <h5 class="card-title ">Marais</h5>
                        <p class="card-text ">Le Marais est un habitat écologique typique des zones humides, caractérisé par une grande
                            diversité biologique.<br>
                            Il comprend des marécages, des étangs, des tourbières et des zones de végétation dense.<br>
                            Ces écosystèmes fournissent un habitat vital pour de nombreuses espèces de plantes et d'animaux.<br>
                            Le Marais agit également comme un important réservoir de biodiversité et contribue à la régulation du cycle de
                            l'eau et à la filtration des polluants.<br>
                            Sa préservation est essentielle pour maintenir l'équilibre écologique et protéger la vie sauvage..</p>
                        <p class="card-text"></p>
                    </div>

                    <div class=" contenaire">
                    </div>


                    <!-- card aligator  -->

                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/alligator.png" class="img-fluid" alt="image d'un aligator">
                                <div class="action-image-buttons" data-show="admin">
                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                        data-bs-target="#EditionPhotoModal">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                        data-bs-target="#DeletePhotoModal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title ">Alligator mississippiensis</h5>
                                    <p class="card-text ">
                                    <ul>
                                        <li><strong>Race :</strong>Les alligators sont des reptiles semi-aquatiques de grande taille appartenant
                                            à la famille des crocodiliens
                                        </li>
                                        <li><strong>Habitat :</strong>Les alligators américains se trouvent principalement dans les États du
                                            sud-est des États-Unis, notamment en Floride, en Louisiane, en Géorgie et en Caroline du Sud.
                                            Ils habitent les marécages, les rivières, les lacs, les étangs et les bayous.
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                            <div class="animal-details hidden">
                                <!-- contenu des détails de l'animal-->
                                <div class="col-md-6">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title" id="animal-name"> Aligator </h5>
                                            <div>
                                                <img src="/assets/alligator.png" class="card-img" alt="Image d'un Aligator" id="animal-image">
                                                <div class="action-image-buttons" data-show="admin">
                                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                        data-bs-target="#EditionPhotoModal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                        data-bs-target="#DeletePhotoModal">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <p class="card-text" id="animal-description">
                                            <ul>
                                                <li>Poids : 200 kg</li>
                                                <li>Pelage : Peau écailleuse, avec des écailles dorsales plus rugueuses.</li>
                                                <li>Dents : 74 dents, bien alignées et en bon état.</li>
                                                <li>Comportement : Solennel et territorial. Passé une grande partie de la journée à se prélasser au
                                                    soleil ou à nager lentement.</li>
                                            </ul>
                                            </p>
                                            <p class="card-text"><strong>État:</strong> <span id="animal-state">Bon. Aucun signe d'infection, de
                                                    blessure ou de déshydratation</span></p>
                                            <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food">Poissons, oiseaux, mammifères
                                                    aquatiques et parfois des petits mammifères terrestres.</span></p>
                                            <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">3 kg par
                                                    jour.</span></p>
                                            <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                                    2024</span></p>
                                            <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">: La peau
                                                    est en bon état, sans blessures ni parasites visibles. Les écailles sont lisses et bien
                                                    conservées, indiquant une bonne mue.
                                                    <br>L'appétit est bon et l'animal montre une bonne vitalité et activité.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card tortue -->
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/tortue.png" class="img-fluid" alt="image d'une tortue">
                                <div class="action-image-buttons" data-show="admin">
                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                        data-bs-target="#EditionPhotoModal">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                        data-bs-target="#DeletePhotoModal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Apalone spinifera</h5>
                                    <p class="card-text ">
                                    <ul>
                                        <li><strong>Race :</strong>La tortue Apalone spinifera, également connue sous le nom de tortue molle à
                                            éperons, est une espèce de tortue aquatique trouvée en Amérique du Nord.
                                        </li>
                                        <li><strong>Habitat :</strong>Elle préfère les eaux douces et peu profondes comme les étangs, les
                                            rivières lentes,
                                            les marais et les lacs avec un fond vaseux ou sablonneux où elle peut creuser des trous pour se
                                            cacher.
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                            <div class="animal-details hidden">
                                <!-- contenu des détails de l'animal-->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title" id="animal-name"> Tortue </h5>
                                            <div>
                                                <img src="/assets/tortue.png" class="card-img" alt="Image d'une Tortue" id="animal-image">
                                                <div class="action-image-buttons" data-show="admin">
                                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                        data-bs-target="#EditionPhotoModal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                        data-bs-target="#DeletePhotoModal">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <p class="card-text" id="animal-description">
                                            <ul>
                                                <li>Poids : 2.5g</li>
                                                <li>Pelage : Carapace plate et molle, de couleur brun-vert avec des motifs foncés.</li>
                                                <li>Dents : En bon état, Mâchoire munie de becs cornés</li>
                                                <li>Comportement : Aquatique, passe beaucoup de temps dans l'eau.
                                                    Se cache sous les rochers ou le sable.</li>
                                            </ul>
                                            </p>
                                            <p class="card-text"><strong>État:</strong> <span id="animal-state">Bon. Aucune blessure ou signe
                                                    d'infection détecté.</span></p>
                                            <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food">poissons, insectes
                                                    aquatiques</span></p>
                                            <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity"> 200 g
                                                    par jour.</span></p>
                                            <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                                    2024</span></p>
                                            <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">La
                                                    carapace est plate et souple, sans signes de fissures ni d'abrasions. Les motifs sur la carapace
                                                    sont distincts et bien définis.
                                                    Les yeux sont clairs et sans écoulement, indiquant une bonne santé oculaire.
                                                    <br>Aucun problème de déshydratation n'a été observé</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card heron bleu-->

                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/heron.png" class="img-fluid " alt="image d'un heron bleu">
                                <div class="action-image-buttons" data-show="admin">
                                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                        data-bs-target="#EditionPhotoModal">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                        data-bs-target="#DeletePhotoModal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Ardea herodias</h5>
                                    <p class="card-text">
                                    <ul>
                                        <li><strong>Race :</strong>Le héron bleu (Ardea herodias), également connu sous le nom de grand héron,
                                            est un grand échassier trouvé principalement en Amérique du Nord.
                                        </li>
                                        <li><strong>Habitat :</strong>Vit dans une variété de zones humides, y compris les marais,
                                            les bords de lacs, les rivières, les étangs et les estuaires.
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                            <div class="animal-details hidden">
                                <!-- contenu des détails de l'animal-->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title" id="animal-name"> Heron bleu </h5>
                                            <div>
                                                <img src="/assets/heron.png" class="card-img" alt="Image d'un Paresseux" id="animal-image">
                                                <div class="action-image-buttons" data-show="admin">
                                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                        data-bs-target="#EditionPhotoModal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                        data-bs-target="#DeletePhotoModal">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <p class="card-text" id="animal-description">
                                            <ul>
                                                <li>Poids : 2.3 kg</li>
                                                <li>Pelage : Plumes de couleur grise-bleue, longues et élégante</li>
                                                <li>Dents : bec long et pointu En bon état</li>
                                                <li>Comportement : Solitaire, souvent observé à guetter des poissons près de l'eau</li>
                                            </ul>
                                            </p>
                                            <p class="card-text"><strong>État:</strong> <span id="animal-state">Bon. Pas de signes de blessures
                                                    ou d'infections. Plumes en bon état.</span></p>
                                            <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food">Poissons, amphibiens,
                                                    petits mammifères et insectes.</span></p>
                                            <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity">300g
                                                    par jour.</span></p>
                                            <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                                    2024</span></p>
                                            <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">:
                                                    Aucune blessure ni infection détectée lors de l'examen physique. Les plumes sont en excellent
                                                    état, sans signes de mue anormale.
                                                    <br>Les yeux sont clairs et brillants, sans signes d'infection ou de maladie.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card grenouille-->

                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/assets/grenouille.png" class="img-fluid" alt="image d'une grenouille">
                                <div class="action-image-buttons" data-show="admin">
                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                        data-bs-target="#EditionPhotoModal">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-light t" data-bs-toggle="modal"
                                        data-bs-target="#DeletePhotoModal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Lithobates catesbeianus</h5>
                                    <p class="card-text">
                                    <ul>
                                        <li><strong>Race :</strong>La grenouille taureau américaine (Lithobates catesbeianus), aussi connue
                                            sous le nom de Rana catesbeiana,
                                            est une espèce de grenouille originaire d'Amérique du Nord.
                                        </li>
                                        <li><strong>Habitat :</strong>Les grenouilles taureaux préfèrent les habitats aquatiques tels que les
                                            étangs, les lacs, les marais,
                                            les fossés et les rivières à courant lent.
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                            <div class="animal-details hidden">
                                <!-- contenu des détails de l'animal-->

                                <div class="col-md-6">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title" id="animal-name"> Grenouille </h5>
                                            <div>
                                                <img src="/assets/grenouille.png" class="card-img" alt="Image d'une grenouille" id="animal-image">
                                                <div class="action-image-buttons" data-show="admin">
                                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                        data-bs-target="#EditionPhotoModal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-light " data-bs-toggle="modal"
                                                        data-bs-target="#DeletePhotoModal">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <p class="card-text" id="animal-description">
                                            <ul>
                                                <li>Poids : 80 g</li>
                                                <li>Pelage : La peau est lisse et humide</li>
                                                <li>Dents : Absence de dents</li>
                                                <li>Comportement : Actif et alerte, aime rester près de l'eau.</li>
                                            </ul>
                                            </p>
                                            <p class="card-text"><strong>État:</strong> <span id="animal-state">Bon. Pas de signes d'infection
                                                    ou de blessures. La peau est saine sans anomalies.</span></p>
                                            <p class="card-text"><strong>Nourriture:</strong> <span id="animal-food">Bon. Pas de signes
                                                    d'infection ou de blessures. La peau est saine sans anomalies.</span></p>
                                            <p class="card-text"><strong>Quantité de nourriture:</strong> <span id="animal-food-quantity"> 10
                                                    insectes par jour.</span></p>
                                            <p class="card-text"><strong>Dernier contrôle:</strong> <span id="animal-last-check"> 15 juin
                                                    2024</span></p>
                                            <p class="card-text"><strong>Détail de l'état de l'animal</strong> <span id="animal-details">: Elle
                                                    réagit bien aux stimuli et montre un comportement normal. La grenouille mange bien et ne
                                                    présente pas de signes de malnutrition.
                                                    <br>La grenouille est en bonne santé générale. Aucune anomalie observée lors de l'examen
                                                    physique.</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditionPhotoModal"
                        data-show="admin">Ajouter un habitat</button>

                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</section>

<!-- Modal Edition-->
<div class="modal fade" id="EditionPhotoModal" tabindex="-1" aria-labelledby="EditionPhotoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="EditionPhotoModalLabel">Edition Photo</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="NamePhotoInput" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="NamePhotoInput" name="Titre">
                    </div>
                    <div class="mb-3">
                        <label for="ImageInput" class="form-label">Image</label>
                        <input type="file" class="form-control" id="ImageInput" name="Image">
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal suppression-->
<div class="modal fade" id="DeletePhotoModal" tabindex="-1" aria-labelledby="DeletePhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="DeletePhotoModal">Etes-vous sur de vouloir supprimer cette photo</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                        <button type="button" class="btn btn-secondry" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
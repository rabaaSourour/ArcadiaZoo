<?php
session_start();
// Vérifie que l'utilisateur est connecté et a un rôle valide
if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['admin', 'veterinaire', 'employe'])) {
    header('Location: login.php');
    exit();
}

// Définition des rôles pour faciliter les conditions
$isAdmin = $_SESSION['role'] === 'admin';
$isVeterinaire = $_SESSION['role'] === 'veterinaire';
$isEmploye = $_SESSION['role'] === 'employe';

?>
<div class="container text-bg-secondary rounded mt-4">
    <div class="row">
        <!-- Pour l'Admin seulement -->
        <?php if ($isAdmin): ?>
            <!-- Card Animaux -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Gestion des Animaux :</h5>
                        <p class="card-text">Ajouter un nouvel animal au zoo.</p>
                        <a href="/animal/new" class="btn btn-primary">Accéder</a>
                        <p class="card-text">Modifier ou supprimer un animal au zoo.</p>
                        <a href="/animal/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>
            
            <!-- Card Habitats -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Habitats :</h5>
                        <p class="card-text">Ajouter un nouvel habitat au zoo.</p>
                        <a href="/habitat/new" class="btn btn-primary">Accéder</a>
                        <p class="card-text">Modifier ou supprimer un habitat au zoo.</p>
                        <a href="/habitat/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card Utilisateurs -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Gestion des Utilisateurs :</h5>
                        <p class="card-text">Créer un nouvel utilisateur.</p>
                        <a href="/user/new" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card Services -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Services :</h5>
                        <p class="card-text">Ajouter un nouveau service au zoo.</p>
                        <a href="/service/new" class="btn btn-primary">Accéder</a>
                        <p class="card-text">Modifier ou supprimer un service.</p>
                        <a href="/service/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card Horaires -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Horaires :</h5>
                        <p class="card-text">Configurer les horaires du zoo.</p>
                        <a href="/OpeningHours/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card Consultations des Animaux -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Consultations des Animaux :</h5>
                        <p class="card-text">Voir les animaux les plus consultés.</p>
                        <a href="#" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Pour le Vétérinaire seulement -->
        <?php if ($isVeterinaire): ?>
            <!-- Card Consultations et Comptes Rendus -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ajouter un rapport</h5>
                        <p class="card-text">Remplir les comptes rendus par animaux</p>
                        <a href="/report/new" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card Consultation de la nourriture -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Consulter la nourriture des animaux</h5>
                        <p class="card-text">Voir ce que l'animal a pu manger</p>
                        <a href="/food/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card pour Commentaire sur les habitats -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laisser un commentaire sur les habitats</h5>
                        <p class="card-text">Donner un avis sur l'état de l'habitat.</p>
                        <a href="/habitat/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Pour l'Employé seulement -->
        <?php if ($isEmploye): ?>
            <!-- Card Validation des Avis -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Avis :</h5>
                        <p class="card-text">Valider les nouveaux avis.</p>
                        <a href="/review/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card Gestion de la nourriture pour les animaux -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion de la nourriture</h5>
                        <p class="card-text">Nourrir les animaux</p>
                        <a href="/food/new" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>

            <!-- Card Gestion des Horaires -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Horaires :</h5>
                        <p class="card-text">Gérer les horaires d'ouverture.</p>
                        <a href="/OpeningHours/show" class="btn btn-primary">Accéder</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

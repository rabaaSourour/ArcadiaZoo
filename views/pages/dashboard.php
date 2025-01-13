<div class="container pt-4">
    <h2 class="text-center text-secondary p-3">Votre dashboard</h2>
    <div class="row">

        <!-- Pour l'Admin seulement -->
        <?php if ($role === 'admin'): ?>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-cogs"></i> Gestion du compte</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Changer votre mot de passe</strong>
                        <a href="/user/update" class="btn btn-sm"><i class="fas fa-key"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-users"></i> Gestion des comptes utilisateurs</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Voir tous les utilisateurs</strong>
                        <a href="/user/show" class="btn btn-sm"><i class="fas fa-eye"></i> Accéder</a>
                    </li>
                    <li>
                        <strong>Ajouter un nouvel utilisateur</strong>
                        <a href="/user/new" class="btn btn-sm"><i class="fas fa-user-plus"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-paw"></i> Gestion des animaux</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Ajouter un nouvel animal au zoo</strong>
                        <a href="/animal/new" class="btn btn-sm"><i class="fas fa-plus-circle"></i> Accéder</a>
                    </li>
                    <li>
                        <strong>Modifier ou supprimer un animal</strong>
                        <a href="/animal/show" class="btn btn-sm"><i class="fas fa-edit"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-home"></i> Gestion des habitats</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Ajouter un nouvel habitat</strong>
                        <a href="/habitat/new" class="btn btn-sm"><i class="fas fa-plus-square"></i> Accéder</a>
                    </li>
                    <li>
                        <strong>Modifier ou supprimer un habitat</strong>
                        <a href="/habitat/show" class="btn btn-sm"><i class="fas fa-edit"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-cogs"></i> Gestion des services</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Ajouter un nouveau service</strong>
                        <a href="/service/new" class="btn btn-sm"><i class="fas fa-plus-circle"></i> Accéder</a>
                    </li>
                    <li>
                        <strong>Modifier ou supprimer un service</strong>
                        <a href="/service/show" class="btn btn-sm"><i class="fas fa-edit"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-clock"></i> Gestion des horaires</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Configurer les horaires du zoo</strong>
                        <a href="/horaires/show" class="btn btn-sm"><i class="fas fa-calendar-alt"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-search"></i> Consultation des animaux</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Voir les animaux les plus consultés</strong>
                        <a href="/animalConsultation/show" class="btn btn-sm"><i class="fas fa-eye"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-utensils"></i> Consultation de la nourriture des animaux</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Voir ce que l'animal a mangé</strong>
                        <a href="/food/show" class="btn btn-sm"><i class="fas fa-apple-alt"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-notes-medical"></i> Consultation des rapports</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Voir les comptes rendus vétérinaires</strong>
                        <a href="/report/showAdmin" class="btn btn-sm"><i class="fas fa-stethoscope"></i> Accéder</a>
                    </li>
                </ul>
            </div>

        <?php endif; ?>

        <!-- Pour le Vétérinaire seulement -->
        <?php if ($role === 'veterinaire'): ?>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-user-md"></i> Gestion du compte</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Changer votre mot de passe</strong>
                        <a href="/user/update" class="btn btn-sm"><i class="fas fa-key"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-file-medical"></i> Ajouter un rapport</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Remplir les comptes rendus par animaux</strong>
                        <a href="/report/new" class="btn btn-sm"><i class="fas fa-pencil-alt"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-notes-medical"></i> Consultation des rapports</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Voir les comptes rendus vétérinaires</strong>
                        <a href="/report/showAdmin" class="btn btn-sm"><i class="fas fa-stethoscope"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-utensils"></i> Consulter la nourriture des animaux</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Voir ce que l'animal a mangé</strong>
                        <a href="/food/show" class="btn btn-sm"><i class="fas fa-apple-alt"></i> Accéder</a>
                    </li>
                </ul>
            </div>

        <?php endif; ?>

        <!-- Pour l'Employé seulement -->
        <?php if ($role === 'employe'): ?>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-cogs"></i> Gestion du compte</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Changer votre mot de passe</strong>
                        <a href="/user/update" class="btn btn-sm"><i class="fas fa-key"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-comment-dots"></i> Gestion des avis</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Valider les nouveaux avis</strong>
                        <a href="/review/pendingReviews" class="btn btn-sm"><i class="fas fa-check-circle"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-cogs"></i> Gestion des services</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Ajouter un nouveau service</strong>
                        <a href="/service/new" class="btn btn-sm"><i class="fas fa-plus-circle"></i> Accéder</a>
                    </li>
                    <li>
                        <strong>Modifier ou supprimer un service</strong>
                        <a href="/service/show" class="btn btn-sm"><i class="fas fa-edit"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-clock"></i> Gestion des horaires</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Configurer les horaires du zoo</strong>
                        <a href="/horaires/show" class="btn btn-sm"><i class="fas fa-calendar-alt"></i> Accéder</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 mb-4">
                <h3 class="text-primary"><i class="fas fa-utensils"></i> Consultation de la nourriture des animaux</h3>
                <ul class="list-unstyled">
                    <li>
                        <strong>Voir ce que l'animal a mangé</strong>
                        <a href="/food/show" class="btn btn-sm"><i class="fas fa-apple-alt"></i> Accéder</a>
                    </li>
                    <li>
                        <strong>Nourrir les animaux</strong>
                        <a href="/food/new" class="btn btn-sm"><i class="fas fa-apple-alt"></i> Accéder</a>
                    </li>
                </ul>
            </div>

        <?php endif; ?>

    </div>
</div>
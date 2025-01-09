<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">


    <title> Bienvenue à Arcadia</title>
</head>


<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home/show">Zoo Arcadia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item p-4">
                            <a class="nav-link" href="/home/show">Accueil</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="/habitat/show">Habitats</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="/contact/show">Contacts</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="/service/show">Services</a>
                        </li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="/Dashboard/show">Dashboard</a>
                        </li>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="/signin/logout">Déconnexion</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item p-4">
                            <a class="nav-link" href="/signin/login">Se connecter</a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item p-4">
                        <div class="toggle-container mt-4">
                <input type="checkbox" id="toggleVideo" />
                <label for="toggleVideo" class="toggle"></label>
            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <!-- Background Section -->
<div class="hero">
    <!-- Toggle Switch -->
    <video id="videoPlayer" autoplay muted loop>
        <source src="/public/asset/images/présentation zoo.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="overlay">
        <div class="text-center">
            <h1 class="display-3 fw-bold">Bienvenue à Zoo Arcadia</h1>
            <p class="text-white-50 lead">Explorez un monde magique où les animaux et la nature s'unissent.</p>
        </div>
    </div>
</div>


    </header>
    <!-- partie main de la page-->
    <main id="main-page">
        <?php include $page; ?>
    </main>

    <!-- debut de footer-->

    <footer class="text-clear text-center footer">
        <div class="row">
            <div class="col-md-4">
                <h3>Suivez-nous!</h3>
                <p>
                    <i class="bi bi-facebook" href=""></i>
                    <i class="bi bi-instagram" href=""></i>
                    <i class="bi bi-youtube" href=""></i>
                </p>
            </div>
            <div class="col-md-4">
                <h3><a href="/mentionsLegals/show">Mentions légals</a></h3>

            </div>
            <div class="col-md-4 ">
                <h3><a href="https://maps.app.goo.gl/QUUMWXavHFbUcWQJ9"><i class="bi bi-geo-alt"></i>Localisation</a></h3>
            </div>


        </div>
        <!--fin du footer-->
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js "></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
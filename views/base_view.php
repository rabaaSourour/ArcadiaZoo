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
        <!-- début du navbar-->

            <nav class="navbar navbar-expand-lg bg-dark"  data-bs-theme="dark">
                <div class="container-fluid">

                <a class="navbar-brand"><img width="100px" src="/ArcadiaZoo/public/asset/images/logo.png"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item p-4">

                        <a class="nav-link active" aria-current="pages" href="/ArcadiaZoo/views/pages/home.php">Acceuil</a>

                        </li>
                        <li class="nav-item p-4">

                        <a class="nav-link" href="/ArcadiaZoo/views/pages/habitat.php">Habitats</a>

                        </li>
                        <li class="nav-item p-4">

                        <a class="nav-link" href="/ArcadiaZoo/views/pages/contact.php">Contacts</a>

                        </li>
                        <li class="nav-item p-4">

                        <a class="nav-link" href="/ArcadiaZoo/views/pages/service.php">Services</a>

                        </li>

                        <li class="nav-item ms-auto p-2" data-show="disconnected">

                        <a class="nav-link" href="/ArcadiaZoo/views/pages/signin.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                        </svg>
                        </a>
                        </li>
                    <li class="nav-item" data-show="connected">
                        <button class="nav-link" id="signout-btn"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1z"/>
                            <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                        </svg>

                        </button>

                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        <!--fin du navbar-->
    
        </header>


        <!-- partie main de la page-->
        <main id="main-page">
            <?php include $page; ?>
        </main>

        <!-- debut de footer-->

        <footer class="bg-dark text-clear text-center footer">
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
                <h3 ><a href="/ArcadiaZoo/views/pages/Pages/mentionsLegals.php">Mentions légals</a></h3>

            </div>
            <div class="col-md-4 ">
                <h3><a href="https://maps.app.goo.gl/QUUMWXavHFbUcWQJ9"><i class="bi bi-geo-alt"></i>Localisation</a></h3>
            </div>

            </div>
            <!--fin du footer-->
        </footer>
        
        <script src ="https://code.jquery.com/jquery-3.7.1.min.js "></script>
        <script src="/ArcadiaZoo/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
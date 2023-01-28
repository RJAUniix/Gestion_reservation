<?php session_start(); ?>
        <meta charset="utf-8" />
        <title>À propos</title>
        <!--icon-->
        <link rel="icon" href="bootstrap-icons/geo-alt.svg" />
        

        <style>
                
            *, *::before, *::after{
                box-sizing: border-box;
                font-family: Century Gothic, sans-serif;
                font-weight: normal;
            }
         </style>

        <!-- BOOTSTRAP -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/bootstrap.bundle.min.js"></script>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
            <div class="container px-4 px-lg-5">
                <a class="logo" href="#"><img class="img-responsive" src="img/test2.png" alt="Logo Gestion des Réservations" width="50px"></a>
                <a class="navbar-brand" href="#">Gestion des réservations</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../accueil.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="reservations.php">Réservation</a></li>
                        <li class="nav-item"><a class="nav-link" href="chambre.php">Chambre</a></li>
                        <li class="nav-item"><a class="nav-link" href="Calendrier/Planning.php">Planning</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            À propos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="parametre.php">Paramètre</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout.php">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 

        <div class="container">
            <!-- Texte au centre -->
            <header class="masthead">
                <div class="container ">
                    <div class="row  gx-lg-5 h-100 align-items-center justify-content-center text-center">
                        <div class="col-lg-8 align-self-end">
                                    <h1 class="text-dark font-weight-bold">BONJOUR <?php echo strtoupper($_SESSION['nom']); ?> !</h1>
                            <hr class="divider" />
                        </div>
                        <div class="col-lg-5 align-items-center justify-content-center text-center">
                            <h3 class="mb-5">Cette application WEB permet de gerer les réservations de de l'Hôtel Bungalow Taleva</h3>
                            <h5>Version 1.0</h5>
                            <hr class="divider" />
                        </div>
                        <div class="small text-center text-muted">Copyright &copy; 2022 - RABESON Johanne Andréas</div>
        </div>
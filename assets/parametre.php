
        <meta charset="utf-8" />
        <title>Paramètre</title>
        <!--icon-->
        <link rel="icon" href="bootstrap-icons/geo-alt.svg" />
        

        <style>
                
            *, *::before, *::after{
                box-sizing: border-box;
                font-family: Century Gothic, sans-serif;
                font-weight: normal;
            }
            .btn {
                height: 80px;
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
                            Paramètre
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="apropos.php">À propos</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout.php">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 

        <div class="container-fluid p-5">
            <div class="row mt-5"></div>
            <div class="row mt-5">
                <div class="offset-3 col-lg-6 mt-5">
                        <a href="parametre_utilisateur.php"> <button class="btn btn-outline-info rounded-pill form-control">
                            <h2><img src="bootstrap-icons/person.svg" width="50px" align='left'/>Paramètre d'utilisateurs</h2>
                        </button></a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="offset-3 col-lg-6 mt-4">
                        <a href="liste_clients.php"> <button class="btn btn-outline-secondary rounded-pill form-control">
                            <h1><img src="bootstrap-icons/people.svg" width="50px" align='left'/>Listes des clients</h1>
                        </button> </a>
                </div>
            </div>
        </div>

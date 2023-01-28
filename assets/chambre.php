<?php 
session_start();

if (isset($_SESSION['idUtilisateur']) && isset($_SESSION['nom'])) {

?>
        
        
        <meta charset="utf-8" />
        <title>Chambre</title>
        <!--icon-->
        <link rel="icon" href="bootstrap-icons/geo-alt.svg" />
        <style>
                
            *, *::before, *::after{
                box-sizing: border-box;
                font-family: Century Gothic, sans-serif;
                font-weight: normal;
            }

            input {
                border-radius: 5px;
            }

            .card {
                border-radius: 50px;
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
                        <li class="nav-item"><a class="nav-link active" href="#">Chambre</a></li>
                        <li class="nav-item"><a class="nav-link" href="Calendrier/Planning.php">Planning</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Plus
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="apropos.php">À propos</a></li>
                                <li><a class="dropdown-item" href="parametre.php">Paramètre</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout.php">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
    <form action="reservation_par_chambre.php" method="POST">
        <div class="container p-5 mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body" align='center'>
                            <h5 class="card-title"><strong>Chambre 1</strong></h5>
                            <button 
                            type="submit" 
                            name="chambre"
                            value="1"
                            class="btn btn-primary btn-sm">Voir les réservations</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/2.jpg" class="card-img-top" alt="...">
                        <div class="card-body" align='center'>
                            <h5 class="card-title"><strong>Chambre 2</strong></h5>
                            <button 
                            type="submit"
                            name="chambre"
                            value="2"
                            class="btn btn-primary btn-sm">Voir les réservations</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/3.jpg" class="card-img-top" alt="...">
                        <div class="card-body" align='center'>
                            <h5 class="card-title"><strong>Chambre 3</strong></h5>
                            <button 
                            type="submit"
                            name="chambre"
                            value="3"
                            class="btn btn-primary btn-sm">Voir les réservations</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/4.jpg" class="card-img-top" alt="...">
                        <div class="card-body" align='center'>
                            <h5 class="card-title"><strong>Chambre 4</strong></h5>
                            <button 
                            type="submit"
                            name="chambre"
                            value="4"
                            class="btn btn-primary btn-sm">Voir les réservations</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/5.jpg" class="card-img-top" alt="...">
                        <div class="card-body" align='center'>
                            <h5 class="card-title"><strong>Chambre 5</strong></h5>
                            <button 
                            type="submit"
                            name="chambre"
                            value="5"
                            class="btn btn-primary btn-sm">Voir les réservations</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="img/6.jpg" class="card-img-top" alt="...">
                        <div class="card-body" align='center'>
                            <h5 class="card-title"><strong>Chambre 6</strong></h5>
                            <button 
                            type="submit"
                            name="chambre"
                            value="6"
                            class="btn btn-primary btn-sm">Voir les réservations</button>
                        </div>
                    </div>
                </div>
            </form>
            <form action="reservation_salle.php" method="POST">
                <div class="col">
                    <div class="card">
                        <img src="img/Taleva.jpg" class="card-img-top" alt="...">
                        <div class="card-body" align='center'>
                            <h5 class="card-title"><strong>Grande salle</strong></h5>
                            <button 
                            type="submit"
                            name="grande_salle"
                            value="grande salle"
                            class="btn btn-primary btn-sm">Voir les réservations</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>

<?php } 
else{
    header('location:../index.php');
}
?>
<?php 
session_start();

if (isset($_SESSION['idUtilisateur']) && isset($_SESSION['nom'])) {

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <!-- icon-->
        <link rel="icon" href="assets/bootstrap-icons/geo-alt.svg" />
        

        <style>
                
            *, *::before, *::after{
                box-sizing: border-box;
                font-family: Century Gothic, sans-serif;
                font-weight: normal;
            }

            body {
                background-image: url("assets/img/Taleva.jpg");
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
            }
            .card {
                opacity: 90%;
                width: 250px;
                height: 200px;
            }
            span {
                border-radius: 50px;
            }

        </style>

        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <script src="assets/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
            <div class="container px-4 px-lg-5">
            <a class="logo" href="accueil.php"><img class="img-responsive" src="assets/img/test2.png" alt="Logo Gestion des Réservations" width="50px"></a>
                <a class="navbar-brand" href="#">Gestion des Réservations</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="assets/reservations.php">Réservation</a></li>
                        <li class="nav-item"><a class="nav-link" href="assets/chambre.php">Chambre</a></li>
                        <li class="nav-item"><a class="nav-link" href="assets/Calendrier/Planning.php">Planning</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Plus
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="assets/apropos.php">À propos</a></li>
                                <li><a class="dropdown-item" href="assets/parametre.php">Paramètre</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
        
        <!-- les cards -->
        <div class="container p-5">
            <div class="row mt-5">
					<div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        include('config.inc.php');
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation ";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Total des Réservations</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/card-list.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>
                    
                    <div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body" position="center">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation WHERE idStatut=1";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Réservations validés</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/check-square.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation WHERE idStatut=3";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Réservations en attentes</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/clock.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation WHERE idStatut=2";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Réservations annulées</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/x-square.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        $date = date("%Y-%m");
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation WHERE dateReservation like '%".$date."%' ";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Réservations ce mois-ci</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/calendar-month.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        $date = date("%Y");
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation WHERE dateReservation like '%".$date."%' ";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Réservations cette années</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/archive.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation WHERE idType=1";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Réservations de chambre</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/house.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12 mb-5 mt-3">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
                                        <?php 
                                        $requete = "SELECT COUNT(idReservation) AS total FROM reservation WHERE idType=2";
                                        $resultat = mysqli_query($connexion,$requete);
                                        while($liste=mysqli_fetch_object($resultat)){
                                        ?>
										<h1 class="card_widget_header"><?php echo $liste->total; } ?></h1>
										<h6 class="text-muted">Réservations de salle</h6>
                                    </div>
                                        <img src="assets/bootstrap-icons/music-player.svg" width="60" height="60">
							    </div>
						    </div>
					    </div>
                    </div>

            </div>
        </div>

        <!-- Footer-->
        <footer class="bg-dark py-4">
            <div class="container px-4 px-lg-4"><div class="small text-center text-light">Copyright &copy; 2022 - RABESON Johanne Andréas</div></div>
        </footer>
    </body>
</html>
<?php } 
else{
    header('location:index.php');
}
?>
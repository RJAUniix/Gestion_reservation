<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    
    <!-- BOOTSTRAP -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
    <div id="container">

      <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3 mb-5">
          <div class="container px-4 px-lg-5">
              <a class="logo" href="#"><img class="img-responsive" src="../img/test2.png" alt="Logo Gestion des Réservations" width="50px"></a>
              <a class="navbar-brand" href="#">Gestion des réservations</a>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ms-auto my-2 my-lg-0">
                      <li class="nav-item"><a class="nav-link" href="../../accueil.php">Accueil</a></li>
                      <li class="nav-item"><a class="nav-link" href="../reservations.php">Réservation</a></li>
                      <li class="nav-item"><a class="nav-link" href="../chambre.php">Chambre</a></li>
                      <li class="nav-item"><a class="nav-link active" href="Planning.php">Planning</a></li>
                      <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Plus
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../apropos.php">À propos</a></li>
                                <li><a class="dropdown-item" href="../parametre.php">Paramètre</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../../logout.php">Déconnexion</a></li>
                            </ul>
                      </li>
                  </ul>
              </div>
          </div>
      </nav> 

      <div id="header">
        <div id="monthDisplay"></div>
        <div>
          <button class="btn btn-sm" id="backButton"><img src="../bootstrap-icons/arrow-left.svg" width="20px" height="20px"></button>
          <button class="btn btn-sm" id="nextButton"><img src="../bootstrap-icons/arrow-right.svg" width="20px" height="20px"></button>
        </div>
      </div>

      <div id="weekdays">
        <div>Dimanche</div>
        <div>Lundi</div>
        <div>Mardi</div>
        <div>Mercredi</div>
        <div>Jeudi</div>
        <div>Vendredi</div>
        <div>Samedi</div>
      </div>

      <div id="calendar"></div>
    </div>

    <div id="newEventModal">
      <h3>Nouvelle évènement</h3>

      <input id="eventTitleInput" placeholder="Titre de l'évènement" />

      <button class="btn btn-sm" id="saveButton">Enregistrer</button>
      <button class="btn btn-sm" id="cancelButton">Annuler</button>
    </div>

    <div id="deleteEventModal">
      <h3>Evènement</h3>

      <p id="eventText"></p>

      <button id="deleteButton">Effacer</button>
      <button id="closeButton">Fermer</button>
    </div>

    <div id="modalBackDrop"></div>

    <script src="./script.js"></script>
  </body>
</html>

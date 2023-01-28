<!-- insertion du statut -->
    
    <?php
    session_start();
    include('config.inc.php');

    if(isset($_POST['ok'])){
        $id = $_POST['ok'];
        $statut = $_POST['statut'];
        // Prendre l'id du statut de reservation
        $requete="SELECT *FROM statut WHERE statut_reservation='".$statut."' ";
        $resultat=mysqli_query($connexion,$requete);
        while ($liste = mysqli_fetch_object($resultat)){
            $idStatut = $liste->idStatut;
        }
        $requete = "UPDATE reservation SET idStatut=$idStatut WHERE idReservation=$id";
        $resultat=mysqli_query($connexion,$requete);
    }
    include ('reservations.php');
    ?>
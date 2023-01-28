<?php
include ('config.inc.php');
if (isset($_POST['supprimer'])){
    $id = $_POST['supprimer'];
    $requete = "DELETE FROM reservation WHERE idReservation=$id";
    mysqli_query($connexion,$requete);
}
include ('reservations.php');
?>
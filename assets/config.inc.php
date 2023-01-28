<?php
$hote="localhost";
$user="root";
$mdp="";
$base="gestion_reservation";
try{
    $connexion=mysqli_connect($hote,$user,$mdp,$base);
    $db=mysqli_select_db($connexion,'gestion_reservation');

}
catch (Exception $c) {
    echo "API non connecté";
    $c -> getMessage();
}
?>
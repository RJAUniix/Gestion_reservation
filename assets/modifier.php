<?php 
session_start(); 
include('config.inc.php');
if (isset($_SESSION['idUtilisateur']) && isset($_SESSION['nom'])) {

// Prendre les données
if(isset($_POST['modifier']) && preg_match("/^[a-zA-Z]+$/",$_POST['nom']) && preg_match("/^.+$/",$_POST['prenom']) && preg_match("/^[0-9]+$/",$_POST['telephone']) && isset($_POST['debut']) && isset($_POST['fin']) && isset($_POST['type_reservation']) && preg_match("/^[a-zA-Z]+$/",$_POST['nationalite']) && isset($_POST['statut']) && preg_match("/^[0-9]+$/",$_POST['cin']) ){
    $idReservation = $_POST['modifier'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['telephone'];
    $nationalite = $_POST['nationalite'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];;
    $statut = $_POST['statut'];
    $type = $_POST['type_reservation'];
    // $idUtilisateur = $_SESSION['idUtilisateur'];
    $date = date("%Y-%m-%d");
    $nbrPersonne = 1;
    $libellee = 'no comment';
    $cin = '0';
    $numChambre = 0;

    // Modification du cin
    if(isset($_POST['cin']) && $_POST['cin']!=''){
        $cin = $_POST['cin'];
    }
    // Modifier le numero de chambre
    if(isset($_POST['numero_chambre']) && $_POST['numero_chambre']!=''){
        $numChambre = $_POST['numero_chambre'];
    }
    // Modification du nbrPersonne
    if(isset($_POST['nbrPersonne']) && $_POST['nbrPersonne']!=''){
        $nbrPersonne = $_POST['nbrPersonne'];
    }
    // Modifier le libellee
    if(isset($_POST['libellee']) && $_POST['libellee']!=''){
        $libellee = $_POST['libellee'];
    }
    // Prendre l'id du type de reservation
    $requete="SELECT *FROM type_reservation";
    $resultat=mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_object($resultat)){
        if($type==$liste->Type){
            $idType=$liste->idType;
        }
    }
    // insertion du statut
        // Prendre l'id du statut de reservation
    $requete="SELECT *FROM statut WHERE statut_reservation='".$statut."'";
    $resultat=mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_object($resultat)){
        $idStatut = $liste->idStatut;
    }

    // Requette de modification
    // Dans la table reservation
    $requete = "UPDATE reservation SET idType=$idType,debutSejour='$debut',finSejour='$fin',idStatut=$idStatut,nbrPersonne=$nbrPersonne,libellee='$libellee',numChambre=$numChambre WHERE idReservation=".$idReservation."";
    mysqli_query($connexion,$requete);

    //Dans la table client
    // tester si le client existe déjà
    $test='';
    $requete = "SELECT *FROM client WHERE nomClient='".$nom."' AND prenomClient='".$prenom."'";
    $resultat = mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_object($resultat)){
        $test = $liste->nomClient;
    }
    // insertion dans Cient
    if($test==''){
        $requete = "INSERT INTO client (nomClient,prenomClient,telClient,nationalite,CIN) VALUES ('$nom','$prenom','$tel','$nationalite','$cin')";
        mysqli_query($connexion,$requete);
        
    }
    else { 
    // prendre l'id du client
    $requete = "SELECT idClient FROM reservation WHERE idReservation=".$idReservation."";
    $resultat = mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_array($resultat)){
        $idClient = $liste['idClient'];
    }

    $requete = "UPDATE client SET nomClient='$nom',prenomClient='$prenom',telClient='$tel',nationalite='$nationalite' WHERE idClient=".$idClient."";
    mysqli_query($connexion,$requete);
    }

    echo "<script>alert('Modification r\éussit avec success');</script>";

include ('reservations.php');

}
else if(isset($_POST['modifier1']) && preg_match("/^[a-zA-Z]+$/",$_POST['nom']) && preg_match("/^[a-zA-Z]+$/",$_POST['nomU']) ){
    $id = $_POST['modifier1'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $nomU = $_POST['nomU'];
    // Modifier les données dans la table receptionniste
    $requete = "UPDATE receptionniste SET nomRecep='$nom',prenomRecep='$prenom' WHERE idRecep=".$id."";
    mysqli_query($connexion,$requete);
    // Modifier le nom d'utilisateur
    $requete1 = "UPDATE utilisateurs SET nom='".$nomU."' WHERE idUtilisateur=".$id."";
    mysqli_query($connexion,$requete1);

    
    // mot de passe
    if(isset($_POST['mdpN']) && isset($_POST['mdpC']) && isset($_POST['mdpA'])){
        $id = $_POST['modifier1'];
        $mdpN = $_POST['mdpN'];
        $mdpC = $_POST['mdpC'];
        $mdpA = $_POST['mdpA'];
    }
    if(isset($mdpN) && isset($mdpC) && $mdpN == $mdpC && $mdpA == $_SESSION['mdp']){
    // Modifier le mot de passe
    $requete1 = "UPDATE utilisateurs SET mdp='".sha1($mdpC)."' WHERE idUtilisateur=".$id."";
    mysqli_query($connexion,$requete1);
    
    //notification
    echo "<script> alert('Opération reussit, deconnectez-vous pour voir les modifications'); </script>";
    header('location:parametre_utilisateur.php');
    }
}
// Gestion des erreurs
elseif (!isset($_POST['modifier1'])){ 
    if(!preg_match("/^[a-zA-Z]+$/",$_POST['nom']) && !isset($_POST['modifier1'])) {
        echo "<script> alert('Le nom inscrit n\'est pas valide, veuillez r\éessayer'); </script>";
        include ('affichageM.php');
    }
    else if(!preg_match("/^[0-9]+$/",$_POST['telephone']) && !isset($_POST['modifier1'])) {
        echo "<script> alert('Le numero inscrit n\'est pas valide, veuillez r\éessayer'); </script>";
        include ('affichageM.php');
    }
    else if(!preg_match("/^[0-9]+$/",$_POST['cin']) && !isset($_POST['modifier1'])) {
        echo "<script> alert('Le CIN inscrit n\'est pas valide, veuillez r\éessayer'); </script>";
        include ('affichageM.php');
    }
    else {
        echo "<script>alert('Enregistrement échoué, veuillez réessayer');</script>";
        include ('affichageM.php');
    }
}
else{ 
    //Paramètre d'utilisateur
    if(isset($_POST['modifier1']) && !preg_match("/^[a-zA-Z]+$/",$_POST['nomU'])){
        echo "<script> alert('Le d\'utilisateur n\'est pas valide, veuillez r\éessayer'); </script>";
        include ('parametre_utilisateur.php');
    }
    else if(isset($_POST['modifier1']) && !preg_match("/^[a-zA-Z]+$/",$_POST['nom'])) {
        echo "<script> alert('Le nom inscrit n\'est pas valide, veuillez r\éessayer'); </script>";
        include ('parametre_utilisateur.php');
    }
}

}
else{
    header('location:../index.php');
}
?>
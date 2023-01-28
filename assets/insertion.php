<script src="toast/toast.js"></script>
<link href="toast/toast.css" rel="stylesheets">
<?php
include ('config.inc.php');
session_start();

//initialisation
$nbrPersonne = 1;
$libellee = 'no comment';
$cin = '0';
$numChambre = 0;
$typeChambre = '';
$idTypeChambre = 0;
// Prendre les valeurs dans le pop up
if( preg_match("/^[a-zA-Z]+$/",$_POST['nom']) && preg_match("/^.+$/",$_POST['prenom']) && preg_match("/^[0-9]+$/",$_POST['telephone']) && isset($_POST['debut']) && isset($_POST['fin']) && isset($_POST['type_reservation']) && preg_match("/^[a-zA-Z]+$/",$_POST['nationalite']) && isset($_POST['statut']) && preg_match("/^[0-9]+$/",$_POST['cin']) ){ 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['telephone'];
    $nationalite = $_POST['nationalite'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];;
    $statut = $_POST['statut'];
    $type = $_POST['type_reservation'];
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $date = date("Y-m-d");
    $cin = $_POST['cin'];
    //Nom de l'utilisateur
    $idUtilisateur = $_SESSION['idUtilisateur'];

    // inserer le numero de chambre
    if(isset($_POST['numero_chambre']) && $_POST['numero_chambre']!=''){
        $numChambre = $_POST['numero_chambre'];
    }
     // insertion du nbrPersonne
     if(isset($_POST['nbrPersonne']) && $_POST['nbrPersonne']!=''){
        $nbrPersonne = $_POST['nbrPersonne'];
    }
    // insertion du libellee
    if(isset($_POST['libellee']) && $_POST['libellee']!=''){
        $libellee = $_POST['libellee'];
    }
    // insertion du type de chambre
    if(isset($_POST['type_chambre']) && $_POST['type_chambre']!=''){
        $type_chambre = $_POST['type_chambre'];
        $requete = "SELECT idTypeChambre FROM type_chambre WHERE type_chambre='".$type_chambre."' ";
        $resultat = mysqli_query($connexion,$requete);
        while($liste = mysqli_fetch_object($resultat)){
            $idTypeChambre = $liste->idTypeChambre;
        }
    }

    // tester si le client existe déjà
    $test='';
    $requete = "SELECT *FROM client WHERE nomClient='$nom' AND prenomClient='$prenom'";
    $resultat = mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_object($resultat)){
        $test = $liste->nomClient;
    }
    // insertion dans Cient
    if($test==''){
        $requete = "INSERT INTO client (nomClient,prenomClient,telClient,nationalite,CIN) VALUES ('$nom','$prenom','$tel','$nationalite','$cin')";
        mysqli_query($connexion,$requete);
        
        // prendre l'id du client
        $requete = "SELECT MAX(idClient) AS max FROM client";
        $resultat = mysqli_query($connexion,$requete);
        while ($liste = mysqli_fetch_array($resultat)){
            $idClient = $liste['max'];
        }
    }
    else{
        $requete = "SELECT idClient FROM client WHERE nomClient='$nom' AND prenomClient='$prenom'";
        $resultat = mysqli_query($connexion,$requete);
        while ($liste = mysqli_fetch_object($resultat)){
            $idClient = $liste->idClient;
        }
    }

    // insertion du statut
        // Prendre l'id du statut de reservation
    if(isset($statut) && $statut!=''){
        if($statut=="VALIDEE"){
            $idStatut = 1;
        }
        else{
            $idStatut = 3;
        }
    }
    // Prendre l'id du type de reservation
    $requete="SELECT *FROM type_reservation";
    $resultat=mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_object($resultat)){
        if($type==$liste->Type){
            $idType=$liste->idType;
        }
    }
    
    // Insertion des valeurs dans la base
    $requete = "INSERT INTO reservation (idType,debutSejour,finSejour,idStatut,dateReservation,nbrPersonne,libellee,idUtilisateur,idClient,numChambre,idTypeChambre) VALUES ('$idType','$debut','$fin',$idStatut,'$date','$nbrPersonne','$libellee',$idUtilisateur,$idClient,$numChambre,$idTypeChambre)";
    mysqli_query($connexion,$requete);

    //notification
    echo "<script>alert('enregistrement éffectué avec success');</script>";
}
// Gestion des erreurs
else if(!preg_match("/^[a-zA-Z]+$/",$_POST['nom'])) {
    echo "<script> alert('Le nom inscrit n\'est pas valide, veuillez r\éessayer'); </script>";
}
else if(!preg_match("/^[0-9]+$/",$_POST['telephone'])) {
    echo "<script> alert('Le numero inscrit n\'est pas valide, veuillez r\éessayer'); </script>";
}
else if(!preg_match("/^[0-9]+$/",$_POST['cin'])) {
    echo "<script> alert('Le cin inscrit n\'est pas valide, veuillez r\éessayer'); </script>";
}
else {
    echo "<script>alert('Enregistrement échoué, veuillez réessayer');</script>";
}
include ('reservations.php');
?>
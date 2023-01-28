<?php
include("config.inc.php");
if(preg_match("/^[a-zA-Z]+$/",$_POST['nom'])  && preg_match("/^.+$/",$_POST['prenom']) && preg_match("/^[0-9]+$/",$_POST['tel']) && preg_match("/^[a-zA-Z]+$/",$_POST['uname']) && preg_match("/^[a-zA-Z0-9]+$/",$_POST['password'])){
$nom = $_POST['nom'];
$prenom = htmlspecialchars($_POST['prenom']);
$tel = $_POST['tel'];
$uname = $_POST['uname'];
//Crypter le mdp
$mdp = sha1($_POST['password']);

if($uname!='' && $mdp!=''){
    $requete = "INSERT INTO utilisateurs SET nom='".$uname."',mdp='".$mdp."',date='".date("Y-m-d")."' ";
    mysqli_query($connexion,$requete);

    //prendre l'id le l'utilisateur
    $requete = "SELECT MAX(idUtilisateur) AS max FROM utilisateurs";
    $resultat = mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_object($resultat)){
        $idU = $liste->max;
    }
    
    //prendre l'id du receptionniste
    $requete = "SELECT MAX(idRecep) AS max FROM receptionniste";
    $resultat = mysqli_query($connexion,$requete);
    while ($liste = mysqli_fetch_object($resultat)){
        $idR = $liste->max;
    }

    if($nom!='' && $prenom!='' && $tel!=''){
        $requete = "INSERT INTO receptionniste SET idRecep='".$idR."',nomRecep='".$nom."',prenomRecep='".$prenom."',telReceptionniste='".$tel."',idUtilisateur='".$idU."' ";
        echo $requete;
        mysqli_query($connexion,$requete);
    }

    echo "<script type='text/javascript'> alert('Inscription réussite, vous pouvez vous identifier'); </script>";
}
else if(!(preg_match("/^[a-zA-Z]+$/",$_POST['nom'])) ){
    header("Location: inscription.php?error=Le nom n'est pas valide");
    header("Location: inscription.php?nom.value='".$nom."'");
}
else if(!(preg_match("/^.+$/",$_POST['prenom'])) ){
    header("Location: inscription.php?error=Le prenom n'est pas valide");
}
else if(!(preg_match("/^[0-9]+$/",$_POST['tel'])) ){
    header("Location: inscription.php?error=Le numéro n'est pas valide");
}
else if(!(preg_match("/[a-zA-Z]/",$_POST['uname'])) ) {
    header("Location: inscription.php?error=Le nom d'utilisateur n'est pas valide");
}
else if(!(preg_match("/^[a-zA-Z0-9]+$/",$_POST['password'])) ){
    header("Location: inscription.php?error=Le mot de passe n'est pas valide");
}
else {
    header("Location: inscription.php?error=Une erreur s'est produite, veuillez réessayer");
}

include("index.php");
}
?>
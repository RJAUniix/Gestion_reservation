<?php 
session_start(); 
include "config.inc.php";

if (preg_match("/^[a-zA-Z]+$/",$_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	// sécuriser les uname et décrypter le mdp
	$uname = validate($_POST['uname']);
	$pass = sha1($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Inserer votre nom d'utilisateur");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Inserer votre mot de pass");
	    exit();
	}else{
		$sql = "SELECT * FROM utilisateurs WHERE nom='$uname' AND mdp='$pass'";
		$result = mysqli_query($connexion, $sql);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
            if ($row['nom'] === $uname && $row['mdp'] === $pass) {
            	$_SESSION['nom'] = $row['nom'];
            	$_SESSION['idUtilisateur'] = $row['idUtilisateur'];
            	$_SESSION['mdp'] = $row['mdp'];
            	header("Location: accueil.php");
		        exit();
            }else{
				header("Location: index.php?error=Le nom d'utilisateur ou le mot de passe est incorrect");
		        exit();
			}
		}
		else{
			header("Location: index.php?error=Le nom d'utilisateur ou le mot de passe est incorrecte");
			exit();
		}
	}
}else{
	header("Location: index.php?error=Le nom d'utilisateur ou le mot de passe n'est pas valide");
	exit();
}
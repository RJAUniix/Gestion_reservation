<?php

$hote= "localhost";
$user= "root";
$mdp = "";

$db = "gestion_reservation";

$connexion = mysqli_connect($hote, $user, $mdp, $db);

if (!$connexion) {
	echo "Connection failed!";
}
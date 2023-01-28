<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
        form {
            padding: 10px;
        }
    </style>
</head>
<body>
     <form action="inscrire.php" method="post">
        <a class="text" href="index.php"> <img src="assets/bootstrap-icons/arrow-left-circle.svg" width="40px" class='mt-3'> </a>
        <h2>Inscription</h2>

        <?php if (isset($_GET['error'])) { ?>

     		<p class="error"><?php echo $_GET['error']; ?></p>

     	<?php } ?>

        <label>Nom :</label>
     	<input 
        type="text" 
        name="nom" 
        class="nom"
        required="required"
        autocomplete="off" 
        placeholder="Inserer votre nom"><br>

        <label>Prénom(s) :</label>
     	<input 
        type="text" 
        name="prenom" 
        required="required"
        autocomplete="off" 
        placeholder="Inserer votre prénom"><br>

        <label>Téléphone :</label>
     	<input 
        type="text" 
        name="tel" 
        required="required"
        autocomplete="off" 
        placeholder="Votre numéro"><br>

     	<label>Nom d'utilisateur</label>
     	<input 
        type="text" 
        name="uname" 
        required="required"
        autocomplete="off" 
        placeholder="Nom d'utilisateur"><br>

     	<label>Mot de passe</label>
     	<input 
        type="password" 
        name="password" 
        required="required"
        placeholder="Mot de passe"><br>

     	<button type="submit">S'inscrire</button>
     </form>
</body>
</html>


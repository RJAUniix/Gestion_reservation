<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>S'identifier</h2>

     	<?php if (isset($_GET['error'])) { ?>

     		<p class="error"><?php echo $_GET['error']; ?></p>

     	<?php } ?>

     	<label>Nom d'utilisateur</label>
     	<input type="text" name="uname" autocomplete="off" placeholder="Nom d'utilisateur"><br>

     	<label>Mot de passe</label>
     	<input type="password" name="password" placeholder="Mot de passe"><br>

		<label position="left"><a class="text" href="inscription.php">S'inscrire</a></label>
     	<button type="submit">Se connecter</button>
     </form>
</body>
</html>
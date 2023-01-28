<?php
session_start();
if (isset($_SESSION['idUtilisateur']) && isset($_SESSION['nom'])) {
?>
<meta charset="utf-8" />
        <title>Parametre d'utilisateur</title>
        <!--icon-->
        <link rel="icon" href="bootstrap-icons/geo-alt.svg" />
        

        <style>
                
            *, *::before, *::after{
                box-sizing: border-box;
                font-family: Century Gothic, sans-serif;
                font-weight: normal;
            }

        </style>

        <!-- BOOTSTRAP -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/bootstrap.bundle.min.js"></script>

        
        
            <div class="container">   
                <form method="POST" action="modifier.php">
                <a href="parametre.php"> <img src="bootstrap-icons/arrow-left-circle.svg" width="40px" class='mt-3'> </a>
                    <div class="row">
                        <h2 align="center"><u> Paramètre de l'utilisateurs </u></h2>
                        <div class="offset-2 col-lg-4">
                            <h5 align="center"  class='mt-5 mb-4'>Modifier vos données personnelles </h5>
                                <label for="nom">Nom :</label>
                                    <?php 
                                    include('config.inc.php');
                                    $requete = "SELECT *FROM receptionniste WHERE idUtilisateur=".$_SESSION['idUtilisateur']." ";
                                    $resultat = mysqli_query($connexion,$requete);
                                    while ($liste=mysqli_fetch_object($resultat)){

                                    
                                    ?>
                                        <input 
                                        class="form-control mb-3" 
                                        name="nom"
                                        value="<?php echo $liste->nomRecep; ?>"
                                        autocomplete="off">
                                <label for="prenom">Prénoms :</label>
                                        <input 
                                        class="form-control mb-3" 
                                        name="prenom"
                                        value="<?php echo $liste->prenomRecep; ?>"
                                        autocomplete="off">
                                <label for="nomU">Nom de l'utilisateur :</label>
                                        <input 
                                        class="form-control mb-3" 
                                        name="nomU"
                                        value="<?php echo $_SESSION['nom']; ?>"
                                        autocomplete="off">
                                <?php 
                                }
                                ?>
                        </div>
                        
                        <div class="col-lg-4">
                            <h5 align="center" class='mt-5 mb-4'>Modifier votre mot de passe </h5>
                                <label>Mot de passe actuel :</label>
                                        <input 
                                        class="form-control mb-3" 
                                        name="mdpA"
                                        placeholder="inserer le mot de pass actuel"
                                        type="password"
                                        autocomplete="off"/>
                                <label>Nouveau mot de passe :</label>
                                        <input 
                                        class="form-control mb-3" 
                                        name="mdpN"
                                        placeholder="saisissez un nouveau mot de pass"
                                        type="password"
                                        autocomplete="off"/>
                                <label for="nom">Confirmer le mot de passe :</label>
                                        <input 
                                        class="form-control mb-3" 
                                        name="mdpC"
                                        placeholder="ré-inserer le nouveau mot de pass"
                                        type="password"
                                        autocomplete="off"/>
                        </div>

                        <div class="offset-4 col-lg-4">
                                <button 
                                type="submit" 
                                name="modifier1"
                                value="<?php echo $_SESSION['idUtilisateur']; ?>"
                                class="btn btn-outline-success form-control">Modifier</button>
                        </div>
                </form>
            </div>
        </div>
<?php
}
?>
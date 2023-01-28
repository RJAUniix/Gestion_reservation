<?php 
session_start();

if (isset($_SESSION['idUtilisateur']) && isset($_SESSION['nom'])) {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8" />
            <title>Réservations</title>
            
            <meta http-equiv="content-script-type" content="text/javascript"/>
            <!--icon-->
            <link rel="icon" href="bootstrap-icons/geo-alt.svg" />
            
            <!-- Toast -->
            <link href="toast/toast.css" rel="stylesheets">

            <style>
                    
                *, *::before, *::after{
                    box-sizing: border-box;
                    font-family: Century Gothic, sans-serif;
                    font-weight: normal;
                }

                input {
                    border-radius: 5px;
                }

            </style>
    </head>

<body>
        <!-- toast -->
        <script src="toast/toast.js" content="text/javascript"></script>
        <!-- BOOTSTRAP -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/bootstrap.bundle.min.js"></script>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
            <div class="container px-4 px-lg-5">
                <a class="logo" href="#"><img class="img-responsive" src="img/test2.png" alt="Logo Gestion des Réservations" width="50px"></a>
                <a class="navbar-brand" href="#">Gestion des réservations</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../accueil.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#">Réservation</a></li>
                        <li class="nav-item"><a class="nav-link" href="chambre.php">Chambre</a></li>
                        <li class="nav-item"><a class="nav-link" href="Calendrier/Planning.php">Planning</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Plus
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="apropos.php">À propos</a></li>
                                <li><a class="dropdown-item" href="parametre.php">Paramètre</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../logout.php">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
    <!-- Boutton d'affichage -->
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-6 mt-5 mb-4">
                    <button class="btn btn-outline-success rounded-pill " data-bs-toggle="modal" data-bs-target="#insertion">
                        <img src="bootstrap-icons/plus.svg" width="30px"/>Nouvelle réservation
                    </button>
            </div>
            
            <div class="offset-2 col-lg-3 mt-5 me-5">
                    <form method="POST" action="reservations.php" class="d-flex">
                        <input 
                        class="form-control me-2 " 
                        type="search" 
                        placeholder="Rechercher ici"
                        autocomplete="off"
                        name="recherche">
                        <button class="btn btn-outline-warning" type="submit"><img src="bootstrap-icons/search.svg" width="20px"> </button>
                    </form>
            </div>
    <!-- Liste des réservations -->
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover table-dark">
                            <thead>
                                <tr align='center'>
                                    <th>#</th>
                                    <th>Nom et prenoms</th>
                                    <th>Date de reservation</th>
                                    <th>Statuts</th>
                                    <th>Assignée par</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody align='center'>
                                <?php
                                include ('config.inc.php');
                                if(isset($_POST['recherche']) && $_POST['recherche']!=''){
                                    $requete = "SELECT *FROM reservation INNER JOIN utilisateurs ON(reservation.idUtilisateur=utilisateurs.idUtilisateur) INNER JOIN statut ON(reservation.idStatut=statut.idStatut) INNER JOIN  client ON(reservation.idClient=client.idClient) WHERE CONCAT(client.nomClient,client.prenomClient,reservation.dateReservation,utilisateurs.nom) like'%".$_POST['recherche']."%' ORDER BY dateReservation DESC";
                                    $resultat = mysqli_query($connexion,$requete);
                                }
                                else 
                                {
                                    $requete = "SELECT *FROM reservation INNER JOIN utilisateurs ON(reservation.idUtilisateur=utilisateurs.idUtilisateur) INNER JOIN client ON(reservation.idClient=client.idClient) INNER JOIN statut ON(reservation.idStatut=statut.idStatut) ORDER BY dateReservation DESC";
                                    $resultat = mysqli_query($connexion,$requete);
                                }
                                $i=1;
                                while ($liste = mysqli_fetch_object($resultat)){ ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $liste->nomClient." ".$liste->prenomClient; ?></td>
                                            <td><?php echo $liste->dateReservation; ?></td>
                                            <td>
                                            <?php 
                                                if($liste->idStatut != 3){
                                                    if($liste->idStatut == 1){
                                                        echo '<span class="badge rounded-pill bg-success">'.$liste->statut_reservation.'</span>'; }
                                                    else{
                                                        echo '<span class="badge rounded-pill bg-danger">'.$liste->statut_reservation.'</span>'; }
                                                }
                                                else{
                                            ?>
                                                <form method='POST' action='insertionStatut.php'>
                                                    <select 
                                                        name="statut" 
                                                        class="form" >
                                                            <option><?php 
                                                            $idStatut = $liste->idStatut;
                                                            echo $liste->statut_reservation ; ?></option>
                                                            <?php
                                                            $requete2="SELECT *FROM statut WHERE idStatut <> ".$idStatut." ";
                                                            $resultat1=mysqli_query($connexion,$requete2);
                                                            while ($liste2 = mysqli_fetch_object($resultat1)) { ?>
                                                                <option> <?php echo $liste2->statut_reservation; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                    </select>
                                                    <button name="ok" value="<?php echo $liste->idReservation; ?>" class='btn btn-sm btn-secondary'>OK</button>
                                                </form>
                                            <?php 
                                            }
                                            ?>
                                            </td>
                                            <td><?php print($liste->nom); ?></td>
                                            <td>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <form method='POST' action='supprimer.php'>
                                                                <button 
                                                                type='submit' 
                                                                name='supprimer' 
                                                                class='btn btn-sm btn-danger' 
                                                                value="<?php echo $liste->idReservation;?>" 
                                                                >Supprimer</button>
                                                        </form>
                                                    </div>

                                                    <div class='col-lg-4'>
                                                        <form method='POST' action="affichageM.php">
                                                                <button 
                                                                class='modifier btn btn-sm btn-info' 
                                                                name="modifier"
                                                                value="<?php echo $liste->idReservation;?>"
                                                                type='submit' 
                                                                >
                                                                Modififier</button>
                                                        </form>
                                                    </div>
                                                    
                                                    <div class='col-lg-4'>
                                                        <form method='POST' action="voirplus.php">
                                                            <button  
                                                                    value="<?php echo $liste->idReservation;?>"
                                                                    name="voirplus"
                                                                    class='voirplus btn btn-sm btn-warning' 
                                                                    >
                                                                    Voir plus</button>
                                                        </form>    
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    $i++;
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- ############################################################################################################################# -->

    <!-- Modal insertion -->
    <div class="modal fade" id="insertion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Entrer une nouvelle réservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>               
                <form method="POST" action="insertion.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nom">Nom du client :</label>
                                            <input type="text"  
                                            class="form-control" 
                                            type="text"
                                            name="nom" 
                                            autocomplete="off"
                                            required='required'
                                            placeholder="inserer un nom">
                                </div>

                                <div class="form-group  mt-2">
                                    <label for="prenom">Prénom(s) du client :</label>
                                            <input 
                                                class="form-control"
                                                type="text"  
                                                name="prenom" 
                                                autocomplete="off"
                                                placeholder="prénom(s)">
                                </div>

                                <div class="form-group mt-2">
                                    <label>Type de réservation :</label>
                                        <select 
                                        name="type_reservation" 
                                        required='required'
                                        class="form-control" 
                                        id="type_reservation">
                                            <?php
                                            include('config.inc.php');
                                            $requete="SELECT *FROM type_reservation";
                                            $resultat=mysqli_query($connexion,$requete);
                                            while ($liste = mysqli_fetch_array($resultat)){ ?>
                                                
                                                <option> <?php echo $liste['Type']; ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                </div>  

                                <div class="form-group mt-2">
                                    <label for="telephone">Telephone du client:</label>
                                        <input class="form-control" 
                                                type="text"
                                                name="telephone" 
                                                autocomplete="off"
                                                required='required'
                                                placeholder="Numéro du client">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="nationalite">Nationalité du client:</label>
                                        <input class="form-control" 
                                                type="text"
                                                name="nationalite" 
                                                autocomplete="off"
                                                placeholder="Nationalité">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="cin">CIN du client:</label>
                                        <input class="form-control" 
                                                type="text"
                                                name="cin" 
                                                autocomplete="off"
                                                placeholder="CIN du client">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="debut">Debut de séjour :</label>
                                            <input 
                                                    class="form-control"
                                                    type="date"  
                                                    name="debut"
                                                    required='required' 
                                                    placeholder="début de séjour">
                                </div>      

                                <div class="form-group mt-2">
                                    <label for="debut">Fin de séjour :</label>
                                            <input 
                                                    class="form-control"
                                                    type="date"  
                                                    name="fin" 
                                                    required='required'
                                                    placeholder="fin de séjour">
                                </div>               
                                            
                                <div class="form-group mt-2">
                                    <label for="statut1">Statut :</label>
                                        <select 
                                            name="statut" 
                                            class="form-control mb-2" >
                                                <?php
                                                include('config.inc.php');
                                                $requete="SELECT *FROM statut";
                                                $resultat=mysqli_query($connexion,$requete);
                                                while ($liste = mysqli_fetch_array($resultat)){ ?>
                                                    
                                                    <option> <?php echo $liste['statut_reservation']; ?></option>

                                                <?php
                                                }
                                                ?>
                                        </select>
                                </div>  
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="numero_chambre">Numéro de chambre :</label>
                                            <select 
                                                name="numero_chambre"
                                                class="form-control" 
                                                id="numero_chambre">
                                                <option></option>
                                                <?php
                                                include('config.inc.php');
                                                $requete="SELECT *FROM chambre";
                                                $resultat=mysqli_query($connexion,$requete);
                                                while ($liste = mysqli_fetch_array($resultat)){ ?>
                                                    
                                                    <option> <?php echo $liste['numChambre']; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select> 
                                    </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                                <label for="type_chambre">Type de chambre :</label>
                                                    <select 
                                                        name="type_chambre"
                                                        class="form-control" 
                                                        id="type_chambre">
                                                        <option></option>
                                                        <?php
                                                        include('config.inc.php');
                                                        $requete="SELECT *FROM type_chambre";
                                                        $resultat=mysqli_query($connexion,$requete);
                                                        while ($liste = mysqli_fetch_array($resultat)){ ?>
                                                            
                                                            <option> <?php echo $liste['type_chambre']; ?></option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select> 
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="nbrPersonne">Nombre de personne :</label></br>
                                            <input 
                                                    class="form-control"
                                                    type="integer"  
                                                    name="nbrPersonne" 
                                                    autocomplete="off"
                                                    placeholder="nombre de personne">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="libellee">Libellée :</label></br>
                                    <textarea name="libellee" class="form-control"></textarea>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php } 
else{
    header('location:../index.php');
}
?>
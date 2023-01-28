<meta charset="utf-8" />
        <title>Voir plus</title>
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
                <a href="reservations.php"> <img src="bootstrap-icons/arrow-left-circle.svg" width="40px" class='mt-3'> </a>
                    <div class="row">
                    <?php 
                        include('config.inc.php');
                        if(isset($_POST['voirplus'])){
                            $idReservation = $_POST['voirplus'];
                            //prendre l'idTypeChambre
                            $requete ="SELECT idTypeChambre FROM reservation WHERE idReservation=".$idReservation." ";
                            $resultat = mysqli_query($connexion,$requete);
                            while ($liste=mysqli_fetch_object($resultat)){
                                $idTypeChambre = $liste->idTypeChambre;
                            }

                            if($idTypeChambre != 0){
                            $requete = "SELECT *FROM reservation INNER JOIN utilisateurs ON(reservation.idUtilisateur=utilisateurs.idUtilisateur) INNER JOIN type_reservation ON(reservation.idType=type_reservation.idType) INNER JOIN type_chambre ON(reservation.idTypeChambre=type_chambre.idTypeChambre) INNER JOIN statut ON(reservation.idStatut=statut.idStatut) INNER JOIN client ON(reservation.idClient=client.idClient) WHERE idReservation= ".$idReservation." ";
                            $resultat = mysqli_query($connexion,$requete);
                            }
                            else{
                                $requete = "SELECT *FROM reservation INNER JOIN utilisateurs ON(reservation.idUtilisateur=utilisateurs.idUtilisateur) INNER JOIN type_reservation ON(reservation.idType=type_reservation.idType) INNER JOIN statut ON(reservation.idStatut=statut.idStatut) INNER JOIN client ON(reservation.idClient=client.idClient) WHERE idReservation= ".$idReservation." ";
                                $resultat = mysqli_query($connexion,$requete);
                            }
                            while ($liste=mysqli_fetch_object($resultat)){
                            
                            ?>
                        <h2 align="center"><u> Plus d'info sur la reservation </u></h2>
                        <div class="col-lg-6">
                                <label for="nom">Nom du client :</label>
                                        <input 
                                        class="form-control mb-3" 
                                        name="nom"
                                        disabled
                                        value = "<?php echo $liste->nomClient ; ?>">

                                <label for="prenom">Prénom(s) du client :</label>
                                        <input 
                                            class="form-control mb-3"
                                            type="text"  
                                            name="prenom" 
                                            disabled
                                            value = "<?php echo $liste->prenomClient ; ?>">
                            <!-- Liste déroulante à double requete -->
                                <label>Type de réservation :</label>
                                    <select 
                                    name="type_reservation" 
                                    class="form-control mb-3" 
                                    disabled>
                                        <option><?php 
                                        $idType = $liste->idType;
                                        echo $liste->Type ; ?></option>
                                        <?php
                                        include('config.inc.php');
                                        $requete1="SELECT *FROM type_reservation WHERE idType <> ".$idType." ";
                                        $resultat1=mysqli_query($connexion,$requete1);
                                        while ($liste1 = mysqli_fetch_array($resultat1)){ ?>
                                            
                                            <option> <?php echo $liste1['Type']; ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>

                                <label for="telephone">Telephone du client:</label>
                                    <input class="form-control mb-3" 
                                            type="text"
                                            name="telephone" 
                                            disabled
                                            value="<?php echo $liste->telClient ; ?>">

                                <label for="nationalite">Nationalité du client:</label>
                                    <input class="form-control mb-3" 
                                            type="text"
                                            name="nationalite" 
                                            disabled
                                            value="<?php echo $liste->nationalite ; ?>">
                            
                                <label for="cin">CIN du client:</label>
                                    <input class="form-control mb-3" 
                                            type="text"
                                            name="cin" 
                                            disabled
                                            value="<?php echo $liste->CIN ; ?>">

                        </div>
                        <div class="col-lg-6 mb-2">
                                <label for="debut">Debut de séjour :</label>
                                        <input 
                                                class="form-control mb-3"
                                                type="date"  
                                                name="debut"
                                                disabled
                                                value="<?php echo $liste->debutSejour ; ?>">

                                <label for="debut">Fin de séjour :</label>
                                        <input 
                                                class="form-control mb-3"
                                                type="date"  
                                                name="fin" 
                                                disabled
                                                value="<?php echo $liste->finSejour ; ?>">
                                        
                                <label for="statut">Statut :</label>
                                    <select 
                                        name="statut" 
                                        disabled
                                        class="form-control mb-3" >
                                            <option><?php 
                                            $idStatut = $liste->idStatut;
                                            echo $liste->statut_reservation ; ?></option>
                                            <?php
                                            include('config.inc.php');
                                            $requete2="SELECT *FROM statut WHERE idStatut <> ".$idStatut." ";
                                            $resultat2=mysqli_query($connexion,$requete2);
                                            while ($liste2 = mysqli_fetch_array($resultat2)){ ?>
                                                
                                                <option> <?php echo $liste2['statut_reservation']; ?></option>

                                            <?php
                                            }
                                            ?>
                                    </select>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="numero_chambre">Numéro de chambre :</label>
                                            <select 
                                                name="numero_chambre" 
                                                class="form-control mb-3" 
                                                disabled>
                                                <option>
                                                <?php 
                                                echo $liste->numChambre ; ?>
                                                </option>
                                            </select>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <label for="type_chambre">Type de chambre :</label>
                                            <select 
                                                name="type_chambre"
                                                class="form-control mb-3" 
                                                disabled
                                                id="type_chambre">
                                                <option>
                                                    <?php
                                                    if($liste->idTypeChambre !=0){
                                                        $typeChambre = $liste->type_chambre;
                                                        echo $liste->type_chambre ; }
                                                    else{
                                                        echo '';
                                                        $typeChambre=' ';
                                                    }?>
                                                </option>
                                            </select> 
                                    </div>
                                </div>
                                
                                <label for="nbrPersonne">Nombre de personne :</label></br>
                                        <input 
                                            class="form-control"
                                            type="integer"  
                                            name="nbrPersonne" 
                                            value="<?php echo $liste->nbrPersonne ;?>"
                                            disabled
                                            placeholder="nombre de personne">

                                <label for="libellee">Libellée :</label></br>
                                <textarea 
                                name="libellee" 
                                disabled
                                class="form-control"><?php echo $liste->libellee; ?></textarea>


                        </div>
                    <h3 align="center"> Cette réservation a été faite le <strong><?php echo $liste->dateReservation ;?></strong> par <strong><?php echo strtoupper($liste->nom); ?></strong></h3></br>
            </div>
        </div>
        
        <?php
            }
        }
        ?>
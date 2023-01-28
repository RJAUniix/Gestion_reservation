<meta charset="utf-8" />
        <title>Réservation</title>
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
                <a href="chambre.php"> <img src="bootstrap-icons/arrow-left-circle.svg" width="40px" class='mt-3'> </a>
                    <div class="row">
                    <div class="col-sm-12 mt-5">
                        <h2 align="center"><u>Réservation à venir pour la <?php echo $_POST['grande_salle']; ?></u></h2>
                        <table class="table table-bordered table-striped table-hover table-dark">
                            <thead>
                                <tr align='center'>
                                    <th>#</th>
                                    <th>Début de sejour</th>
                                    <th>Fin de sejour</th>
                                    <th>Statuts</th>
                                    <th>Nombre de personne</th>
                                    <th>Réservé le</th>
                                </tr>
                            </thead>
                            <tbody align='center'>
                                <?php
                                include('config.inc.php');
                                $date = strftime("%Y-%m-%d");
                                $requete = "SELECT *FROM reservation INNER JOIN statut ON(reservation.idStatut=statut.idStatut) WHERE idType=2 AND finSejour>'".$date."' ";
                                $resultat = mysqli_query($connexion,$requete);
                                $i=1;
                                while($liste = mysqli_fetch_object($resultat)){
                                    
                                ?>
                                <tr>
                                    <td> <?php echo $i; ?> </td>
                                    <td> <?php echo $liste->debutSejour; ?> </td>
                                    <td> <?php echo $liste->finSejour; ?> </td>
                                    <td> 
                                        <?php 
                                            if($liste->idStatut == 1){
                                                echo '<span class="badge rounded-pill bg-success">'.$liste->statut_reservation.'</span>'; }
                                            elseif($liste->idStatut == 2){
                                                echo '<span class="badge rounded-pill bg-danger">'.$liste->statut_reservation.'</span>'; }
                                            else {
                                                echo '<span class="badge rounded-pill bg-warning">'.$liste->statut_reservation.'</span>'; }
                                        ?> 
                                    </td>
                                    <td> <?php echo $liste->nbrPersonne." personnes" ; ?> </td>
                                    <td> <?php echo $liste->dateReservation; ?> </td>
                                </tr>
                                <?php 
                                $i++ ;
                                } ?>
                            </tbody>
                        </table>
                    </div>
            </div>
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
        
        <?php
        //Prendre le numero de chambre
        if(isset($_POST['chambre'])){
            $numChambre = $_POST['chambre'];

        }
        ?>
            <div class="container">   
                <a href="chambre.php"> <img src="bootstrap-icons/arrow-left-circle.svg" width="40px" class='mt-3'> </a>
                    <div class="row">
                    <div class="col-sm-12 mt-5">
                        <h2 align="center"><u>Réservation à venir pour la chambre <?php echo $numChambre; ?></u></h2>
                        <table class="table table-bordered table-striped table-hover table-dark">
                            <thead>
                                <tr align='center'>
                                    <th>#</th>
                                    <th>Début de sejour</th>
                                    <th>Fin de sejour</th>
                                    <th>Statuts</th>
                                    <th>Type de chambre</th>
                                    <th>Réservé le</th>
                                </tr>
                            </thead>
                            <tbody align='center'>
                            <?php
                                include('config.inc.php');
                                $date = date("%Y-%m-%d");
                                $requete = "SELECT *FROM reservation INNER JOIN statut ON(reservation.idStatut=statut.idStatut) INNER JOIN type_chambre ON(reservation.idTypeChambre=type_chambre.idTypeChambre) WHERE idType=1 AND finSejour>'".$date."' AND numChambre=".$numChambre." ";
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
                                    <td> <?php echo $liste->type_chambre; ?> </td>
                                    <td> <?php echo $liste->dateReservation; ?> </td>
                                </tr>
                                <?php 
                                $i++ ;
                                } ?>
                            </tbody>
                        </table>
                    </div>
            </div>
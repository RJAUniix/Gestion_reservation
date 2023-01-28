        <meta charset="utf-8" />
        <title>Liste des clients</title>
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
            <a href="parametre.php"> <img src="bootstrap-icons/arrow-left-circle.svg" width="40px" class='mt-3'> </a>
                <div class="row">
                    <h2 align="center"><u> Liste de tous les clients : </u></h2> 
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover table-dark">
                            <thead>
                                <tr align='center'>
                                    <th>#</th>
                                    <th>Nom et prenoms</th>
                                    <th>Nationalité</th>
                                    <th>Téléphone</th>
                                    <th>CIN</th>
                                </tr>
                            </thead>
                            <tbody align='center' class="table-primary">
                                <?php
                                include ('config.inc.php');
                                $requete = "SELECT *FROM client ORDER BY nomClient";
                                $resultat = mysqli_query($connexion,$requete);
                                $i=1;
                                while ($liste = mysqli_fetch_object($resultat)){ ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $liste->nomClient." ".$liste->prenomClient; ?></td>
                                            <td><?php echo $liste->nationalite; ?></td>
                                            <td><?php echo $liste->telClient; ?></td>
                                            <td><?php echo $liste->CIN; ?></td>
                                        </tr>
                                    <?php
                                    $i++;
                                } 
                                ?>
                            </tbody>
                        </table>
                    
                </div>
        </div>
<?php
    session_start();
?>


<?php

    if(isset($_SESSION["idAdmin"]) && isset($_SESSION["emailAdmin"])){ 

        include 'database/configdatabase.php';
        require_once __DIR__ . '/class/uploadclass.php';
        $superAdmin = new SuperAdmin() ;
        $lienFichierBDD = "database/configdatabase.php" ;


        $idAdmin = $_SESSION["idAdmin"] ;
        $etatAdmin = $_SESSION["etatAdmin"] ;





        if($etatAdmin != "actif"){
            echo '<div class="alert alert-danger" role="alert">Votre compte est bloqué, contactez le super admin.</div>';
        }else{
            $nomAdmin = $_SESSION["nomAdmin"] ;
            $emailAdmin = $_SESSION["emailAdmin"] ;
            $telAdmin = $_SESSION["telAdmin"] ;
            $dateInscription = $_SESSION["dateInscription"] ;
            $typeAdmin = $_SESSION["typeAdmin"] ;

            if(isset($_GET['id'])){
                $idAdmin = $_GET['id'] ;

            
       
            ?>




                 <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <!-- lien pour integrer le framework boostrap -->
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
                        <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
                        <title>Details admin</title>
                        <link rel="stylesheet" href="css/admin-details.css">
                        <link rel="stylesheet" href="css/header-admin.css">

                    </head>
                    <body>
                       <div class="container">
                        <?php include 'header-admin.php' ?>
                        <h1>Information de l'admin</h1>
                        <?php 
                            $superAdmin = new superAdmin();

                            $detailsAdmin = $superAdmin->detailAdmin($lienFichierBDD, $idAdmin);

                            if($detailsAdmin != false){

                            
                        
                        ?>

                        <div class="information-admin">
                            <span>
                                <i class="bi bi-person-circle"></i>
                            </span>
                            <div class="information">
                                <div class="nom border-1">
                                    <label for=""><strong>Nom</strong> </label>
                                    <p><?php echo $detailsAdmin['nomAdmin']; ?></p>

                                </div>
                                <div class="mail">
                                    <label for=""> <strong>Email</strong>  </label>
                                    <p><?php echo $detailsAdmin['emailAdmin']; ?></p>

                                </div>
                                <div class="telephone">
                                    <label for=""><strong>Telephone</strong></label>
                                    <p><?php echo $detailsAdmin['telAdmin']; ?></p>
                                </div>
                                <div class="typeAdmin">
                                    <label for=""><strong>Type Admin</strong></label>
                                    <p><?php echo $detailsAdmin['typeAdmin']; ?></p>
                                </div>
                                <div class="etat">
                                    <label for=""><strong>Etat</strong></label>
                                    <p><?php echo $detailsAdmin['etatAdmin']; ?></p>
                                </div>
                                <div class="inscription">
                                    <label for=""><strong>Date inscription</strong></label>
                                    <p><?php echo $detailsAdmin['dateInscription']; ?></p>
                                </div>

                            </div>
                            <div class="actions">
                                <?php
                                    if($detailsAdmin['etatAdmin'] == "actif"){ ?>

                                        <a href="bloquer-admin.php?id=<?php echo $idAdmin ; ?>"><button class="btn btn-danger">BLOQUER</button></a>


                                    <?php
                                    }
                                    else{ ?>

                                        <a href="bloquer-admin.php?id=<?php echo $idAdmin ; ?>"><button class="btn btn-primary">ACTIVER</button></a>


                                    <?php
                                        } 
                                    ?>

                            </div>
                        </div>

                        <?php 
                        }
                        ?>

                       </div>






                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
                    </script>

                    </body>
                </html>








               






<?php 
    }
    }
    }else{
        header("Location:loginadmin.php");
    }
?>
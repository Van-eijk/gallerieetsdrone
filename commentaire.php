<?php
    session_start();
    include 'database/configdatabase.php';
?>


<?php
    if(isset($_SESSION["idAdmin"]) && isset($_SESSION["emailAdmin"])){ 
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

            require_once __DIR__ . '/class/uploadclass.php';
            $lienFichierBDD = "database/configdatabase.php" ;

            $superAdmin = new SuperAdmin() ;
       
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
                <title>admin</title>


                <link rel="stylesheet" href="css/commentaire.css">
                <link rel="stylesheet" href="css/header-admin.css">


            </head>
            <body>
                <div class="container">
                    <?php include 'header-admin.php' ;?>

                    
                    <h1>liste des commentaires des visiteurs
                        <?php
                        $nombreCommentaire = $superAdmin->nombreCommentaire($lienFichierBDD) ;
                        if($nombreCommentaire > 0){
                            echo '<span class="badge bg-secondary">'.$nombreCommentaire.'</span>';
                        }
                        else{
                            echo '<span class="badge bg-secondary">0</span>';
                        }
                     ?>

                    </h1>


                   


                    <div class="liste-commentaire">

                    <?php 
                        $commentaires = $superAdmin->afficherCommentaireAdmin($lienFichierBDD);

                        if($commentaires){
                            foreach($commentaires as $commentaire){
                                ?>
                                 <div class="item-commentaire">
                                    <div class="info-commentaire">
                                        <div class="nom-visiteur">
                                            <h5>Nom :</h5> 
                                            <p><?php echo $commentaire['nomVisiteur'] ;?></p>
                                        </div>
                                        <div class="email-visiteur">
                                            <h5>Email :</h5> 
                                            <p><?php echo $commentaire['emailVisiteur'] ;?></p>
                                        </div>
                                        <div class="tel-visteur">
                                            <h5>Téléphone :</h5> 
                                            <p><?php echo $commentaire['telVisiteur'] ;?></p>
                                        </div>
                                        <div class="date-commentaire">
                                            <h5>Date :</h5> 
                                            <p><?php echo $commentaire['dateHeure'] ;?></p>
                                        </div>
                                        <div class="message-visiteur">
                                            <h5>Message :</h5> 
                                            <p><?php echo $commentaire['note'] ;?></p>
                                        </div>

                                    </div>
                                    <div class="action-commentaire">
                                        <a href="detailsarticle.php?idArticle=<?php echo $commentaire['idCommentairePublication'] ;?>" target="_blank" rel="noopener">Voir la publication</a>
                                        <a href="supprimercommentaire.php?idCommentaire=<?php echo $commentaire['idCommentaire'] ;?>">Supprimer</a>

                                    </div>

                                </div>

                                <?php
                            }
                        }else{
                            echo '<div class="alert alert-info" role="alert">Aucun commentaire pour le moment.</div>';
                        }
                    ?>
                        
                    </div>
                    

                       

                </div>
                

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
                </script>
            </body>
            </html>







<?php 
    }
    }else{
        header("Location:loginadmin.php");
    }
?>
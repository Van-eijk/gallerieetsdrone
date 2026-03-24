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
            $lienFichierBDD = "database/configdatabase.php" ;
       
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


                <link rel="stylesheet" href="css/listepublication.css">
                <link rel="stylesheet" href="css/header-admin.css">


            </head>
            <body>
                <div class="container">
                    <?php include 'header-admin.php' ?>
                    <h1>Liste des publications</h1>

                   
                    <div class="liste-pub">

                        <?php 
                            // Récupérer les publications depuis la base de données
                            // $sql = "SELECT * FROM publications";

                            $superAdmin = new SuperAdmin() ;
                            $resultatListerPublication = $superAdmin->afficherPublication($lienFichierBDD) ;
                            if($resultatListerPublication != false){
                                foreach($resultatListerPublication as $publication){ ?>
                                    <div class="pub-item">
                                        <div class="pub-info">
                                            <h3><?php echo $publication['titre']; ?></h3>
                                            <h4>Auteur: <?php echo $publication['auteur']; ?></h4>
                                            <h4>Catégorie: <?php echo $publication['categorie']; ?></h4>
                                            <h4>Prix : <?php echo $publication['prix']; ?> Fcfa</h4>
                                            <p><?php echo $publication['description']; ?></p>
                                            <span class="date">Publié le <?php echo $publication['dateHeure']; ?></span>
                                        </div>
                                        <div class="action-pub">
                                            <a href="modifier-publication.php?idPublication=<?php echo $publication['idPublication']; ?>"><button class="btn btn-primary">Modifier</button></a>
                                            <a href="supprimer-publication.php?idPublication=<?php echo $publication['idPublication']; ?>"><button class="btn btn-danger">Supprimer</button></a>
                                        </div>
                                    </div>
                                <?php
                                
                                }
                            }else{
                                echo '<div class="alert alert-info text-center" role="alert">Aucune publication trouvée.</div>';
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
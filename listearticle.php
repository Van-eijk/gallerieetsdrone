<?php

    if(isset($_GET['categorie'])) {
        include 'database/configdatabase.php';
        require_once __DIR__ . '/class/uploadclass.php';
        $lienFichierBDD = "database/configdatabase.php" ;
        $visiteur = new Visiteur() ;

        $categorieArticle = $_GET['categorie'] ;

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
                <title>galerieetsdrone</title>

                <link rel="stylesheet" href="css/header.css">
                <link rel="stylesheet" href="css/listearticle.css">

            </head>
            <body>


            <div class="container-fluid bg-light">
                <?php include 'header.php'; ?>
                <div class="article d-flex justify-content-center flex-wrap">
                    <?php
                        $resultatListerArticle = $visiteur->listerArticle($lienFichierBDD, $categorieArticle) ;
                        if($resultatListerArticle != false){
                            foreach($resultatListerArticle as $article){ 

                                $images = json_decode($article['image'], true) ; // Désérialisation du champ image pour obtenir le tableau des chemins d’images
                                $article['image'] = $images[0] ; // On prend la première image pour l’afficher dans la liste des articles
                                
                                ?>

                                <a href="detailsarticle.php?idArticle=<?php echo $article['idPublication']; ?>" class="m-1">
                                    <div class="card">
                                        <img src="<?php echo $images[0]; ?>" class="card-img-top" alt="photo">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $article['titre']; ?></h5>
                                            <p class="card-text"><?php echo $visiteur->tronquerText($article['description'], 50, '...'); ?></p>
                                            <h5 class="card-title"><?php echo $article['prix']; ?> Fcfa</h5>

                                        </div>
                                    </div>
                                </a>

                           <?php 
                           }

                        }
                        else{
                            echo '<div class="alert alert-info" role="alert">Aucun article trouvé dans la catégorie <strong>' . $categorieArticle . '</strong>.</div>';
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
    else{
        header("Location:index.php") ;
    }

    ?>
    




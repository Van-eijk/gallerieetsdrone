<?php
    if(isset($_GET['idArticle'])) {
        include 'database/configdatabase.php';
        require_once __DIR__ . '/class/uploadclass.php';
        $lienFichierBDD = "database/configdatabase.php" ;
        $visiteur = new Visiteur() ;

        $idArticle = $_GET['idArticle'] ;

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
            <link rel="stylesheet" href="css/detailsarticle.css">
        </head>
        <body>
            <div class="container-fluid bg-light h-100 w-100 p-3">
                <?php 
                include 'header.php'; 

               
                ?>
                <div class="slide row">
                    <div class="main-slide col-12 col-lg-8 p-3">
                        <?php
                            $resultatDetailsArticle = $visiteur->detailsArticle($idArticle, $lienFichierBDD) ;
                            if($resultatDetailsArticle != false){
                                $images = json_decode($resultatDetailsArticle['image'], true) ; // Désérialisation du champ image pour obtenir le tableau des chemins d’images
                                $resultatDetailsArticle['image'] = $images[0] ; // On prend la première image pour l’afficher dans les détails de l’article

                                $i=0 ;
                                $j=0 ;

                                for($i=0; $i<count($images); $i++){ ?>
                                    <img src="<?php echo $images[$i]; ?>" alt="slide image" class="main-img">


                                <?php
                                }
                            
                            }
                        ?>
                       


                        <div class="bouton-next-prev">
                            <button onclick="prevPicture()" ><i class="bi bi-arrow-left-circle-fill text-info"></i></button>
                            <button onclick="nextPicture()"><i class="bi bi-arrow-right-circle-fill text-info"></i></button>
                        </div>

                    </div>

                    <div class="second-slide border col-12 col-lg-4 p-3 d-lg-flex flex-lg-wrap justify-content-evenly  overflow-scroll">

                        <?php 
                            for($j=0; $j<count($images); $j++){ ?>
                                <img src="<?php echo $images[$j]; ?>" alt="slide image" class="second-img m-1 ">    
                        
                        
                        <?php
                            }
                        ?>


                        
                    </div>
                    

                </div>

                <div class="row">
                    <h1><?php echo $resultatDetailsArticle['titre']; ?></h1> <p><?php echo $resultatDetailsArticle['dateHeure']; ?></p>
                    <h2>AUTEUR : <?php echo $resultatDetailsArticle['auteur']; ?></h2>
                    <div class="row d-flex justify-content-between align-items-center h-25 col-12 col-lg-8 ">
                        <div class="row price w-50 w-lg-25 h-25 p-2 ">
                            <h2 class=" mb-0">Prix: <?php echo $resultatDetailsArticle['prix']; ?> Fcfa</h2>
                        </div>

                        <div class="row buy w-50 w-lg-25 h-25 text-center p-2">
                            <a href="https://wa.me/237653695347?text=Besoin de plus de renseignements sur cet article SVP " class="p-2">
                                <span class=""> 
                                    <i class="bi bi-whatsapp fs-5 fw-bold"></i>
                                </span>
                                <p class="fw-bold w-75 w-lg-25 mb-0">Commander</p>
                            
                            </a>
                        </div>

                    </div>

                    <div class="info-article col-12 p-3 mt-5">
                        <h2>A propos de l'article</h2>
                        <p class="mt-3">
                            <?php echo $resultatDetailsArticle['description']; ?>
                        </p>
                    
                    </div>

                    <div> 
                        <h3><a href="">Commentaires (0)</a></h3> <br>

                        <div class="mb-4 liste-commentaire">

                            <div class="mb-3 item-commentaire">
                                <div class="header-commentaire">
                                    <span>
                                        <i class="bi bi-person-circle"></i>
                                    </span>
                                    <div class="ms-2 info-commentaire">
                                        <h5>Nom du commentateur     </h5>  
                                        <p class="ms-3">  Date du commentaire</p>
                                    </div>

                                </div>

                                <div class="body-commentaire">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.
                                    </p>

                                </div>


                            </div>


                            <div class=" mb-3 item-commentaire">
                                <div class="header-commentaire">
                                    <span>
                                        <i class="bi bi-person-circle"></i>
                                    </span>
                                    <div class="ms-2 info-commentaire">
                                        <h5>Nom du commentateur     </h5>  
                                        <p class="ms-3">  Date du commentaire</p>
                                    </div>

                                </div>

                                <div class="body-commentaire">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.
                                    </p>

                                </div>


                            </div>


                            <div class=" mb-3 item-commentaire">
                                <div class="header-commentaire">
                                    <span>
                                        <i class="bi bi-person-circle"></i>
                                    </span>
                                    <div class="ms-2 info-commentaire">
                                        <h5>Nom du commentateur     </h5>  
                                        <p class="ms-3">  Date du commentaire</p>
                                    </div>

                                </div>

                                <div class="body-commentaire">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.
                                    </p>

                                </div>


                            </div>

                        </div>


                        <form action="detailsarticle-data.php" method="post">
                            <input type="hidden" name="idArticle" value="<?php echo $idArticle; ?>">


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nomvisiteur" id="floatingInput" placeholder="nom">
                                <label for="floatingInput">Nom</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="emailvisiteur" id="floatingInput" placeholder="Email">
                                <label for="floatingInput">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" name="telvisiteur" id="floatingInput" placeholder="Telephone">
                                <label for="floatingInput">Telephone</label>
                            </div>
                        <div class="form-floating">
                                <textarea class="form-control" name="commentairevisiteur" placeholder="Ajoutez un commentaire" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Ajoutez un commentaire...</label>
                            </div>
                            <button type="submit" name="commenter" class="btn btn-primary mt-3">Commentez</button>
                        </form>
                    </div>

                    <h3 class="mt-4">Vous pourrez aussi aimer...</h3>

                    <div class="row mt-4 content-autres-articles m-0 overflow-scroll w-100">

                        <a href="detailsarticle.php" class=" autres-article ">
                            <div class="card w-100 m-0">
                                <img src="img/photo1.jpg" class="card-img-top" alt="photo">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">s</p>
                                    <h5 class="card-title">10.000 Fcfa</h5>

                                </div>
                            </div>
                        </a>


                        <a href="detailsarticle.php" class=" autres-article">
                            <div class="card w-100 m-0">
                                <img src="img/photo1.jpg" class="card-img-top" alt="photo">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">s</p>
                                    <h5 class="card-title">10.000 Fcfa</h5>

                                </div>
                            </div>
                        </a>


                        <a href="detailsarticle.php" class=" autres-article">
                            <div class="card w-100 m-0">
                                <img src="img/photo1.jpg" class="card-img-top" alt="photo">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">s</p>
                                    <h5 class="card-title">10.000 Fcfa</h5>

                                </div>
                            </div>
                        </a>


                        
                    </div>
                </div>
            </div>
            



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script src="js/detailsarticle.js"></script>
        </body>
        </html>


<?php 
    }
    else{
        header("Location:index.php") ;
    }

?>
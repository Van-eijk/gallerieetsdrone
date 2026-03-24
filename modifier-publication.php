<?php
    session_start();
    include 'database/configdatabase.php';
    require_once __DIR__ . '/class/uploadclass.php';
    $lienFichierBDD = "database/configdatabase.php" ;
    $superAdmin = new SuperAdmin() ;

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

            if(isset($_GET['idPublication'])){
                $idPublication = $_GET['idPublication'] ;
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


                    <link rel="stylesheet" href="css/modifier-publication.css">
                    <link rel="stylesheet" href="css/header-admin.css">


                </head>
                <body>
                    <div class="container">
                        <?php include 'header-admin.php' ?>
                        <h1>Modifier la publication</h1>

                        <?php 
                            $resultatDetailsPublication = $superAdmin->detailsPublication($lienFichierBDD, $idPublication) ;
                            if($resultatDetailsPublication != false){ 
                                // Récupérer les détails de la publication et les afficher dans le formulaire de modification
                                // Vous pouvez utiliser les données de $resultatDetailsPublication pour pré-remplir les champs du formulaire
                                
                                ?>
                                <div class="details-pub">
                                    <form action="modifier-publication-data.php" method="post">

                                        <input type="hidden" name="idPublication" value="<?php echo $idPublication; ?>">

                                        <div class="mb-3">
                                            <label for="categoriePublication" class="form-label">Categorie de la publication</label>

                                            <select name="categoriePublication" id="categoriePublication" class="form-select mb-3" aria-label="Default select example">
                                                <option selected value="<?php echo $resultatDetailsPublication['categorie']; ?>"><?php echo $resultatDetailsPublication['categorie']; ?></option>
                                                <option value="SCULPTURE">SCULPTURE</option>
                                                <option value="OBJETS ANCIENS">OBJETS ANCIENS</option>
                                                <option value="VETEMENTS-BIJOUX-DEDICACES">VETEMENTS-BIJOUX-DEDICACES</option>

                                                <option value="PHOTOGRAPHIES">PHOTOGRAPHIES</option>
                                                <option value="DESTINATION TOURISTIQUES ET ARTISTIQUES">DESTINATION TOURISTIQUES ET ARTISTIQUES</option>
                                                <option value="LITTERATURE">LITTERATURE</option>

                                                <option value="PRODUITS">PRODUITS</option>
                                                <option value="BLOG">BLOG</option>
                                                <option value="PEINTURES">PEINTURES</option>
                                            </select>
                                        </div>


                                       




                                        <div class="mb-3">
                                            <label for="titrePublication" class="form-label">Titre de la publication</label>
                                            <input type="text" class="form-control" id="titrePublication" name="titrePublication" value="<?php echo $resultatDetailsPublication['titre']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="auteurPublication" class="form-label">Auteur de la publication</label>
                                            <input type="text" class="form-control" id="auteurPublication" name="auteurPublication" value="<?php echo $resultatDetailsPublication['auteur']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="descriptionPublication" class="form-label">Description de la publication</label>
                                            <textarea class="form-control" id="descriptionPublication" name="descriptionPublication"><?php echo $resultatDetailsPublication['description']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="prixPublication" class="form-label">Prix de la publication</label>
                                            <input type="number" class="form-control" id="prixPublication" name="prixPublication" value="<?php echo $resultatDetailsPublication['prix']; ?>">
                                        </div>
                                        <!-- Ajouter d'autres champs selon les besoins -->

                                        <button type="submit" name="modifierPublication" class="btn btn-primary">Enregistrer les modifications</button>


                                    </form>
                                </div>
                               
                            <?php 
                                }
                            else{
                                echo '<div class="alert alert-danger" role="alert">Publication non trouvée.</div>';
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
            else{
                echo '<div class="alert alert-danger" role="alert">ID de publication manquant.</div>';
            }

        }
            
       
    
    }else{
        header("Location:loginadmin.php");
    }
?>
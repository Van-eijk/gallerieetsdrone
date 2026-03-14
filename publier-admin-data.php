<?php
    session_start();
    include 'database/configdatabase.php';    
    
    require_once __DIR__.'/class/uploadclass.php' ;

    // Import des classes Intervention

    // Charge l'autoload de Composer
    //require __DIR__ . '/vendor/autoload.php';

    require_once __DIR__ . '/vendor/autoload.php';

    // Import des classes Intervention
    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Gd\Driver;




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


            // Traitement du formulaire de publication




            if(isset($_POST['publier'])){

                if(isset($_POST['categoriePublication'])){
                    $categoriePublication = $_POST['categoriePublication'] ;

                    if(isset($_POST['titrePublication'])){
                        $titrePublication = $_POST['titrePublication'] ;

                        if(isset($_POST['descriptionPublication'])){
                            $descriptionPublication = $_POST['descriptionPublication'] ;

                            if(isset($_FILES['imagePublication'])){
                                $imagePublication = $_FILES['imagePublication'] ;

                                if(isset($_POST['auteurPublication'])){
                                    $auteurPublication = $_POST['auteurPublication'] ;

                                    if(isset($_POST['prixPublication'])){
                                        $prixPublication = $_POST['prixPublication'] ;

                                        // traitement des données du formulaire de publication
                                        //echo "ok pour le traitement du formulaire de publication";

                                        $sousAdmin = new SousAdmin() ;

                                        if($sousAdmin->ajouterPublication($idAdmin,$categoriePublication, $titrePublication, $descriptionPublication, $imagePublication, $auteurPublication, $prixPublication)){
                                            header("Location:publier-admin.php");


                                        }
                                        else{
                                            echo "Erreur lors de l'ajout de la publication.";
                                        }



                                      

                                    }else{
                                        echo "Veuillez entrer un prix pour la publication.";
                                        exit;
                                    }

                                }else{
                                    echo "Veuillez entrer un auteur pour la publication.";
                                    exit;
                                }



                            }else{
                                echo "Veuillez sélectionner une image pour la publication.";
                                exit;
                            }
                        }else{
                            echo "Veuillez entrer une description pour la publication.";
                            exit;
                        }
                    }else{
                        echo "Veuillez entrer un titre pour la publication.";
                        exit;
                    }
                }else{
                    echo "Veuillez sélectionner une catégorie pour la publication.";
                    exit;
            
                }   
            }
        }
    }
    else{
        header("Location:loginadmin.php");
    }
    

<?php
    session_start();
    require_once __DIR__ . '/class/uploadclass.php';

    //include 'database/configdatabase.php';

    if(isset($_SESSION["idAdmin"]) && isset($_SESSION["emailAdmin"])){ 
            $lienFichierBDD = "database/configdatabase.php" ;   
            $superAdmin = new SuperAdmin() ;

            if(isset($_GET['idCommentaire'])){
                $idCommentaire = $_GET['idCommentaire'] ;

                //echo $idCommentaire ;
                
                $supprimerCommentaire = $superAdmin->supprimerCommentaire($idCommentaire, $lienFichierBDD) ;

               

                if($supprimerCommentaire){
                    header("Location:commentaire.php") ;
                }
                else{
                    echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors de la suppression du commentaire.</div>';
                }
            }
            else{
                echo '<div class="alert alert-danger" role="alert">Aucun commentaire sélectionné pour la suppression.</div>';
            }   
    }
    else{
        header("Location: login.php") ;
    }
?>
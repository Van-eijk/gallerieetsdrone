<?php

require_once 'database/configdatabase.php';
require_once __DIR__.'/class/uploadclass.php' ;

if (isset($_POST['commenter'])) {
    if(!empty($_POST['nomvisiteur']) ) {
        $nomVisiteur = $_POST['nomvisiteur'];

        if(!empty($_POST['emailvisiteur']) ) {
            $emailVisiteur = $_POST['emailvisiteur'];

            if(!empty($_POST['telvisiteur']) ) {
                $telVisiteur = $_POST['telvisiteur'];

                if(!empty($_POST['commentairevisiteur']) ) {
                    $commentaireVisiteur = $_POST['commentairevisiteur'];
                    $idArticle = $_POST['idArticle'] ;

                    $visiteur = new Visiteur() ;

                    if($visiteur->commenterArticle($idArticle, $nomVisiteur, $emailVisiteur, $telVisiteur, $commentaireVisiteur)){
                        header("Location:detailsarticle.php?idArticle=".$idArticle) ;


                    }
                }
                else{
                    echo '<div class="alert alert-danger" role="alert">Veuillez ajouter un commentaire.</div>';
                    exit();
                }
            }
            else{
                echo '<div class="alert alert-danger" role="alert">Veuillez entrer votre numéro de téléphone.</div>';
                exit();
            }
        }
        else{
            echo '<div class="alert alert-danger" role="alert">Veuillez entrer votre adresse email.</div>';
            exit();
        }
      
    }




    $nomVisiteur = $_POST['nomvisiteur'];
    $emailVisiteur = $_POST['emailvisiteur'];
    $telVisiteur = $_POST['telvisiteur'];
    $commentaireVisiteur = $_POST['commentairevisiteur'];

    // Process the comment (e.g., save to database)
}
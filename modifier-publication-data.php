<?php
    session_start();
    include 'database/configdatabase.php';
    require_once __DIR__ . '/class/uploadclass.php';
    $lienFichierBDD = "database/configdatabase.php" ;
    $superAdmin = new SuperAdmin() ;


    if(isset($_POST['modifierPublication'])){
        $idPublication = $_POST['idPublication'] ;
        $categoriePublication = $_POST['categoriePublication'] ;
        $titrePublication = $_POST['titrePublication'] ;
        $descriptionPublication = $_POST['descriptionPublication'] ;
        $prixPublication = $_POST['prixPublication'] ;
        $auteurPublication = $_POST['auteurPublication'] ;

        // Appeler la méthode de modification de la publication dans la classe SuperAdmin
        $resultatModification = $superAdmin->modifierPublication($lienFichierBDD, $idPublication, $categoriePublication, $titrePublication, $descriptionPublication, $prixPublication, $auteurPublication) ;

        if($resultatModification){
            echo '<div class="alert alert-success" role="alert">La publication a été modifiée avec succès.</div>';
            // Rediriger vers la page de liste des publications ou une autre page appropriée
            header("Location: /etsdrone/listepublication.php");
            exit();
        }else{
            echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors de la modification de la publication. Veuillez réessayer.</div>';
        }
    }
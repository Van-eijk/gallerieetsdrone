<?php
    session_start();
    include 'database/configdatabase.php';

    require_once __DIR__ . '/class/uploadclass.php';
    //$superAdmin = new SuperAdmin() ;
    $lienFichierBDD = "database/configdatabase.php" ;

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



            if(isset($_GET['idPublication'])){
                $idPublication = $_GET['idPublication'] ;

                $sousAdmin = new SousAdmin() ;

                $supp = $sousAdmin-> supprimerPublication($lienFichierBDD, $idPublication, $idAdmin, $etatAdmin, $typeAdmin);

                if($supp == "OK"){
                    header("Location:listepublication.php");
                     //echo $supp ;
                }else{
                    echo $supp ;
                }

            }
        }
    }
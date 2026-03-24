<?php

include 'database/configdatabase.php';
require_once __DIR__ . '/class/uploadclass.php';
$superAdmin = new SuperAdmin() ;
$lienFichierBDD = "database/configdatabase.php" ;



if(isset($_GET['id'])){
    $idAdmin = $_GET['id'] ;

    $bloquerAdmin = $superAdmin -> bloquerAdmin($lienFichierBDD, $idAdmin);

    if($bloquerAdmin){
        $location = "Location:admin-details.php?id=" . $idAdmin ;

    
        header($location);
    }else{
        echo "Une erreur est survenue" ;
    }
    

}
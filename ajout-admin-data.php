<?php
    session_start();
    require_once 'database/configdatabase.php';
    require_once __DIR__.'/class/uploadclass.php' ;
   

    if(isset($_POST['ajouterAdmin'])){

        if(!empty($_POST['typeAdmin']) && !empty($_POST['nomAdmin']) && !empty($_POST['emailAdmin']) && !empty($_POST['telAdmin']) && !empty($_POST['mdpAdmin']) && !empty($_POST['confirmerMdpAdmin'])){

            $typeAdmin = $_POST['typeAdmin'] ;
            $nomAdmin = $_POST['nomAdmin'] ;
            $emailAdmin = $_POST['emailAdmin'] ;
            $telAdmin = $_POST['telAdmin'] ;
            $mdpAdmin = $_POST['mdpAdmin'] ;
            $confirmerMdpAdmin = $_POST['confirmerMdpAdmin'] ;

            $superAdmin = new SuperAdmin() ;
            $result = $superAdmin->ajouterAdmin($typeAdmin, $nomAdmin, $emailAdmin, $telAdmin, $mdpAdmin, $confirmerMdpAdmin) ;
            if($result === false){
                echo '<div class="alert alert-danger" role="alert">Les mots de passe ne correspondent pas.</div>';
            }
            else if($result === true){
                echo '<div class="alert alert-success" role="alert">L\'administrateur a été ajouté avec succès.</div>';
            }
            else{
                echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors de l\'ajout de l\'administrateur.</div>';
            }

        }else{
            echo '<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
        }
    }
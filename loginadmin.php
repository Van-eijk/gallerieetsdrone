
<?php
   
    include_once 'database/configdatabase.php' ;

    require_once __DIR__.'/class/uploadclass.php' ;

    $erreurConnexion;

    if(isset($_POST['connexion'])){

        if(!empty($_POST['emailCon'])){

            if(!empty($_POST['motDePasseCon'])){
                
               $lienFichierBDD = "database/configdatabase.php";
                $lienPageAccueil ='accueil-admin.php';
                $conAdmin = new SousAdmin();




                $conAdmin->setEmailAdmin($_POST['emailCon']);
                $conAdmin->setMotDePasseAdmin($_POST['motDePasseCon']);
                
                $emailCon = $conAdmin->getEmailAdmin() ;
                $motDePasseCon = $conAdmin->getMotDePasseAdmin() ;

                //$conAdmin->connexionAdmin($emailCon, $motDePasseCon, $lienFichierBDD, $lienPageAccueil );

                if($conAdmin->connexionAdmin($emailCon, $motDePasseCon, $lienFichierBDD, $lienPageAccueil) == false){
                    $erreurConnexion = "Email ou mot de passe incorrect";

                }


            }else{
                $erreurMotDePasse = "Entrez le mot de passe";
            }
        }
        else{
            $erreurPseudo = "Entrez l'email";
        }       
    }
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
    
    <title>Admin - galerieetsdrone</title>

    <link rel="stylesheet" href="css/loginadmin.css">

</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center ">
        <h1>ETS GALLERIE DRONE</h1> <br>

        <div class="formulaire">
            <h2>ADMINISTRATEUR</h2> <br>
            <?php
                if(isset($erreurConnexion)){
                    echo '<div class="alert alert-danger" role="alert">'.$erreurConnexion.'</div>';
                }
                if(isset($erreurMotDePasse)){
                    echo '<div class="alert alert-danger" role="alert">'.$erreurMotDePasse.'</div>';
                }
                if(isset($erreurPseudo)){
                    echo '<div class="alert alert-danger" role="alert">'.$erreurPseudo.'</div>';
                }
            ?>

            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="floatingInput" name="emailCon" placeholder="Email">
                    <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="motDePasseCon" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div> <br>
                <div class=" d-flex justify-content-center ">
                    <button type="submit" class="btn btn-primary" name="connexion" value="connexion">Connexion</button>

                </div>
            </form>
        </div>

    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
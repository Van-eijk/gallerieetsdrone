<?php
    session_start();
    include 'database/configdatabase.php';
?>


<?php
    require_once __DIR__ . '/class/uploadclass.php';

    $superAdmin = new SuperAdmin() ;

    $r = $superAdmin->listerAdmin("database/configdatabase.php") ;

    if($r != false){
        foreach($r as $admin){
            echo $admin['nomAdmin'] . " - " . $admin['typeAdmin'] . "<br>" ;
        }
    }





















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
                    <title>Ajouter un admin</title>
                    <link rel="stylesheet" href="css/ajout-admin.css">

                </head>
                <body>

                    <div class="container">
                        <?php include 'header-admin.php' ?>
                        <h2>Ajouter un administrateur</h2>
                        <div class="formulaire">

                            <form action="ajout-admin-data.php" method="post" enctype="multipart/form-data">


                                <select name="typeAdmin" class="form-select mb-3" aria-label="Default select example">
                                    <option >Type d'administrateur</option>
                                    <option selected value="sousadmin">SOUS ADMINISTRATEUR</option>
                                    <option value="superadmin">SUPER ADMINISTRATEUR</option>
                                    
                                </select>

                            


                                <div class="form-floating mb-3">
                                    <input type="text" name="nomAdmin" class="form-control" id="floatingInput" placeholder="Nom de l'administrateur">
                                    <label for="floatingInput">Nom de l'administrateur</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" name="emailAdmin" class="form-control" id="floatingInput" placeholder="Email de l'administrateur">
                                    <label for="floatingInput">Email de l'administrateur</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="tel" name="telAdmin" class="form-control" id="floatingPassword" placeholder="Téléphone de l'administrateur">
                                    <label for="floatingPassword">Téléphone de l'administrateur</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="mdpAdmin" class="form-control" id="floatingPassword" placeholder="Mot de passe de l'administrateur">
                                    <label for="floatingPassword">Mot de passe de l'administrateur</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="confirmerMdpAdmin" class="form-control" id="floatingPassword" placeholder="Mot de passe de l'administrateur">
                                    <label for="floatingPassword">Confirmer le mot de passe de l'administrateur</label>
                                </div>


                                <button name="ajouterAdmin" type="submit" class="btn btn-primary">Enregistrer</button>
                                
                            </form>

                        </div>



                        <div class="row liste-admin">
                            <h2 style="margin-bottom: 25px;">Liste des administrateurs</h2>

                            <div class="admin-item">
                                <div class="info">
                                    <span>
                                        <i class="bi bi-person-circle"></i>
                                    
                                    </span>
                                    <div class="admin-info">
                                        <h5>Nom de l'administrateur</h5> <p>|</p>
                                        <p>Type d'administrateur</p>
                                    </div>
                                </div>

                                <div class="plus-details">
                                    <a href="" title="Plus de détails"><i class="bi bi-info-circle-fill"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>
                    

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
                    </script>
                    
                </body>
                </html>

    
<?php 
    }
    }else{
        header("Location:loginadmin.php");
    }
?>
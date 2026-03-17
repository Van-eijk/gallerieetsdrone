<?php
    session_start();
    include 'database/configdatabase.php';
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


                <link rel="stylesheet" href="css/accueil-admin.css">
                <link rel="stylesheet" href="css/header-admin.css">


            </head>
            <body>
                <div class="container">
                    <?php include 'header-admin.php' ?>
                    <div class="menu border d-flex flex-wrap justify-content-center align-items-center">
                        <a href="listepublication.php" class="bg-info border">
                            <div class="icon">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <p>Publications</p>
                        </a>

                        <?php
                            if($typeAdmin == "sousAdmin"){ ?>

                                <a href="publier-admin.php" class="bg-info border">
                                    <div class="icon">
                                        <i class="bi bi-file-earmark-plus-fill"></i>
                                    </div>
                                    <p>Publier</p>
                                </a>
                               

                        <?php 
                            } 
                        ?>



                        <a href="commentaire.php" class="bg-info border">
                            <div class="icon">
                                <i class="bi bi-chat-left-text-fill"></i>
                            </div>
                            <p>Comment.</p>
                        </a>



                        <?php
                            if($typeAdmin != "sousAdmin"){ ?>

                                <a href="ajout-admin.php" class="bg-info border">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                        </svg>
                                    </div>
                                    <p>Admins</p>
                                </a>
                               

                        <?php 
                            } 
                        ?>


                       

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
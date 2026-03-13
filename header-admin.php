<?php

    include 'database/configdatabase.php';

    require_once __DIR__.'/class/uploadclass.php' ;
    
    $deconAdmin = new SousAdmin() ;
    if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
        $lienPageAccueil = "./loginadmin.php" ;
        $deconAdmin->deconnexionAdmin($lienPageAccueil) ;
    }
   
?>  






<nav class="navbar navbar-expand-lg nav-responsive navbar-dark fixed-top bg-info w-100">
    <div class="container-fluid main-nav w-100">
        <a href="accueil-admin.php" class="navbar-brand text-uppercase fw-bold text-dark">
            
                <img src="img/logo.jpeg" style="height: 60px; width: 200px; padding: 0px; margin: 0px;" alt="logo">
            
        </a>

        

        <button class="navbar-toggler btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i></span>
        </button>

      

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class=" search-bar">
                <form action="" method="post" class="form-inline">
                    <input type="text" placeholder="Rechercher..." >
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <ul class="navbar-nav ">
                
                 <li class="nav-item ps-3">
                     <!-- Confert popupdeconnexion.php -->

                    <a class="nav-link text-dark"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" style=" cursor: pointer;"><i class="bi bi-person-circle"></i></a>
                </li>

                <li class="nav-item ps-3">
                    <a href="#" class="nav-link text-dark"> <?php echo $nomAdmin ; ?> </a>
                </li>

                

                <li class="nav-item ps-3">
                    <a href="?action=deconnexion" class="nav-link text-dark"> Deconnexion</a>
                </li>

               
            </ul>

        </div>

        


    </div>
</nav>
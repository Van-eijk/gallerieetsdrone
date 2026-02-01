<nav class="navbar navbar-expand-lg nav-responsive navbar-dark fixed-top bg-info w-100">
    <div class="container-fluid main-nav w-100">
        <a href="index.php" class="navbar-brand text-uppercase fw-bold text-dark">
            
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
                    <a href="serviceclient.php" class="nav-link text-dark active">Service client</a>
                </li>

                <li class="nav-item ps-3">
                    <a href="apropos.php" class="nav-link text-dark">A propos</a>
                </li>

                <li class="nav-item ps-3">
                    <a href="listeclient.php" class="nav-link text-dark">Nos sponsors</a>
                </li>

                

                <li class="nav-item ps-3">
                    <a href="profilmembre.php" class="nav-link text-dark"> Nous contacter</a>
                </li>

                <li class="nav-item ps-3">
                     <!-- Confert popupdeconnexion.php -->

                    <a class="nav-link text-dark"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" style=" cursor: pointer;"><i class="bi bi-person-circle"></i></a>
                </li>
            </ul>

        </div>

        


    </div>
</nav>
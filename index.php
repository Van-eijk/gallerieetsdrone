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
    <title>galerieetsdrone</title>




    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>
    <div class="container-fluid bg-light">
        <?php include 'header.php'; ?>

        <div class="slide-presentation">

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active " data-bs-interval="2000">
                <img src="img/slide/d.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="img/slide/e.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="img/slide/f.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>

        </div>

        <h2  class="m-3">Visitez par catégories</h2>


        <div class="categorie border mt-5 mb-5 d-flex justify-content-center">
            <a href="listearticle.php?categorie=SCULPTURE" class="m-3 p-2">SCULPTURE</a>
            <a href="listearticle.php?categorie=OBJETS ANCIENS" class="m-3 p-2">OBJETS ANCIENS</a>
            <a href="listearticle.php?categorie=VETEMENTS - BIJOUX - DEDICACES" class="m-3 p-2">VETEMENTS - BIJOUX - DEDICACES</a>
            <a href="listearticle.php?categorie=PHOTOGRAPHIES" class="m-3 p-2">PHOTOGRAPHIES</a>
            <a href="listearticle.php?categorie=DESTINATION TOURISTIQUES & ARTISTIQUES" class="m-3 p-2">DESTINATION TOURISTIQUES & ARTISTIQUES</a>
            <a href="listearticle.php?categorie=LITTERATURE" class="m-3 p-2">LITTERATURE</a>
            <a href="listearticle.php?categorie=PRODUITS" class="m-3 p-2">PRODUITS</a>
            <a href="listearticle.php?categorie=BLOG" class="m-3 p-2">BLOG</a>
            <a href="listearticle.php?categorie=BIENTURES" class="m-3 p-2">BIENTURES</a>


        </div>
        
    </div>
    












 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>
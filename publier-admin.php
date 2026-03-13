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
    <title>publier</title>


    <link rel="stylesheet" href="css/publier-admin.css">
</head>
<body>
    <div class="container">
        <?php include 'header-admin.php' ?>
        <h2>Publier un article</h2>
        <div class="formulaire">

            <form action="" method="post" enctype="multipart/form-data">


                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected>Catégorie de la publication</option>
                    <option value="SCULPTURE">SCULPTURE</option>
                    <option value="OBJETS ANCIENS">OBJETS ANCIENS</option>
                    <option value="VETEMENTS-BIJOUX-DEDICACES">VETEMENTS-BIJOUX-DEDICACES</option>

                    <option value="PHOTOGRAPHIES">PHOTOGRAPHIES</option>
                    <option value="DESTINATION TOURISTIQUES ET ARTISTIQUES">DESTINATION TOURISTIQUES ET ARTISTIQUES</option>
                    <option value="LITTERATURE">LITTERATURE</option>

                    <option value="PRODUITS">PRODUITS</option>
                    <option value="BLOG">BLOG</option>
                    <option value="PEINTURES">PEINTURES</option>
                </select>

            


                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Titre publication">
                    <label for="floatingInput">Titre publication</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Description de l'article " id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Description</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Auteur de l'article">
                    <label for="floatingInput">Auteur de l'article</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingPassword" placeholder="Prix">
                    <label for="floatingPassword">Prix</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="file" name="image[]" class="form-control" id="floatingInput" placeholder="Image de l'article" multiple>
                    <label for="floatingInput">Image de l'article</label>
                </div>




               


                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>

        </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
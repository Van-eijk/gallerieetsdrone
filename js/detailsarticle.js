let imagesSlide = document.getElementsByClassName('main-img'); // On récupère l'ensemble des images principales
let sidePicture = document.getElementsByClassName('second-img'); // Ici on récupère l'ensemble des images secondaires
/* On doit d'abord afficher la premiere image */
let bordureImage = "4px solid blue"; // On définit les bordures des images secondaires
imagesSlide[0].classList.add('active');
//imagesSlide[0].style.opacity = '1'; // On met l'opacité à 1 pour la première image


/* On met aussi en évidence l'image qui correspond dans le coté droit */

sidePicture[0].style.border = bordureImage; // Ajout des bordures sur la première images
let etapeSlide = 0;
let nombreImageSlide = imagesSlide.length;




// La fonction suivante permet de desactiver toutes les images principales

function desactiverImages() {
    for (let i = 0; i < imagesSlide.length; i++) {
        imagesSlide[i].classList.remove('active'); // On désactive toutes les images
        sidePicture[i].style.border = "none"; // On enlève les bordures sur toutes les images
    }
}

// la fonction suivante permet de passer de l'image actuelle à l'image suivante

function nextPicture() {
    etapeSlide++;
    if (etapeSlide >= nombreImageSlide) {
        // Si l'etape est superieur ou egale au nombre total d'images, on ramene l'etape à zero pour éviter d'afficher une image qui n'existe pas
        etapeSlide = 0;
    }

    desactiverImages(); // On desactive toutes les images
    imagesSlide[etapeSlide].classList.add('active'); // On active uniquement l'image correspondant à l'etape actuelle
    sidePicture[etapeSlide].style.border = bordureImage; // On met en évidence l'image active à travers les bordures
}

// La fonction suivante permet de passer de l'étape actuelle à l'étape précédente


function prevPicture() {
    etapeSlide--;

    if (etapeSlide < 0) {
        etapeSlide = nombreImageSlide - 1;
    }
    desactiverImages();
    imagesSlide[etapeSlide].classList.add('active');
    sidePicture[etapeSlide].style.border = bordureImage; // On met en évidence l'image active à travers les bordures

}


// La fonction suivante permet de selectionner les images secondaires au hasard

function pictureRandom() {
    for (let i = 0; i < sidePicture.length; i++) {
        sidePicture[i].addEventListener('click', function () {

            desactiverImages(); // On desactive toutes les images
            imagesSlide[i].classList.add('active'); // On active uniquement l'image correspondant à l'etape actuelle
            sidePicture[i].style.border = bordureImage; // On met en évidence l'image active à travers les bordures
            etapeSlide = i; // On fait la mise à jour de l'étape

        });
    }
}


// La fonction suivante permet de defiler les images automatiquement

setInterval(nextPicture, 4000);

//setInterval(pictureRandom, 500);

pictureRandom();

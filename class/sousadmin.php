<?php

    // Import des classes Intervention pour le traitement des images
    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Gd\Driver;

    
    class SousAdmin extends Admin {

        private $idSousAdmin ; // identifiant du sous admin, clé étrangère de la table admin

        // Getters et Setters

        /**
         * Get the value of idSousAdmin
         */ 
        public function getIdSousAdmin()
        {
                return $this->idSousAdmin;
        }

        /**
         * Set the value of idSousAdmin
         *
         * @return  self
         */ 
        public function setIdSousAdmin($idSousAdmin)
        {
                $this->idSousAdmin = $idSousAdmin;

                return $this;
        }

        // constructeur
       /* public function __construct($idAdmin, $nomAdmin, $emailAdmin,$telAdmin, $motDePasseAdmin, $dateInscription, $typeAdmin, $etatAdmin, $idSousAdmin) {
            $this->idAdmin = $idAdmin;
            $this->nomAdmin = $nomAdmin;
            $this->emailAdmin = $emailAdmin;
            $this->telAdmin = $telAdmin;
            $this->motDePasseAdmin = $motDePasseAdmin;
            $this->dateInscription = $dateInscription;
            $this->typeAdmin = $typeAdmin;
            $this->etatAdmin = $etatAdmin;
            $this->idSousAdmin = $idSousAdmin;

        }*/

        
        // Methodes

        public function ajouterPublication($idAdmin, $categoriePublication, $titrePublication, $descriptionPublication, $imagePublication, $auteurPublication, $prixPublication){
            include 'database/configdatabase.php';

            // code pour ajouter une publication dans la base de données
            //echo "Le sous admin peut ajouter une publication.";
 

          
            // Création du gestionnaire d’images avec le driver GD
            $manager = new ImageManager(new Driver());

            // Dossier des images principales
            $uploadDir = __DIR__ . '/../uploads/';

            // Dossier des miniatures
            $thumbDir  = __DIR__ . '/../uploads/thumbs/';

            // Tableau pour stocker les chemins des images uploadées
            $uploadedImages = [];

            // 🔥 Limite à 100 images maximum
            $files = array_slice($imagePublication['name'], 0, 100);

            // Boucle sur chaque image
            foreach ($files as $key => $value) {

                // Vérifie qu’il n’y a pas d’erreur d’upload
                if ($imagePublication['error'][$key] === 0) {

                    // Chemin temporaire du fichier
                    $tmpName = $imagePublication['tmp_name'][$key];

                    // Génère un nom unique
                    $newName = $titrePublication . '_' . uniqid() . '.jpg';

                    // Lecture de l’image
                    $image = $manager->read($tmpName);

                    // --- IMAGE PRINCIPALE ---
                    $image->scale(width: 1000); // Redimensionne largeur max 1000px
                    $image->save($uploadDir . $newName, quality: 85);

                    // --- THUMBNAIL ---
                    $thumb = $manager->read($tmpName);
                    $thumb->scale(width: 250); // Miniature 250px
                    $thumb->save($thumbDir . $newName, quality: 80);

                    // Stocke le chemin relatif
                    $uploadedImages[] = 'uploads/' . $newName;

                    echo "Upload OK : " . $newName . "<br>";

                }
            }

            // Maintenant, on va transformer le tableau des images en JSON (selialiser) pour l’enregistrer dans la base de données

            /*for($j = 0 ; $j < count($uploadedImages) ; $j++){
                echo $uploadedImages[$j] . " <br>" ;
            }*/
            
            $imagesJSON = json_encode($uploadedImages) ; // Sérialisation du tableau des chemins d’images

            // Insertion dans la base de données
            $reqAjouterPublication = $connexionDataBase->prepare("INSERT INTO publication (idPublicationAdmin, categorie, titre, description, prix, auteur, image) VALUES (:idAdmin, :categoriePublication, :titrePublication, :descriptionPublication, :prixPublication, :auteurPublication, :imagesJSON)") ;
            $reqAjouterPublication->execute(array(
                'idAdmin'=>$idAdmin,
                'categoriePublication'=>$categoriePublication,
                'titrePublication'=>$titrePublication,
                'descriptionPublication'=>$descriptionPublication,
                'prixPublication'=>$prixPublication,
                'auteurPublication'=>$auteurPublication,

                'imagesJSON'=>$imagesJSON,
            )) ;   
            
            return true ;
            
           

        }





        public function modifierPublication($idPublication, $idAdmin, $etatAdmin){

        }
        public function supprimerPublication($idPublication, $idAdmin, $etatAdmin){
            
        }


       

        
    }
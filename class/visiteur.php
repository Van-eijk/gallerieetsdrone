<?php

    class Visiteur{


        public function commander(){

        }


        public function listerArticle($lienFichierBDD, $categorieArticle){
            include $lienFichierBDD ;
            $reqListerArticle = $connexionDataBase->prepare("SELECT * FROM publication WHERE categorie = :categorieArticle") ;
            $reqListerArticle->execute(array('categorieArticle' => $categorieArticle)) ;

            if($reqListerArticle ->rowCount() >= 1){
               
                $resultatListerArticle = $reqListerArticle->fetchAll(PDO::FETCH_ASSOC) ;
                return $resultatListerArticle ;
                
            }
            else{
                return false ;
            }
            

        }

        public function detailsArticle($idArticle, $lienFichierBDD){
            include $lienFichierBDD ;
            $reqDetailsArticle = $connexionDataBase->prepare("SELECT * FROM publication WHERE idPublication = :idArticle") ;
            $reqDetailsArticle->execute(array('idArticle' => $idArticle)) ;

            if($reqDetailsArticle ->rowCount() == 1){
               
                $resultatDetailsArticle = $reqDetailsArticle->fetch(PDO::FETCH_ASSOC) ;
                return $resultatDetailsArticle ;
                
            }
            else{
                return false ;
            }
            

        }

        // Fonction pour tronquer le texte de description dans la page listearticle.php

        public function tronquerText($texte, $longueur_max = 100, $suite = '...') {
            if (strlen($texte) <= $longueur_max) {
                return $texte;
            }
            
            // Couper à la longueur max
            $texte_tronque = substr($texte, 0, $longueur_max);
            
            // Trouver la dernière position d'un espace
            $dernier_espace = strrpos($texte_tronque, ' ');
            
            if ($dernier_espace !== false) {
                $texte_tronque = substr($texte_tronque, 0, $dernier_espace);
            }
            
            return $texte_tronque . $suite;
        }

       
    }
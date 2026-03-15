<?php

    class Visiteur{


        public function commander(){

        }

        public function nombreCommentaire($idArticle, $lienFichierBDD){
            include $lienFichierBDD ;
            $reqNombreCommentaire = $connexionDataBase->prepare("SELECT COUNT(*) AS nombreCommentaire FROM commentaire WHERE idCommentairePublication = :idArticle") ;
            $reqNombreCommentaire->execute(array('idArticle' => $idArticle)) ;

            if($reqNombreCommentaire ->rowCount() == 1){
               
                $resultatNombreCommentaire = $reqNombreCommentaire->fetch(PDO::FETCH_ASSOC) ;
                return $resultatNombreCommentaire['nombreCommentaire'] ;
                
            }
            else{
                return false ;
            }
        }

        public function afficherCommentaireVisiteur($idArticle, $lienFichierBDD){
            include $lienFichierBDD ;
            $reqAfficherCommentaireVisiteur = $connexionDataBase->prepare("SELECT * FROM commentaire WHERE idCommentairePublication = :idArticle") ;
            $reqAfficherCommentaireVisiteur->execute(array('idArticle' => $idArticle)) ;

            if($reqAfficherCommentaireVisiteur ->rowCount() >= 1){
               
                $resultatAfficherCommentaireVisiteur = $reqAfficherCommentaireVisiteur->fetchAll(PDO::FETCH_ASSOC) ;
                return $resultatAfficherCommentaireVisiteur ;
                
            }
            else{
                return false ;
            }


        }


        public function commenterArticle($idPublication, $nomVisiteur, $emailVisiteur, $telVisiteur, $note){
            include 'database/configdatabase.php' ;
            $reqCommenterArticle = $connexionDataBase->prepare("INSERT INTO commentaire (idCommentairePublication, nomVisiteur, emailVisiteur,telVisiteur, note) VALUES (:idPublication, :nomVisiteur, :emailVisiteur, :telVisiteur, :note)") ;
            $reqCommenterArticle->execute(array(
                'idPublication'=>$idPublication,
                'nomVisiteur'=>$nomVisiteur,
                'emailVisiteur'=>$emailVisiteur,
                'telVisiteur'=>$telVisiteur,
                'note'=>$note
            )) ;

            return true ;

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
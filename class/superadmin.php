<?php 

    
    class SuperAdmin extends Admin {

        private $idSuperAdmin ; // identifiant du super admin, clé étrangère de la table admin

        // Getters et Setters
         /**
         * Get the value of idSuperAdmin
         */ 
        public function getIdSuperAdmin()
        {
                return $this->idSuperAdmin;
        }

        /**
         * Set the value of idSuperAdmin
         *
         * @return  self
         */ 
        public function setIdSuperAdmin($idSuperAdmin)
        {
                $this->idSuperAdmin = $idSuperAdmin;

                return $this;
        }

        // constructeur
       /* public function __construct($idAdmin, $nomAdmin, $emailAdmin,$telAdmin, $motDePasseAdmin, $dateInscription, $typeAdmin, $etatAdmin, $idSuperAdmin) {
            $this->idAdmin = $idAdmin;
            $this->nomAdmin = $nomAdmin;
            $this->emailAdmin = $emailAdmin;
            $this->telAdmin = $telAdmin;
            $this->motDePasseAdmin = $motDePasseAdmin;
            $this->dateInscription = $dateInscription;
            $this->typeAdmin = $typeAdmin;
            $this->etatAdmin = $etatAdmin;
            $this->idSuperAdmin = $idSuperAdmin;
        }*/

        // Methodes

        public function ajouterPublication($idAdmin,$categoriePublication, $titrePublication, $descriptionPublication, $imagePublication, $auteurPublication, $prixPublication){
            echo "Le super admin ne peut pas ajouter une publication, cette action est réservée aux sous admins.";

        }


        public function modifierPublication($lienFichierBDD, $idPublication, $categoriePublication, $titrePublication, $descriptionPublication, $prixPublication, $auteurPublication){
            include $lienFichierBDD ;
            // On recupère d'abord le nom de l'admin qui a publier la publication

            $reqNomAdmin = $connexionDataBase->prepare("SELECT nomAdmin FROM admin INNER JOIN publication ON idAdmin = idPublicationAdmin WHERE idPublication = :idPub ");
            $reqNomAdmin->execute(array(
                'idPub' => $idPublication
            ));
            $resultReqNomAdmin = $reqNomAdmin->fetch();
            $resultatListerAdmins = $resultReqNomAdmin['nomAdmin'];

            $dateModification = date('Y-m-d H:i:s') ;

            $reqModification = $connexionDataBase->prepare("UPDATE publication set categorie = :cat, titre = :titreM, description = :descrip, prix = :pri, auteur = :aut, nomModificateur = :nomM, dateModification = :dateM WHERE idPublication = :idPub");
            $reqModification->execute(array(
                'cat' => $categoriePublication,
                'titreM' => $titrePublication,
                'descrip' => $descriptionPublication,
                'pri' => $prixPublication,
                'aut' => $auteurPublication,
                'nomM' => $resultatListerAdmins,
                'dateM' => $dateModification,
                'idPub' => $idPublication

            )) ;

            return true ;



        }


      /*  public function modifierPublication($connexionDataBase, $idPublication, $categoriePublication, $titrePublication, $descriptionPublication, $prixPublication, $auteurPublication){

    // Récupération du nom de l'admin
    $reqNomAdmin = $connexionDataBase->prepare("
        SELECT admin.nomAdmin 
        FROM admin 
        INNER JOIN publication 
        ON admin.idAdmin = publication.idPublicationAdmin 
        WHERE publication.idPublication = :idPub
    ");

    $reqNomAdmin->execute([
        'idPub' => $idPublication
    ]);

    $resultReqNomAdmin = $reqNomAdmin->fetch();

    if(!$resultReqNomAdmin){
        return false;
    }

    $nomAdmin = $resultReqNomAdmin['nomAdmin'];

    // Date correcte pour MySQL
    $dateModification = date('Y-m-d H:i:s');

    // Requête UPDATE
    $reqModification = $connexionDataBase->prepare("
        UPDATE publication 
        SET categorie = :cat, 
            titre = :titreM, 
            description = :descrip, 
            prix = :pri, 
            auteur = :aut, 
            nomModificateur = :nomM, 
            dateModification = :dateM 
        WHERE idPublication = :idPub
    ");

    $reqModification->execute([
        'cat' => $categoriePublication,
        'titreM' => $titrePublication,
        'descrip' => $descriptionPublication,
        'pri' => $prixPublication,
        'aut' => $auteurPublication,
        'nomM' => $nomAdmin,
        'dateM' => $dateModification,
        'idPub' => $idPublication
    ]);

    return $reqModification->rowCount() > 0;
}

*/

        public function detailAdmin($lienFichierBDD, $idAdmin){
            include $lienFichierBDD ;

            $reqDetailAdmin = $connexionDataBase->prepare('SELECT * FROM admin WHERE idAdmin = :id');
            $reqDetailAdmin->execute(array(
                'id' => $idAdmin
            )) ;

            if($reqDetailAdmin->rowCount() >= 1){
                $resultReqDetailAdmin = $reqDetailAdmin ->fetch();
                return $resultReqDetailAdmin ;
            }
            else{
                return false ;
            }

            

        }

        public function bloquerAdmin($lienFichierBDD, $idAdmin){
            include $lienFichierBDD;

            $etat = "";

            $reqEtatAdmin = $connexionDataBase->prepare('SELECT etatAdmin FROM admin WHERE idAdmin = :id');
            $reqEtatAdmin->execute(array(
                'id' => $idAdmin
            ));


            if($reqEtatAdmin -> rowCount() >= 1){
                $resultatReqEtatAdmin = $reqEtatAdmin -> fetch();

                $etatAdmin = $resultatReqEtatAdmin['etatAdmin'];

                if($etatAdmin == "actif"){
                    $etat = "bloque";
                    $reqBloquerAdmin = $connexionDataBase->prepare('UPDATE admin SET etatAdmin = :bloquer WHERE idAdmin = :id');
                    $reqBloquerAdmin->execute(array(
                        'bloquer' => $etat,
                        'id' => $idAdmin
                    ));
                }else{
                    $etat = "actif" ;

                    $reqActiverAdmin = $connexionDataBase->prepare('UPDATE admin SET etatAdmin = :activer WHERE idAdmin = :id');
                    $reqActiverAdmin->execute(array(
                        'activer' => $etat,
                        'id' => $idAdmin
                    ));
                }

                return true ;


            }else{
                return false ;
            }

            

            
        }
        


        public function ajouterAdmin($typeAdmin, $nomAdmin, $emailAdmin, $telAdmin, $mdpAdmin, $confirmerMdpAdmin){
            include 'database/configdatabase.php';
            if($mdpAdmin == $confirmerMdpAdmin){
                $mdpHash = password_hash($mdpAdmin, PASSWORD_DEFAULT) ;

                $reqAjouterAdmin = $connexionDataBase->prepare("INSERT INTO admin (nomAdmin, emailAdmin, telAdmin, motDePasseAdmin, typeAdmin) VALUES (:nomAdmin, :emailAdmin, :telAdmin, :motDePasseAdmin, :typeAdmin)") ;
                $reqAjouterAdmin->execute(array(
                    'nomAdmin'=>$nomAdmin,
                    'emailAdmin'=>$emailAdmin,
                    'telAdmin'=>$telAdmin,
                    'motDePasseAdmin'=>$mdpHash,
                    'typeAdmin'=>$typeAdmin
                )) ;

                // Récupérer l'id de l'admin ajouté pour l'insérer dans la table correspondante (sousadmin ou superadmin)

                if($typeAdmin == "sousadmin"){
                    $idAdmin = $connexionDataBase->lastInsertId() ; // Récupérer l'id de l'admin ajouté
                    $reqAjouterSousAdmin = $connexionDataBase->prepare("INSERT INTO sousadmin (idSousAdmin) VALUES (:idSousAdmin)") ;
                    $reqAjouterSousAdmin->execute(array(
                        'idSousAdmin'=>$idAdmin
                    )) ;
                }else{
                    $idAdmin = $connexionDataBase->lastInsertId() ; // Récupérer l'id de l'admin ajouté
                    $reqAjouterSuperAdmin = $connexionDataBase->prepare("INSERT INTO superadmin (idSuperAdmin) VALUES (:idSuperAdmin)") ;
                    $reqAjouterSuperAdmin->execute(array(
                        'idSuperAdmin'=>$idAdmin
                    )) ;
                }

                header("Location:ajout-admin.php");
            }else{
                return false ;
            }

        }


        public function modifierAdmin($idAdmin){

        }
        
       



        public function listerAdmin($lienFichierBDD){
            include $lienFichierBDD ;
            $reqListerAdmins = $connexionDataBase->prepare("SELECT * FROM admin") ;
            $reqListerAdmins->execute() ;

            if($reqListerAdmins ->rowCount() >= 1){
               
                $resultatListerAdmins = $reqListerAdmins->fetchAll(PDO::FETCH_ASSOC) ;
                return $resultatListerAdmins ;
                
            }
            else{
                return false ;
            }
            

        }

        

        

       
    }


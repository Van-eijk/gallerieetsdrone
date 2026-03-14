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
        public function modifierPublication($idPublication, $idAdmin, $etatAdmin){

        }
        public function supprimerPublication($idPublication, $idAdmin, $etatAdmin){
            
        }
        public function supprimerCommentaire($idCommentaire, $idAdmin){
            
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
        public function bloquerAdmin($idAdmin){
            
        }
        public function debloquerAdmin($idAdmin){
            
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


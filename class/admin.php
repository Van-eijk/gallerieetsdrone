<?php
        abstract class Admin {

            // Attributs
            protected $idAdmin ;
            protected $nomAdmin ;
            protected $emailAdmin ;
            protected $telAdmin ;
            protected $motDePasseAdmin ;
            protected $dateInscription ;
            protected $typeAdmin ; // superadmin ou sousadmin
            protected $etatAdmin ; // actif ou bloqué

                // constructeur
               /* public function __construct($idAdmin, $nomAdmin, $emailAdmin,$telAdmin, $motDePasseAdmin, $dateInscription, $typeAdmin, $etatAdmin) {
                $this->idAdmin = $idAdmin;
                $this->nomAdmin = $nomAdmin;
                $this->emailAdmin = $emailAdmin;
                $this->telAdmin = $telAdmin;
                $this->motDePasseAdmin = $motDePasseAdmin;
                $this->dateInscription = $dateInscription;
                $this->typeAdmin = $typeAdmin;
                $this->etatAdmin = $etatAdmin;
                }*/

            // Getters

        

                /**
                 * Get the value of dateInscription
                 */
                public function getDateInscription()
                {
                        return $this->dateInscription;
                }

                /**
                 * Set the value of dateInscription
                 *
                 * @return  self
                 */ 
                public function setDateInscription($dateInscription)
                {
                        $this->dateInscription = $dateInscription;

                        return $this;
                }

                /**
                 * Get the value of motDePasseAdmin
                 */ 
                public function getMotDePasseAdmin()
                {
                        return $this->motDePasseAdmin;
                }

                /**
                 * Set the value of motDePasseAdmin
                 *
                 * @return  self
                 */ 
                public function setMotDePasseAdmin($motDePasseAdmin)
                {
                        $this->motDePasseAdmin = $motDePasseAdmin;

                        return $this;
                }

                /**
                 * Get the value of telAdmin
                 */ 
                public function getTelAdmin()
                {
                        return $this->telAdmin;
                }

                /**
                 * Set the value of telAdmin
                 *
                 * @return  self
                 */ 
                public function setTelAdmin($telAdmin)
                {
                        $this->telAdmin = $telAdmin;

                        return $this;
                }

                /**
                 * Get the value of emailAdmin
                 */
                public function getEmailAdmin()
                {
                        return $this->emailAdmin;
                }

                /**
                 * Set the value of emailAdmin
                 */
                public function setEmailAdmin($emailAdmin)
                {
                        $this->emailAdmin = $emailAdmin;

                        return $this;
                }

                /**
                 * Get the value of nomAdmin
                 */
                public function getNomAdmin()
                {
                        return $this->nomAdmin;
                }

                /**
                 * Set the value of nomAdmin
                 */
                public function setNomAdmin($nomAdmin): self
                {
                        $this->nomAdmin = $nomAdmin;

                        return $this;
                }

                /**
                 * Get the value of idAdmin
                 */
                public function getIdAdmin()
                {
                        return $this->idAdmin;
                }

                /**
                 * Set the value of idAdmin
                 */
                public function setIdAdmin($idAdmin): self
                {
                        $this->idAdmin = $idAdmin;

                        return $this;
                }


                /**
                 * Get the value of typeAdmin
                 */ 
                public function getTypeAdmin()
                {
                        return $this->typeAdmin;
                }

                /**
                 * Set the value of typeAdmin
                 *
                 * @return  self
                 */ 
                public function setTypeAdmin($typeAdmin)
                {
                        $this->typeAdmin = $typeAdmin;

                        return $this;
                }

                /**
                 * Get the value of etatAdmin
                 */ 
                public function getEtatAdmin()
                {
                        return $this->etatAdmin;
                }

                /**
                 * Set the value of etatAdmin
                 *
                 * @return  self
                 */ 
                public function setEtatAdmin($etatAdmin)
                {
                        $this->etatAdmin = $etatAdmin;

                        return $this;
                }

                // Methodes abstraites qui seront implémentées dans les classes filles

                abstract public function ajouterPublication($idAdmin,$categoriePublication, $titrePublication, $descriptionPublication, $imagePublication, $auteurPublication, $prixPublication); // Car le super admin n'a pas le droit d'ajouter une publication, cette méthode sera implémentée uniquement dans la classe SousAdmin
                abstract public function modifierPublication($idPublication, $idAdmin, $etatAdmin); // Chaque admin ne peut modifier que ses publications mais le superadmin peut modifier toutes les publications, cette méthode sera implémentée dans les classes SousAdmin et Superadmin
                abstract public function supprimerPublication($idPublication, $idAdmin, $etatAdmin); // chaque admin ne peut supprimer que ses publications mais le superadmin peut supprimer toutes les publications, cette méthode sera implémentée dans les classes SousAdmin et Superadmin

                // Methodes communes à tous les types d'admin

                public function afficherPublication(){

                }

                public function afficherCommentaire(){

                }

                public function connexionAdmin($emailAdmin, $motDePasseAdmin, $lienFichierBDD, $lienPageAccueil){
                        //echo("bobo");
                        include $lienFichierBDD ;

                        $reqConnexionAdmin = $connexionDataBase->prepare("SELECT * FROM admin WHERE emailAdmin = :emailAdmin") ;
                        $reqConnexionAdmin->execute(array(
                                'emailAdmin'=>$emailAdmin
                        )) ;

                        $resultatConnexionAdmin = $reqConnexionAdmin->fetch();
                        //echo $resultatConnexionAdmin['typeAdmin'] ;

                        if(!$resultatConnexionAdmin){
                                return false;
                        }
                        else{
                                if(password_verify($motDePasseAdmin, $resultatConnexionAdmin['motDePasseAdmin'])){
                                        session_start();
                                        $_SESSION['emailAdmin'] = $resultatConnexionAdmin['emailAdmin'];
                                        $_SESSION['idAdmin'] = $resultatConnexionAdmin['idAdmin'];
                                        $_SESSION['typeAdmin'] = $resultatConnexionAdmin['typeAdmin'];

                                        $_SESSION['nomAdmin'] = $resultatConnexionAdmin['nomAdmin'];
                                        $_SESSION['telAdmin'] = $resultatConnexionAdmin['telAdmin'];
                                        $_SESSION['dateInscription'] = $resultatConnexionAdmin['dateInscription'];
                                        $_SESSION['etatAdmin'] = $resultatConnexionAdmin['etatAdmin'];
                                        $_SESSION['idAdmin'] = $resultatConnexionAdmin['idAdmin'];
                                        echo $resultatConnexionAdmin['nomAdmin'] ;

                                        header("Location:$lienPageAccueil");
                                }else{
                                        return false;
                                }

                        }
                       

                       
                }




                public function deconnexionAdmin($lienPageAccueil){
                        session_start();
                        $_SESSION = array();
                        session_destroy();
                        header("Location:$lienPageAccueil");
                }


            

            
        }
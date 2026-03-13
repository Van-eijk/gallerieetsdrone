<?php

    
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

        public function ajouterPublication(){
            echo "Le sous admin peut ajouter une publication.";
            echo $this->nomAdmin;

        }
        public function modifierPublication($idPublication, $idAdmin, $etatAdmin){

        }
        public function supprimerPublication($idPublication, $idAdmin, $etatAdmin){
            
        }


       

        
    }
<?php
    
    include 'visiteur.php' ;

    class Admin extends Visiteur {

        // Attributs
        protected $idAdmin ;
        protected $nomAdmin ;
        protected $emailAdmin ;
        protected $telAdmin ;
        protected $motDePasseAdmin ;
        protected $dateInscription ;


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
        public function setEmailAdmin($emailAdmin): self
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


        // Methodes

        public function ajouterPublication(){

        }

        public function modifierPublication(){

        }

        public function supprimerPublication(){

        }
    }
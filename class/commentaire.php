<?php
    class Commentaire{
        private $idCommantaire ;
        private $idCommantairePublication ;
        private $nomVisiteur ;
        private $emailVisiteur ;
        private $telVisiteur ;
        private $note ;
        private $dateHeure ;

        /**
         * Get the value of idCommantaire
         */ 
        public function getIdCommantaire()
        {
                return $this->idCommantaire;
        }

        /**
         * Set the value of idCommantaire
         *
         * @return  self
         */ 
        public function setIdCommantaire($idCommantaire)
        {
                $this->idCommantaire = $idCommantaire;

                return $this;
        }

        /**
         * Get the value of idCommantairePublication
         */ 
        public function getIdCommantairePublication()
        {
                return $this->idCommantairePublication;
        }

        /**
         * Set the value of idCommantairePublication
         *
         * @return  self
         */ 
        public function setIdCommantairePublication($idCommantairePublication)
        {
                $this->idCommantairePublication = $idCommantairePublication;

                return $this;
        }

        /**
         * Get the value of nomVisiteur
         */ 
        public function getNomVisiteur()
        {
                return $this->nomVisiteur;
        }

        /**
         * Set the value of nomVisiteur
         *
         * @return  self
         */ 
        public function setNomVisiteur($nomVisiteur)
        {
                $this->nomVisiteur = $nomVisiteur;

                return $this;
        }

        /**
         * Get the value of emailVisiteur
         */ 
        public function getEmailVisiteur()
        {
                return $this->emailVisiteur;
        }

        /**
         * Set the value of emailVisiteur
         *
         * @return  self
         */ 
        public function setEmailVisiteur($emailVisiteur)
        {
                $this->emailVisiteur = $emailVisiteur;

                return $this;
        }

        /**
         * Get the value of telVisiteur
         */ 
        public function getTelVisiteur()
        {
                return $this->telVisiteur;
        }

        /**
         * Set the value of telVisiteur
         *
         * @return  self
         */ 
        public function setTelVisiteur($telVisiteur)
        {
                $this->telVisiteur = $telVisiteur;

                return $this;
        }

        /**
         * Get the value of note
         */ 
        public function getNote()
        {
                return $this->note;
        }

        /**
         * Set the value of note
         *
         * @return  self
         */ 
        public function setNote($note)
        {
                $this->note = $note;

                return $this;
        }

        /**
         * Get the value of dateHeure
         */ 
        public function getDateHeure()
        {
                return $this->dateHeure;
        }

        /**
         * Set the value of dateHeure
         *
         * @return  self
         */ 
        public function setDateHeure($dateHeure)
        {
                $this->dateHeure = $dateHeure;

                return $this;
        }

        // Constructeur
        public function __construct($idCommantaire, $idCommantairePublication, $nomVisiteur, $emailVisiteur, $telVisiteur, $note, $dateHeure) {
            $this->idCommantaire = $idCommantaire;
            $this->idCommantairePublication = $idCommantairePublication;
            $this->nomVisiteur = $nomVisiteur;
            $this->emailVisiteur = $emailVisiteur;
            $this->telVisiteur = $telVisiteur;
            $this->note = $note;
            $this->dateHeure = $dateHeure;

        }
    }
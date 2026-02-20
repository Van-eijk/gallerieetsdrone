<?php
    class Publication{
        private $idPublication ;
        private $idPublicationAdmin ;
        private $titre ;
        private $description ;
        private $prix ;
        private $auteur ;
        private $image ;
        private $dateHeure ;

        /**
         * Get the value of idPublication
         */ 
        public function getIdPublication()
        {
                return $this->idPublication;
        }

        /**
         * Set the value of idPublication
         *
         * @return  self
         */ 
        public function setIdPublication($idPublication)
        {
                $this->idPublication = $idPublication;

                return $this;
        }

        /**
         * Get the value of idPublicationAdmin
         */ 
        public function getIdPublicationAdmin()
        {
                return $this->idPublicationAdmin;
        }

        /**
         * Set the value of idPublicationAdmin
         *
         * @return  self
         */ 
        public function setIdPublicationAdmin($idPublicationAdmin)
        {
                $this->idPublicationAdmin = $idPublicationAdmin;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of prix
         */ 
        public function getPrix()
        {
                return $this->prix;
        }

        /**
         * Set the value of prix
         *
         * @return  self
         */ 
        public function setPrix($prix)
        {
                $this->prix = $prix;

                return $this;
        }

        /**
         * Get the value of auteur
         */ 
        public function getAuteur()
        {
                return $this->auteur;
        }

        /**
         * Set the value of auteur
         *
         * @return  self
         */ 
        public function setAuteur($auteur)
        {
                $this->auteur = $auteur;

                return $this;
        }

        /**
         * Get the value of image
         */ 
        public function getImage()
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

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
    }
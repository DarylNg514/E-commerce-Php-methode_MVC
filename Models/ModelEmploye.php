<?php
     
    namespace App\Models;

    class ModelEmploye extends Model{

        protected $name;
        protected $salaire;
        protected $adresse;

        public function __construct(){
            $this->table = 'employes';
        }



        /**
         * Get the value of adresse
         */ 
        public function getAdresse()
        {
                return $this->adresse;
        }

        /**
         * Set the value of adresse
         *
         * @return  self
         */ 
        public function setAdresse($adresse)
        {
                $this->adresse = $adresse;

                return $this;
        }

        /**
         * Get the value of salaire
         */ 
        public function getSalaire()
        {
                return $this->salaire;
        }

        /**
         * Set the value of salaire
         *
         * @return  self
         */ 
        public function setSalaire($salaire)
        {
                $this->salaire = $salaire;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
    }
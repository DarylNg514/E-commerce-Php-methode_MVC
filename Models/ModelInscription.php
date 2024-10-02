<?php
     
    namespace App\Models;
    class ModelInscription extends Model
    {
        protected $email;
        protected $nom;
        protected $prenom;
        protected $password;
        protected $telephone;
        protected $date_de_naissance;
        protected $sexe;
        public function __construct()
        {
            $this->table = 'utilisateur';
        }
        public function infosIns($email, $nom, $prenom, $password, $telephone, $date_de_naissance, $sexe){
            $this->email=$email;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->password=$password;
            $this->telephone=$telephone;
            $this->date_de_naissance=$date_de_naissance;
            $this->sexe=$sexe;          
        }
    }
?>
<?php
     
    namespace App\Models;
   
    class ModelUtilisateur extends Model{
        protected $email;
        protected $nom;
        protected $prenom;
        protected $password;
        protected $telephone;
        protected $date_de_naissance;
        protected $sexe;public function getEmail() {return $this->email;}

	public function getNom() {return $this->nom;}

	public function getPrenom() {return $this->prenom;}

	public function getPassword() {return $this->password;}

	public function getTelephone() {return $this->telephone;}

	public function getDateDeNaissance() {return $this->date_de_naissance;}

	public function getSexe() {return $this->sexe;}

	public function setEmail( $email): void {$this->email = $email;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setPrenom( $prenom): void {$this->prenom = $prenom;}

	public function setPassword( $password): void {$this->password = $password;}

	public function setTelephone( $telephone): void {$this->telephone = $telephone;}

	public function setDateDeNaissance( $date_de_naissance): void {$this->date_de_naissance = $date_de_naissance;}

	public function setSexe( $sexe): void {$this->sexe = $sexe;}

	

        public function __construct(){
            $this->table = 'utilisateur';
        }

    }
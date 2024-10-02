<?php
     
    namespace App\Models;
   
    class ModelCommande extends Model{
        protected $nom;
        protected $Nom_et_marque;
        protected $quantite_demander;
        protected $date_commande;
        protected $total;public function getNom() {return $this->nom;}

	public function getNomEtMarque() {return $this->Nom_et_marque;}

	public function getQuantiteDemander() {return $this->quantite_demander;}

	public function getDateCommande() {return $this->date_commande;}

	public function getTotal() {return $this->total;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setNomEtMarque( $Nom_et_marque): void {$this->Nom_et_marque = $Nom_et_marque;}

	public function setQuantiteDemander( $quantite_demander): void {$this->quantite_demander = $quantite_demander;}

	public function setDateCommande( $date_commande): void {$this->date_commande = $date_commande;}

	public function setTotal( $total): void {$this->total = $total;}

        public function __construct(){
            $this->table = 'commande';
        }

    }
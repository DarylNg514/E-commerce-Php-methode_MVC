<?php
     
    namespace App\Models;
   
    class ModelPanier extends Model{
        protected $id;

        public function __construct(){
            $this->table = 'produits';
        }
        public function infosConn($id){
            
            $this->id=$id;
        }

    }
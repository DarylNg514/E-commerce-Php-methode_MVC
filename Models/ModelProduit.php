<?php
     
    namespace App\Models;
   
    class ModelProduit extends Model{
        protected $id;

        public function __construct(){
            $this->table = 'produits';
        }

    }
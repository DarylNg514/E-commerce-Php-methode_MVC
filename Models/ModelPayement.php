<?php
     
    namespace App\Models;
   
    class ModelPayement extends Model{
        protected $id;

        public function __construct(){
            $this->table = 'utilisateur';
        }

    }
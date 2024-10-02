<?php
     
    namespace App\Models;
    class ModelAuthentification extends Model
    {
        protected $email;
        protected $password;
        public function getEmail() {return $this->email;}

	public function getPassword() {return $this->password;}

	public function setEmail( $email): void {$this->email = $email;}

	public function setPassword( $password): void {$this->password = $password;}
        public function __construct()
        {
            $this->table = 'utilisateur';
         }
	
	
        public function infosConn($email,$password){
            
            $this->email=$email;
            $this->password=$password;
        }
    }
?>
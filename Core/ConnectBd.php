<?php
   
   namespace App\Core;
   

    class ConnectBd extends \PDO{

        protected $dbhost = "localhost";
        protected $dbname = "OrdiShop";
        protected $dbuser = "root";
        protected $dbpass = "";
        protected static $instance;

        
        public function __construct() {
            // dsn  de connection
            $dsn = 'mysql:host='.$this->dbhost.';dbname='.$this->dbname;

            try {
                // conecter a la bd
                parent::__construct($dsn, $this->dbuser, $this->dbpass);
                echo " Connexion reussie";
                $this->exec("SET NAMES utf8");
                $this->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
                $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $exeption) {
                echo "ERROR: ".$exeption->getMessage();
            }
        }
        public static function getInstance(): ConnectBd{

            if (self::$instance === null){
                self::$instance = new self();
            }
            return self::$instance;

        } 
        


    }
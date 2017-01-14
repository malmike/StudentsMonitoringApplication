<?php
    
    // Include ConnectDB
    include 'DBConnect.php';
    //// Define configuration
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "root");
    define("DB_NAME", "sma_db");
    

    class DBConnectConfigurations{     
        
        private $dbConnect;

        public function __construct(){
            $this->dbConnect = new DBConnect();
        }  

        public function error(){
            return $this->dbConnect->getError();
        }

        public function dbh(){
            return $this->dbConnect->getDBH();
        }
    }
?>


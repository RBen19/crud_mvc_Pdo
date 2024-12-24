<?php
class Database
{
        private $servername = "localhost";
        private $username = "root";
        private $password = "passer";
        private $dbname = "v2db";
        function getConnexion(){
            $conn=null;
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $conn;
        }
}

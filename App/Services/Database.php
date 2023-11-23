<?php 
    class Database {
        private $conn;
        public function __construct() {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            $this->conn = new PDO("mysql:host=localhost;dbname=burg_login", 'root', '1234', $options);
            $this->conn->exec("SET CHARACTER SET UTF8");
        }

        public function getConn() {
            return $this->conn;
        }

        public function closeConn() {
            $this->conn = null;
        }
    }
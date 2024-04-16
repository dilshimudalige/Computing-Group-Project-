<?php

class DbCon {
    private $host = "localhost"; 
    private $username = "root";
    private $password = ""; 
    private $database = "spark_db"; 
    private $conn;

    public function __construct() {
        $this->conn = $this->connectDB();
    }

    public function connectDB() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function getConnection() {
        return $this->conn;
    }
}

$database = new DbCon();
$conn = $database->getConnection();


?>

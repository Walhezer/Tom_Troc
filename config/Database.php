<?php
class Database
{

    private $host = "localhost";
    private $db_name = "tom_troc";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
       if ($this->conn instanceof PDO) {
        return $this->conn;
       }

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
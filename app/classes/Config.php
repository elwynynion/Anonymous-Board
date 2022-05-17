<?php


class Config {

    private $host = "localhost";
    private $db_name = "test";
    private $username = "root";
    private $password = "";
    private $pdo = null;

    public function connect()
    {
        if(is_null($this->pdo)) {
            try {
                $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
                // echo "Connected to database";
            } catch (PDOException $e) {
                die($e->getMessage());
                // echo "Connection failed";
            }
        }
        return $this->pdo;
    }
    
}
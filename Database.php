<?php

// require_once "config.php";

class Database {
    private $username;
    private $password;
    private $host;
    private $database;
    private $port;

    public function __construct()
    {
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
        $this->host = getenv('DB_HOST');
        $this->database = getenv('DB_NAME');
        $this->port = getenv('DB_PORT'); // Add port
    }

    public function connect()
    {
        try {
            $conn = new PDO(
                "pgsql:host=$this->host;port=$this->port;dbname=$this->database",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );

            return $conn;
        }
        catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

}
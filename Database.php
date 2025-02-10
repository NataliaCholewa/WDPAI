<?php

require_once "/app/vendor/autoload.php";

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('/app');
$dotenv->safeLoad();


class Database {
    private $username;
    private $password;
    private $host;
    private $database;
    private $port;

    public function __construct()
    {
        $this->username = $_ENV['DB_USER'] ?? getenv('DB_USER');
        $this->password = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD');
        $this->host = $_ENV['DB_HOST'] ?? getenv('DB_HOST');
        $this->database = $_ENV['DB_NAME'] ?? getenv('DB_NAME');
        $this->port = $_ENV['DB_PORT'] ?? getenv('DB_PORT');

    }

    public function connect()
    {



        try {
            $conn = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->database}",
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
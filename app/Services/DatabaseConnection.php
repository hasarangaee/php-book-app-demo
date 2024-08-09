<?php
namespace App\Services;

use App\Config\DatabaseConfig;
use PDO;
use PDOException;

class DatabaseConnection {
    private $pdo;

    public function __construct(DatabaseConfig $config) {
        try {
            $dsn = "mysql:host=" . $config->getHost() . ";dbname=" . $config->getName() . ";port=" . $config->getPort();
            $this->pdo = new PDO($dsn, $config->getUser(), $config->getPassword());
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}

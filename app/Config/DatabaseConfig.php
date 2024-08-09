<?php

namespace App\Config;

class DatabaseConfig {
    private $config;

    public function __construct() {
        $configPath = __DIR__ . '/../../config/application.properties';
        $this->config = parse_ini_file($configPath);
        if ($this->config === false) {
            throw new \Exception("Error reading configuration file at {$configPath}");
        }
    }

    public function getHost() {
        return $this->config['database.host'];
    }

    public function getPort() {
        return $this->config['database.port'];
    }

    public function getName() {
        return $this->config['database.name'];
    }

    public function getUser() {
        return $this->config['database.user'];
    }

    public function getPassword() {
        return $this->config['database.password'];
    }
}

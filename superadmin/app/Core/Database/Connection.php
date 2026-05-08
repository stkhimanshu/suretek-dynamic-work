<?php

namespace App\Core\Database;

use PDO;

class Connection
{
    private PDO $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=" . $_ENV['DB_HOST'] .
            ";port=" . $_ENV['DB_PORT'] .
            ";dbname=" . $_ENV['DB_DATABASE'] .
            ";charset=utf8mb4";

        $this->pdo = new PDO(
            $dsn,
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
    }
}

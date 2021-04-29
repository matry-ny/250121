<?php

namespace components;

use PDO;

class DB
{
    private PDO $connection;

    public function __construct(string $host, string $user, string $password, string $db)
    {
        $this->connection = new PDO("mysql:host={$host};dbname={$db}", $user, $password);
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}

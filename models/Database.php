<?php

namespace models;

use PDO;
use PDOException;
use models\Dto\ConnectionDTO;

class Database
{
    private PDO $connection;

    public function __construct(ConnectionDTO $connectionDTO)
    {
        try {
            $this->connection = new PDO("mysql:host={$connectionDTO->host};dbname={$connectionDTO->database}", $connectionDTO->username, $connectionDTO->password);
        } catch (PDOException $e) {
            echo 'Ошибка соединения с базой данных: ' . $e->getMessage();
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
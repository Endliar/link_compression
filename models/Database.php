<?php

namespace models;

use PDO;
use PDOException;
use models\dto\ConnectionDTO;

class Database
{
    private PDO $connection;

    public function __construct(ConnectionDTO $connectionDTO)
    {
        $connectionDTO->setHost($connectionDTO->host);
        $connectionDTO->setDatabase($connectionDTO->database);
        $connectionDTO->setUsername($connectionDTO->username);
        $connectionDTO->setPassword($connectionDTO->password);

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
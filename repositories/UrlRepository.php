<?php

namespace repositories;

use models\Database;
use PDO;

include "C:/xampp/htdocs/link compression/models/Database.php";
include "C:/xampp/htdocs/link compression/models/dto/ConnectionDTO.php";

class UrlRepository
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create($shortName, $url): void
    {
        $connection = $this->database->getConnection();
        $stmt = $connection->prepare("INSERT INTO urls (short_url, url) values (:short_name, :full_url)");
        $stmt->bindParam(':short_name', $shortName);
        $stmt->bindParam(':full_url', $url);
        $stmt->execute();
    }

    public function getAll(): false|array
    {
        $connection = $this->database->getConnection();
        $stmt = $connection->query("SELECT * FROM urls");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id): void
    {
        $connection = $this->database->getConnection();
        $stmt = $connection->prepare("DELETE FROM urls WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function update($id, $url): void
    {
        $connection = $this->database->getConnection();
        $stmt = $connection->prepare("UPDATE urls SET url = :new_url WHERE id = :link_id");
        $stmt->bindParam(':new_url', $url);
        $stmt->bindParam(':link_id', $id);
        $stmt->execute();
    }
}
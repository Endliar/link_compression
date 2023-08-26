<?php

namespace work_with_links;

use Database;
use PDO;

class LinkShortener
{
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function generateLink($url) {
        $connection = $this->database->getConnection();

        $shortName = substr(md5(uniqid()), 0, 6);

        $shortLink = 'https://' . $_SERVER["HTTP_HOST"] . '/' . $shortName;

        $stmt = $connection->prepare("INSERT INTO urls (short_url, url) values (:short_name, :full_url)");
        $stmt->bindParam(':short_name', $shortLink);
        $stmt->bindParam(':full_url', $url);
        $stmt->execute();
    }

//    public function getAllLinks() {
//        $connection = $this->database->getConnection();
//
//        $stmt = $connection->query("SELECT * FROM urls");
//
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function deleteLink($id) {
//        $connection = $this->database->getConnection();
//
//        $stmt = $connection->prepare("DELETE FROM urls WHERE id = :id");
//        $stmt->bindParam(':id', $id);
//        $stmt->execute();
//    }
//
//    public function regenerateLinks($id) {
//        $connection = $this->database->getConnection();
//
//        $newShortName = substr(md5(uniqid()), 0, 6);
//
//        $stmt = $connection->prepare("UPDATE urls SET short_url = :short_name WHERE id = :id");
//        $stmt->bindParam(':short_name', $newShortName);
//        $stmt->bindParam(':id', $id);
//        $stmt->execute();
//
//        return "http://example.io/$newShortName";
//    }
}
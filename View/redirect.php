<?php


use Model\Database;

include "C:/xampp/htdocs/link compression/Model/Database.php";

if (isset($_GET['url'])) {
    $shortLink = $_GET['url'];

    $database = new Database();
    $connection = $database->getConnection();
    $stmt = $connection->prepare("SELECT url FROM urls WHERE short_url = :shortLink");

    $stmt->bindParam(':shortLink', $shortLink);
    $stmt->execute();

    $result = $stmt->fetch((PDO::FETCH_ASSOC));
    $fullLink = $result['url'];

    header("Location: $fullLink");
    exit();
}
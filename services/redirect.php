<?php


use models\Database;
use models\dto\Connection;

include "C:/xampp/htdocs/link-compression/repositories/UrlRepository.php";

if (isset($_GET['url'])) {
    $shortLink = $_GET['url'];

    $connectionDto = new Connection('localhost', 'link', 'root', '0611');
    $database = new Database($connectionDto);
    $connection = $database->getConnection();
    $stmt = $connection->prepare('SELECT url FROM urls WHERE short_url = :shortLink');

    $stmt->bindParam(':shortLink', $shortLink);
    $stmt->execute();

    $result = $stmt->fetch((PDO::FETCH_ASSOC));
    $fullLink = $result['url'];

    header("Location: $fullLink");
    exit();
}
<?php

use controllers\LinkShortenerController;
use models\Database;
use models\DTO\ConnectionDTO;
use repositories\UrlRepository;

include 'C:/xampp/htdocs/link compression/controllers/LinkShortenerController.php';
include "C:/xampp/htdocs/link compression/repositories/UrlRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUrl = $_POST['new_url'];
    $linkId = $_POST['link_id'];

    $connectionDto = new ConnectionDTO('localhost', 'link', 'root', '0611');
    $database = new Database($connectionDto);
    $repo = new UrlRepository($database);
    $linkShortener = new LinkShortenerController($repo);

    $linkShortener->regenerateLinks($linkId, $newUrl);

    header("Location: index.php");
    exit();
}

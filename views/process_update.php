<?php

use models\Database;
use models\dto\Connection;
use repositories\UrlRepository;
use services\LinkShortenerService;

include 'C:/xampp/htdocs/link-compression/services/LinkShortenerService.php';
include "C:/xampp/htdocs/link-compression/repositories/UrlRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUrl = $_POST['new_url'];
    $linkId = $_POST['link_id'];

    $connectionDto = new Connection('localhost', 'link', 'root', '0611');
    $database = new Database($connectionDto);
    $repo = new UrlRepository($database);
    $linkShortener = new LinkShortenerService($repo);

    $linkShortener->regenerateLinks($linkId, $newUrl);

    header("Location: index.php");
    exit();
}

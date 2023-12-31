<?php

use models\Database;
use models\dto\Connection;
use repositories\UrlRepository;
use services\LinkShortenerService;

include 'C:/xampp/htdocs/link-compression/services/LinkShortenerService.php';
include "C:/xampp/htdocs/link-compression/repositories/UrlRepository.php";

$connectionDto = new Connection('localhost', 'link', 'root', '0611');
$database = new Database($connectionDto);
$repo = new UrlRepository($database);
$linkShortener = new LinkShortenerService($repo);

$id = $_GET['id'];
$linkShortener->deleteLink($id);

header("Location: index.php");
exit();
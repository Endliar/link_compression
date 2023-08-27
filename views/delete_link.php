<?php

use controllers\LinkShortenerController;
use models\Database;
use models\DTO\ConnectionDTO;
use repositories\UrlRepository;

include 'C:/xampp/htdocs/link compression/controllers/LinkShortenerController.php';
include "C:/xampp/htdocs/link compression/repositories/UrlRepository.php";

$connectionDto = new ConnectionDTO('localhost', 'link', 'root', '0611');
$database = new Database($connectionDto);
$repo = new UrlRepository($database);
$linkShortener = new LinkShortenerController($repo);

$id = $_GET['id'];
$linkShortener->deleteLink($id);

header("Location: index.php");
exit();
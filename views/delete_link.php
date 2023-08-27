<?php

use controllers\LinkShortenerController;
use repositories\UrlRepository;

include "C:/xampp/htdocs/link compression/models/Database.php";
include 'C:/xampp/htdocs/link compression/controllers/LinkShortenerController.php';
include "C:/xampp/htdocs/link compression/models/DTO/ConnectionDTO.php";
include "C:/xampp/htdocs/link compression/repositories/UrlRepository.php";

$repo = new UrlRepository();
$linkShortener = new LinkShortenerController($repo);

$id = $_GET['id'];
$linkShortener->deleteLink($id);

header("Location: index.php");
exit();
<?php

use Controller\LinkShortener;
use Model\Database;

include "C:/xampp/htdocs/link compression/Model/Database.php";
include 'C:/xampp/htdocs/link compression/Controller/LinkShortener.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUrl = $_POST['new_url'];
    $linkId = $_POST['link_id'];

    $database = new Database();
    $linkShortener = new LinkShortener($database);

    $linkShortener->regenerateLinks($linkId, $newUrl);

    header("Location: index.php");
    exit();
}

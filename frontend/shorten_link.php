<?php

use work_with_links\LinkShortener;
include "C:/xampp/htdocs/link compression/database/Database.php";
include 'C:/xampp/htdocs/link compression/work_with_links/LinkShortener.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST['url'];

    $database = new Database();
    $linkShortener = new LinkShortener($database);

    $linkShortener->generateLink($url);
}
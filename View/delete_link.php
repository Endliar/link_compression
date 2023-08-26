<?php

use Controller\LinkShortener;
use Model\Database;

include "C:/xampp/htdocs/link compression/Model/Database.php";
include 'C:/xampp/htdocs/link compression/Controller/LinkShortener.php';

$database = new Database();
$linkShortener = new LinkShortener($database);

$id = $_GET['id'];
$linkShortener->deleteLink($id);

header("Location: index.php");
exit();
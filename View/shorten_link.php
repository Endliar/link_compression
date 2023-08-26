<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Главная</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="create_link.php">Сократить ссылку</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h1 class="text-center">Вы успешно сократили ссылку</h1>
<?php

use Controller\LinkShortener;
use Model\Database;

include "C:/xampp/htdocs/link compression/Model/Database.php";
include 'C:/xampp/htdocs/link compression/Controller/LinkShortener.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST['url'];

    $database = new Database();
    $linkShortener = new LinkShortener($database);

    $linkShortener->generateLink($url);
}
?>
</body>
</html>
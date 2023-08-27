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
<h2 class="text-center">Можете вернуться на главную</h2>
<?php

use controllers\LinkShortenerController;
use models\Database;
use models\DTO\ConnectionDTO;
use repositories\UrlRepository;

include "C:/xampp/htdocs/link compression/models/Database.php";
include 'C:/xampp/htdocs/link compression/controllers/LinkShortenerController.php';
include "C:/xampp/htdocs/link compression/models/DTO/ConnectionDTO.php";
include "C:/xampp/htdocs/link compression/repositories/UrlRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST['url'];

    $connectionDto = new ConnectionDTO('localhost', 'link', 'root', '0611');
    $database = new Database($connectionDto);
    $repo = new UrlRepository($database);
    $linkShortener = new LinkShortenerController($repo);

    $linkShortener->generateLink($url);

}
?>
</body>
</html>

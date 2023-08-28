<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сократить ссылку</title>
    <style>
        .input-group {
            margin-bottom: 20px;
        }
    </style>
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
                    <a class="nav-link" href="create_link.php">Работа с ссылками</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <form action="shorten_link.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Введите полный URL для добавления в БД" name="url">
            <button class="btn btn-primary" type="submit">Сократить</button>
        </div>
    </form>
    <form action="../services/redirect.php" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Введите короткий URL для редиректа по адресу" name="url">
            <button class="btn btn-primary" type="submit">Перейти</button>
        </div>
    </form>
</div>
</body>
</html>
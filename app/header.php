<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Строительная компания</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <img src="img/logo.png" width="100" height="65" class="d-inline-block align-text-top">
            <a class="navbar-brand" href="index.php">Строительная компания</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  mx-3">
                    <li class="nav-item mx-3">

                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Дома</button>
                    </li>
                    <li class="nav-item">
                        <a href="catalog.php"><button type="button " class="btn btn-primary btn-lg">Каталог</button></a>
                    </li>
                </ul>
            </div>
            <div class="dropdown dropstart">
                <button class="btn btn-secondary-success btn-lg" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="login.php">Авторизация</a></li>
                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Оставить заявку</button>
                </ul>
            </div>
        </div>
    </nav>

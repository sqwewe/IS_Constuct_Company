<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LK Строительная компания</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php include "connect.php"; ?>

<body>
    <?php
    require_once __DIR__ . '/boot.php';
    $user = null;
    if (check_auth()) {
        // Получим данные пользователя по сохранённому идентификатору
        $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <?php if (isset($_SESSION['user_id']) && $user["role"] == 1) { ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Строительная компания | Пользователь</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="dropstart">
                    <button class="btn btn-secondary-success " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"><?= htmlspecialchars($user['username']) ?></a></li>
                        <li><a class="dropdown-item">
                                <form class="" method="post" action="do_logout.php">
                                    <button type="submit" class="btn btn-primary">Выход</button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid	mx-1 my-1">
            <div class="row">
                <div class="col">
                    <ul class="list-group list-group-flush">
                        <p>Сотрудники компании</p>
                        <?php
                        $sql = "SELECT * FROM workers";
                        if ($result = $link->query($sql)) {

                            foreach ($result as $row) {
                                echo "<div class='card my-3' style='width: 18rem;'>";
                                echo "<div class='card-body'>";
                                echo "<p class='card-text'>" . $row["name"] . " " . $row["surname"] . "</p>";
                                echo "<p class='card-text'>" . $row["role"] . "</p>";
                                echo "<p class='card-text'>" . $row["phone"] . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }

                            $result->free();
                        } else {
                            echo "Ошибка: " . $conn->error;
                        }
                        ?>

                        <p>Этапы построек</p>
                        <?php
                        $sql = "SELECT * FROM  step_building";
                        if ($result = $link->query($sql)) {

                            foreach ($result as $row) {
                                echo "<div class='card my-2' style='width: 18rem;'>";
                                echo "<div class='card-body'>";
                                echo "<p class='card-text'>" . $row["id"] . ". " . $row["name"] . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }

                            $result->free();
                        } else {
                            echo "Ошибка: " . $conn->error;
                        }
                        ?>
                    </ul>



                </div>
                <div class="col-8">
                    <?php

                    ?>
                    <p>Ваши постройки</p>
                    <?php
                    $id_uss = $_SESSION['user_id'];
                    $sql = "SELECT planing.id AS id, planing.name as name, planing.date_start as date_start, planing.date_end as date_end, step_building.name as step_name, users.name AS clients_name, users.username AS clients_username, class.name as class_name FROM `planing`  INNER JOIN step_building ON planing.id_step = step_building.id INNER JOIN users ON planing.id_client = users.id INNER JOIN class ON planing.id_class = class.id WHERE id_client = $id_uss;";
                    $sql_class = "SELECT * FROM class WHERE id = '$id_uss'";
                    if ($result = $link->query($sql)) {
                        echo "<table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th scope='row'>#</th>
                                    <th scope='row'>Название</th>
                                    <th scope='row'>Дана начала</th>
                                    <th scope='row'>Дана конца</th>
                                    <th scope='row'>Этап</th>
                                    <th scope='row'>ФИО клиента | Логин</th>
                                    <th scope='row'>Класс</th>
                                </tr>
                            </thead>
                            <tbody>";
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["date_start"] . "</td>";
                            echo "<td>" . $row["date_end"] . "</td>";
                            echo "<td>" . $row["step_name"] . "</td>";
                            echo "<td>" . $row["clients_name"] . " | " . $row["clients_username"] . "</td>";
                            echo "<td>" . $row["class_name"] . "</td>";
                            echo "<th scope='row'>
                                </td>";
                            echo "</tr>";
                        }
                        echo "
                </table>";
                        $result->free();
                    } else {
                        echo "Ошибка: " . $conn->error;
                    }
                    ?>

                    <?php
                    $sql = "SELECT planing.id, planing.name AS 'name', date_start, date_end, step_building.name AS 'names', step_building.id AS ids FROM `planing` INNER JOIN step_building ON planing.id_step = step_building.id WHERE id_client = $id_uss;";
                    if ($result = $link->query($sql)) {
                        foreach ($result as $row) {
                            echo "<p>" . $row["name"] . "</p>";
                            echo "<div class='progress my-2 bg-light' role='progressbar' aria-label='Animated striped example' aria-valuenow='" . $row["ids"] . "0' aria-valuemin='0' aria-valuemax='50' style='height: 20px'>";
                            echo "<div class='progress-bar progress-bar-striped progress-bar-animated' style='width: " . $row["ids"] . "0%'>";
                            echo "</div>";
                            echo "</div>";
                        }
                        $result->free();
                    } else {
                        echo "Ошибка: " . $conn->error;
                    }
                    ?>
                    <?php
                    $sql = "SELECT *  FROM `planing`  INNER JOIN  users ON planing.id_client = users.id INNER JOIN class ON planing.id_class = class.id  WHERE id_client = $id_uss ;";
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            foreach ($result as $row) {
                                $name = $row["name"];
                                $degree = $row["degree"];
                                $img1 = $row["img1"];
                                $img2 = $row["img2"];
                                $img3 = $row["img3"];
                                $img4 = $row["img4"];
                                $file = $row["file"];
                                $description_min = $row["description_min"];
                                $description_full = $row["description_full"];
                                echo "<div class='container my-2 mx-2'><h3>" . $row["name"] . "</h3>
                                <form method='post'>
                                <div class='row my-3 mx-2'>
                                  <div class='col'>
                                  <div id='carouselExampleIndicators' class='carousel slide'>
                                  <div class='carousel-indicators'>
                                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='1' aria-label='Slide 2'></button>
                                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='2' aria-label='Slide 3'></button>
                                  </div>
                                  <div class='carousel-inner'>
                                    <div class='carousel-item active'>
                                      <img src='" . $row["img1"] . "' class='d-block w-100' alt='...'>
                                    </div>
                                    <div class='carousel-item'>
                                      <img src='" . $row["img2"] . ".' class='d-block w-100' alt='...'>
                                    </div>
                                    <div class='carousel-item'>
                                      <img src='" . $row["img3"] . "' class='d-block w-100' alt='...'>
                                    </div>
                                    <div class='carousel-item'>
                                      <img src='" . $row["img4"] . "' class='d-block w-100' alt='...'>
                                    </div>
                                  </div>
                                  <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                    <span class='visually-hidden'>Previous</span>
                                  </button>
                                  <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
                                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                    <span class='visually-hidden'>Next</span>
                                  </button>
                                  </div>
                                  </div>
                                  <div class='col'>
                                  <h3>" . $row["name"] . "</h3>
                                  <h5 class='text-end my-3'>Первоначальная стоимость: " . $row["degree"] . " ₽.</h5>
                                  <h5 class='text-start my-3'>" . $row["description_full"] . "</h5>
                                  <!-- Button trigger modal -->
                                  <div class='d-grid gap-2'>
                                    <a type='button' class='btn btn-outline-primary' href=" . $row["file"] . " download=''>
                                    Смета
                                    </a>
                                  <!-- Modal -->
                                  </div>
                                    </div>
                                    </div>
                                    </form>
                                    </div>";
                            }
                        }
                    }
                    ?>

                    <?php
                    $sql = "SELECT *  FROM `planing`  INNER JOIN  users ON planing.id_client = users.id INNER JOIN class ON planing.id_class = class.id RIGHT JOIN step_class ON planing.id_class = step_class.id_class WHERE id_client = $id_uss;";
                    if ($result = $conn->query($sql)) {
                        if ($result->num_rows > 0) {
                            foreach ($result as $row) {
                                $title = $row["title"];
                                $img = $row["img"];
                                $decription = $row["decription"];
                                $name = $row["name"];
                                $degree = $row["degree"];
                                $img1 = $row["img1"];
                                $img2 = $row["img2"];
                                $img3 = $row["img3"];
                                $img4 = $row["img4"];
                                $file = $row["file"];
                                $description_min = $row["description_min"];
                                $description_full = $row["description_full"];

                                echo "<div class='container'><div class='card mb-3 my-3' style='max-width: 1300px;'>
                                 <div class='row g-0'>
                                   <div class='col-md-4'>
                                     <img src='" . $row["img"] . "' class='img-fluid rounded-start' >
                                   </div>
                                   <div class='col-md-8'>
                                     <div class='card-body'>
                                       <h5 class='card-title'>" . $row["title"] . "</h5>
                                       <p class='card-text'>" . $row["decription"] . "</p>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                               </div>";
                            }
                        }
                    }
                    ?>

                </div>

                <div class="col my-3">
                    <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Документы
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="">
                                    <div class="d-flex flex-column mb-3">
                                        <div class="p-2 d-grid gap-2"><a href="docs/doct1.doc" class="p-2 d-grid gap-2"><button class="btn btn-outline-success" type="button">Договор наёма подрядчика</button></a></div>
                                        <div class="p-2 d-grid gap-2"><a href="docs/doct2.doc" class="p-2 d-grid gap-2"> <button class="btn btn-outline-success" type="button">Договор на оплату</button></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>

<?php } else if (isset($_SESSION['user_id']) && $user["role"] == 2) { ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Строительная компания | Сотрудник</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropstart">
                <button class="btn btn-secondary-success " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item"><?= htmlspecialchars($user['username']) ?></a></li>
                    <li><a class="dropdown-item">
                            <form class="" method="post" action="do_logout.php">
                                <button type="submit" class="btn btn-primary">Выход</button>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid	mx-1 my-1">
        <div class="row">
            <div class="col">
                <ul class="list-group list-group-flush">
                    <?php
                    $sql = "SELECT * FROM class";
                    if ($result = $link->query($sql)) {

                        foreach ($result as $row) {
                            echo "<li class='list-group-item'>" . $row["name"] . $row["degree"] . "</li>";
                        }

                        $result->free();
                    } else {
                        echo "Ошибка: " . $conn->error;
                    }
                    ?>
                </ul>
            </div>
            <div class="col-8">
                <p>Планирование</p>
                <?php
                $sql = "SELECT planing.id AS id, planing.name as name, planing.date_start as date_start, planing.date_end as date_end, step_building.name as step_name, users.name AS clients_name, users.username AS clients_username, class.name as class_name FROM `planing` INNER JOIN step_building ON planing.id_step = step_building.id INNER JOIN users ON planing.id_client = users.id INNER JOIN class ON planing.id_class = class.id;";
                if ($result = $link->query($sql)) {
                    echo "<table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th scope='row'>#</th>
                                    <th scope='row'>Название</th>
                                    <th scope='row'>Дана начала</th>
                                    <th scope='row'>Дана конца</th>
                                    <th scope='row'>Этап</th>
                                    <th scope='row'>ФИО клиента | Логин</th>
                                    <th scope='row'>Класс</th>
                                </tr>
                            </thead>
                            <tbody>";
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["date_start"] . "</td>";
                        echo "<td>" . $row["date_end"] . "</td>";
                        echo "<td>" . $row["step_name"] . "</td>";
                        echo "<td>" . $row["clients_name"] . " | " . $row["clients_username"] . "</td>";
                        echo "<td>" . $row["class_name"] . "</td>";
                        echo "<th scope='row'>
                            <a class='btn btn-outline-success' href='update_plan.php?id=" . $row["id"] . "'>Изменить</a>
                            <form action='delete_plan.php' method='post'>
                                <input type='hidden' name='id' value='" . $row["id"] . "' />
                                <input type='submit' class='btn btn-outline-danger mx-2 my-1' value='Удалить'>
                            </form>
                                </td>";
                        echo "</tr>";
                    }
                    echo "
                </table>";
                    $result->free();
                } else {
                    echo "Ошибка: " . $conn->error;
                }
                ?>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddPlan">
                    Добавить
                </button>

                <div class="row">
                    <?php
                    $sqlm = "SELECT * FROM class";
                    if ($result = $link->query($sqlm)) {
                        $rowsCount = $result->num_rows;
                    ?>
                    <?php
                        foreach ($result as $row) {
                            echo "<div class='card mx-2 my-2 p-0' style='width: 40rem;'>";
                            echo "<img src='" . $row["img1"] . "' class= 'card-img-top' >";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>" . $row["name"] . "</h5>";
                            echo "<p class='card-text'>" . $row["description_min"] . "</p>";
                            // echo "<a class='btn btn-outline-primary' href='more_inf.php?id=" . $row["id"] . "'>Подробнее</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                        $result->free();
                    } else {
                        echo "Ошибка: " . $link->error;
                    }
                    ?>
                </div>
            </div>

            <div class="modal fade" id="exampleModalAddPlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddPlan" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabelAddPlan">Добавление плана</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="create_plan.php" method="post">

                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Название</span>
                                    <input required type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="name">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Дата начала</span>
                                    <input required type="date" class="form-control" aria-label="date_end" aria-describedby="basic-addon2" name="date_start">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2">Дата конца</span>
                                    <input required type="date" class="form-control" aria-label="date_end" aria-describedby="basic-addon2" name="date_end">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Классификация</label>
                                    <select required class="form-select" id="id_class" name='id_class'>
                                        <option selected>Выбрать...</option>
                                        <?php
                                        $sql = "SELECT * FROM class";
                                        if ($result = $link->query($sql)) {
                                            foreach ($result as $row) {
                                                echo "<option name='id_class' value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Шаг постройки</label>
                                    <select required class="form-select" id="id_step" name='id_step'>
                                        <option selected>Выбрать...</option>
                                        <?php
                                        $sql = "SELECT * FROM step_building";
                                        if ($result = $link->query($sql)) {
                                            foreach ($result as $row) {
                                                echo "<option name='id_step' value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Клиент</label>
                                    <select required class="form-select" id="clients" name="id_client">
                                        <option selected>Выбрать...</option>
                                        <?php
                                        $sql = "SELECT * FROM users WHERE role = 1";
                                        if ($result = $link->query($sql)) {
                                            foreach ($result as $row) {
                                                echo "<option name='id_client' value='" . $row["id"] . "'>" . $row["name"] . " | " . $row["username"] . "</option>";
                                            }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col my-3">
                <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Отчёты
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="">
                                <div class="d-flex flex-column mb-3">
                                    <form method="post" action="export/export.php">
                                        <div class="p-2 d-grid gap-2">
                                            <input type="submit" name="export" class="btn btn-outline-success" value="Заявки" />
                                        </div>
                                    </form>
                                    <form method="post" action="export/export_class.php">
                                        <div class="p-2 d-grid gap-2">
                                            <input type="submit" name="export" class="btn btn-outline-success" value="Классификация" />
                                        </div>
                                    </form>
                                    <form method="post" action="export/export_planing.php">
                                        <div class="p-2 d-grid gap-2">
                                            <input type="submit" name="export" class="btn btn-outline-success" value="Планирования" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        </body>

        </html>
    <?php } else if (isset($_SESSION['user_id']) && $user["role"] == 3) { ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Строительная компания | Администратор</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="dropstart">
                    <button class="btn btn-secondary-success " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"><?= htmlspecialchars($user['username']) ?></a></li>
                        <li><a class="dropdown-item">
                                <form class="" method="post" action="do_logout.php">
                                    <button type="submit" class="btn btn-primary">Выход</button>
                                </form>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container my-2">
            <p>Заявки</p>
            <?php
            $sql = "SELECT * FROM blanks";
            if ($result = $link->query($sql)) {
                echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Телефон</th>
                        <th scope='col'>Дата</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<th scope='row'>
                    <form action='delete_blank.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' class='btn btn-outline-danger mx-2 my-1' value='Удалить'>
                    </form>
                        </td>";
                    echo "</tr>";
                }
                echo "
        </table>";
                $result->free();
            } else {
                echo "Ошибка: " . $conn->error;
            }
            ?>


        </div>
        <div class="container my-2">
            <p>Планирование</p>
            <?php
            $sql = "SELECT planing.id AS id, planing.name as name, planing.date_start as date_start, planing.date_end as date_end, step_building.name as step_name, users.name AS clients_name, users.username AS clients_username, class.name as class_name FROM `planing` INNER JOIN step_building ON planing.id_step = step_building.id INNER JOIN users ON planing.id_client = users.id INNER JOIN class ON planing.id_class = class.id;";
            if ($result = $link->query($sql)) {
                echo "<table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th scope='row'>#</th>
                                    <th scope='row'>Название</th>
                                    <th scope='row'>Дана начала</th>
                                    <th scope='row'>Дана конца</th>
                                    <th scope='row'>Этап</th>
                                    <th scope='row'>ФИО клиента | Логин</th>
                                    <th scope='row'>Класс</th>
                                </tr>
                            </thead>
                            <tbody>";
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["date_start"] . "</td>";
                    echo "<td>" . $row["date_end"] . "</td>";
                    echo "<td>" . $row["step_name"] . "</td>";
                    echo "<td>" . $row["clients_name"] . " | " . $row["clients_username"] . "</td>";
                    echo "<td>" . $row["class_name"] . "</td>";
                    echo "<th scope='row'>
                            <a class='btn btn-outline-success' href='update_plan.php?id=" . $row["id"] . "'>Изменить</a>
                            <form action='delete_plan.php' method='post'>
                                <input type='hidden' name='id' value='" . $row["id"] . "' />
                                <input type='submit' class='btn btn-outline-danger mx-2 my-1' value='Удалить'>
                            </form>
                                </td>";
                    echo "</tr>";
                }
                echo "
                </table>";
                $result->free();
            } else {
                echo "Ошибка: " . $conn->error;
            }
            ?>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddPlan">
                Добавить
            </button>
        </div>

        <div class="modal fade" id="exampleModalAddPlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddPlan" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabelAddPlan">Добавление плана</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="create_plan.php" method="post">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Название</span>
                                <input required type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="name">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Дата начала</span>
                                <input required type="date" class="form-control" aria-label="date_end" aria-describedby="basic-addon2" name="date_start">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Дата конца</span>
                                <input required type="date" class="form-control" aria-label="date_end" aria-describedby="basic-addon2" name="date_end">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Шаг постройки</label>
                                <select required class="form-select" id="id_step" name='id_step'>
                                    <option selected>Выбрать...</option>
                                    <?php
                                    $sql = "SELECT * FROM step_building";
                                    if ($result = $link->query($sql)) {
                                        foreach ($result as $row) {
                                            echo "<option name='id_step' value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Клиент</label>
                                <select required class="form-select" id="id_client" name="id_client">
                                    <option selected>Выбрать...</option>
                                    <?php
                                    $sql = "SELECT * FROM users WHERE role = 1";
                                    if ($result = $link->query($sql)) {
                                        foreach ($result as $row) {
                                            echo "<option name='id_client' value='" . $row["id"] . "'>" . $row["name"] . " | " . $row["username"] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Классификация</label>
                                <select required class="form-select" id="id_class" name='id_class'>
                                    <option selected>Выбрать...</option>
                                    <?php
                                    $sql = "SELECT * FROM class";
                                    if ($result = $link->query($sql)) {
                                        foreach ($result as $row) {
                                            echo "<option name='id_class' value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <p>Пользователи</p>
            <?php
            $sql = "SELECT * FROM users";
            if ($result = $link->query($sql)) {
                echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Логин</th>
                    <th scope='col'>ФИО</th>
                    <th scope='col'>Почта</th>
                    <th scope='col'>Роль</th>
                </tr>
            </thead>
            <tbody>";
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td scope='col'>
                <a class='btn btn-outline-success' href='update_clients.php?id=" . $row["id"] . "'>Изменить</a>
            </td>";
                    echo "</tr>";
                }
                echo "
        </table>";
                $result->free();
            } else {
                echo "Ошибка: " . $conn->error;
            }
            ?>

            </tbody>
            </table>
        </div>

        <div class="container my-5">
            <p>Категории</p>
            <?php
            $sql = "SELECT * FROM class";
            if ($result = $link->query($sql)) {
                echo "<table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Название</th>
                <th scope='col'>Сложность</th>
            </tr>
        </thead>
        <tbody>";
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["degree"] . "</td>";
                    echo "<td scope='col'>
                <a class='btn btn-outline-success' href='update_C.php?id=" . $row["id"] . "'>Изменить</a>
               
            </td>";
                    echo "</tr>";
                }
                echo "
        </table>";
                $result->free();
            } else {
                echo "Ошибка: " . $conn->error;
            }
            ?>
 <!-- <form action=delete_C.php method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                    <input type='submit' class='btn btn-outline-danger mx-2 my-1' value='Удалить'>
                </form> -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddC">
                Добавить
            </button>
        </div>

        <!-- Modal добаавления услуг -->
        <div class="modal fade" id="exampleModalAddC" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddC" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabelAddC">Добавление класса</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="create_C.php" method="post">

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Название</span>
                                <input required type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="name">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Сложность</span>
                                <input required type="number" class="form-control" aria-label="description" aria-describedby="basic-addon2" name="degree">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <!-- таблица мастеров -->
        <div class="container my-5">
            <p>Мастера</p>
            <?php
            $sql = "SELECT * FROM workers";
            if ($result = $link->query($sql)) {
                echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>ФИО</th>
                        <th scope='col'>Должность</th>
                        <th scope='col'>Фото</th>
                        <th scope='col'>Пасспорт</th>
                        <th scope='col'>Телефон</th>
                        <th scope='col'>id Планирования</th>
                        <th scope='col'>id Пользователь</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . $row["surname"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td>" . $row["img"] . "</td>";
                    echo "<td>" . $row["passport"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["id_planing"] . "</td>";
                    echo "<td>" . $row["id_users"] . "</td>";
                    echo "<td>
                <a class='btn btn-outline-success my-1' href='update_workers.php?id=" . $row["id"] . "'>Изменить</a>
                <form action='delete_masters.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                    <input type='submit' class='btn btn-outline-danger' value='Удалить'>
                </form>
                    </td>";
                    echo "</tr>";
                }
                echo "
                </table>";
                $result->free();
            } else {
                echo "Ошибка: " . $conn->error;
            }

            ?>
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddMasters">
                Добавить
            </button> -->
        </div>



        <!-- Modal добаавления местеров -->
        <div class="modal fade" id="exampleModalAddMasters" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddM" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabelAddM">Добавление мастера</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="create_masters.php" method="post">

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Имя</span>
                                <input type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="name">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">Фамилия</span>
                                <input type="text" class="form-control" aria-label="surname" aria-describedby="basic-addon2" name="surname">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Должность</span>
                                <input type="text" class="form-control" aria-label="role" aria-describedby="basic-addon3" name="role">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">Фото</span>
                                <input type="text" class="form-control" aria-label="img" aria-describedby="basic-addon3" name="img">
                            </div>
                            <!-- <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02">
                            </div> -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon4">Пасспорт</span>
                                <input type="text" class="form-control" aria-label="passport" aria-describedby="basic-addon4" name="passport">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon4">Телефон (8 xxx-xxx-xx-xx)</span>
                                <input type="tel" pattern="8 [0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" class="form-control" aria-label="phone" aria-describedby="basic-addon4" name="phone" placeholder="8 900-123-45-67">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Постройка</label>
                                <select class="form-select" id="id_plan" name='id_plan'>
                                    <option selected>Выбрать...</option>
                                    <?php
                                    $sql = "SELECT * FROM planing";
                                    if ($result = $link->query($sql)) {
                                        foreach ($result as $row) {
                                            echo "<option name='id_plan' value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>




                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        </body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        </html>

    <?php } else { ?>
        <h2>Ты никто!</h2>
    <?php } ?>
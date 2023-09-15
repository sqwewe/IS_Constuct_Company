<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Изменение</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    // если запрос GET
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
        $id = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT * FROM planing WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $name = $row["name"];
                    $date_start = $row["date_start"];
                    $date_end = $row["date_end"];
                    $id_class = $row["id_class"];
                    $id_client = $row["id_client"];
                    $id_step = $row["id_step"];
                }
                echo "<div class='cintainer my-2 mx-2'><h3>Обновление плана</h3>
                <form method='post'>
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='id' value='$id' readonly />
                    <p>Название:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='name' value='$name'  /></p>
                    <p>Дата начала:
                    <input type='date'  class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default'  name='date_start' value='$date_start' readonly/></p>
                    <p>Дата конца:
                    <input type='date'  class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default'  name='date_end' value='$date_end' /></p>
                    <p>id шага постройки:
                    <input type='number'  class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default'  name='id_step' value='$id_step' /></p>
                    <p>id клиента:
                    <input type='number'  class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default'  name='id_client' value='$id_client' /></p>
                    <p>id класса:
                    <input type='number'  class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default'  name='id_class' value='$id_class' /></p>
                    <input type='submit' class='btn btn-outline-success' value='Сохранить'>
                </form></div>";
            } else {
                echo "<div>План не найден</div>";
            }
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["date_start"]) && isset($_POST["date_end"]) && isset($_POST["id_step"]) && isset($_POST["id_client"]) && isset($_POST["id_class"])) {

        $id = $conn->real_escape_string($_POST["id"]);
        $name = $conn->real_escape_string($_POST["name"]);
        $date_start = $conn->real_escape_string($_POST["date_start"]);
        $date_end = $conn->real_escape_string($_POST["date_end"]);
        $id_class = $conn->real_escape_string($_POST["id_class"]);
        $id_client = $conn->real_escape_string($_POST["id_client"]);
        $id_step = $conn->real_escape_string($_POST["id_step"]);
        $sqls = "UPDATE planing SET name = '$name', date_start = '$date_start', date_end = '$date_end',  id_step = '$id_step',  id_class = '$id_class' , id_client = '$id_client' WHERE id = '$id'";
        if ($result = $conn->query($sqls)) {

            header("Location: endec.php");
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } else {
        echo "Некорректные данные";
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
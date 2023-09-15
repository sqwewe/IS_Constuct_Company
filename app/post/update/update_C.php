<?php
$conn = new mysqli("localhost", "root", "", "yl2");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}
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
        $sql = "SELECT * FROM class WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $name = $row["name"];
                    $degree = $row["degree"];
                }
                echo "<div class='cintainer my-2 mx-2'><h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='number' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='id' value='$id' readonly />
                    <p>Название:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='name' value='$name'  /></p>
                    <p>Сложность:
                    <input type='number'  class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default'  name='degree' value='$degree' /></p>

                    <input type='submit' class='btn btn-outline-success' value='Сохранить'>
            </form></div>";
            } else {
                echo "<div>Заявка не найдена</div>";
            }
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["degree"])) {

        $id = $conn->real_escape_string($_POST["id"]);
        $name = $conn->real_escape_string($_POST["name"]);
        $degree = $conn->real_escape_string($_POST["degree"]);
        $sqls = "UPDATE class SET name = '$name', degree = '$degree' WHERE id = '$id'";
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
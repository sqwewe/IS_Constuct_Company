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
        $sql = "SELECT * FROM clients WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $name = $row["name"];
                    $surname = $row["surname"];
                    $phone = $row["phone"];
                    $passport = $row["passport"];
                    $email = $row["email"];
                    $id_house = $row["id_house"];
                }
                echo "<div class='cintainer my-2 mx-2'><h3>Обновление клиентов</h3>
                <form method='post'>
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='id' value='$id' readonly />
                    <p>Имя:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='name' value='$name'  /></p>
                    <p>Фамилия:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='surname' value='$surname' /></p>
                    <p>Номер:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='phone' value='$phone' /></p>
                    <p>Пасспорт:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='passport' value='$passport' /></p>
                    <p>Почта:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='email' value='$email' /></p>
                    <p>id Постройки:
                    <input type='number' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='id_house' value='$id_house' /></p>
                    <input type='submit' class='btn btn-outline-success' value='Сохранить'>
            </form></div>";
            } else {
                echo "<div>Заявка не найдена</div>";
            }
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["phone"]) && isset($_POST["passport"]) && isset($_POST["email"]) && isset($_POST["id_house"])) {

        $id = $conn->real_escape_string($_POST["id"]);
        $name = $conn->real_escape_string($_POST["name"]);
        $surname = $conn->real_escape_string($_POST["surname"]);
        $phone = $conn->real_escape_string($_POST["phone"]);
        $passport = $conn->real_escape_string($_POST["passport"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $id_house = $conn->real_escape_string($_POST["id_house"]);
        $sqls = "UPDATE clients SET name = '$name', surname = '$surname', phone = '$phone', passport = '$passport', email = '$email', id_house = '$id_house' WHERE id = '$id'";
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
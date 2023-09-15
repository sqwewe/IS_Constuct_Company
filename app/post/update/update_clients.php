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
        $sql = "SELECT * FROM users WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $username = $row["username"];
                    $name = $row["name"];
                    $email = $row["email"];
                    $role = $row["role"];
                }
                echo "<div class='cintainer my-2 mx-2'><h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Логин:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='username' value='$username' readonly/></p>
                    <p>ФИО:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='name' value='$name' /></p>
                    <p>Почта:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='email' value='$email' /></p>
                    <p>Роль от 1 до 3:
                    <p>1 - пользователь 2 - сотрудник 3 - администратор:
                    <input type='number' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='role' value='$role' /></p>
                    <input type='submit' class='btn btn-outline-success' value='Сохранить'>
                </form></div>";
            } else {
                echo "<div>Пользователь не найден</div>";
            }
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } elseif (isset($_POST["id"]) && isset($_POST["username"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["role"])) {

        $id = $conn->real_escape_string($_POST["id"]);
        $username = $conn->real_escape_string($_POST["username"]);
        $name = $conn->real_escape_string($_POST["name"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $role = $conn->real_escape_string($_POST["role"]);
        $sqls = "UPDATE users SET username = '$username', name = '$name', email = '$email', role = '$role' WHERE id = '$id'";
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
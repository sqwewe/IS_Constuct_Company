<?php
if (isset($_POST["name"]) && isset($_POST["date"])) {

    $conn = new mysqli("localhost", "root", "", "yl2");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["name"]);
    $date = $conn->real_escape_string($_POST["date"]);
    $sql = "INSERT INTO blanks (name, date) VALUES ('$name', '$date')";
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>
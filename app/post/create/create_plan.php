<?php
if (isset($_POST["name"]) && isset($_POST["date_start"])&& isset($_POST["date_end"]) && isset($_POST["id_class"])&& isset($_POST["id_step"])&& isset($_POST["id_client"])) {

    $conn = new mysqli("localhost", "root", "", "yl2");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["name"]);
    $date_start = $conn->real_escape_string($_POST["date_start"]);
    $date_end = $conn->real_escape_string($_POST["date_end"]);
    $id_client = $conn->real_escape_string($_POST["id_client"]);
    $id_step = $conn->real_escape_string($_POST["id_step"]);
    $id_class = $conn->real_escape_string($_POST["id_class"]);
    $sql = "INSERT INTO planing (name, date_start, date_end, id_step, id_client, id_class) VALUES ('$name', '$date_start', '$date_end', '$id_step', '$id_client', ' $id_class')";
    if ($conn->query($sql)) {
        header('Location: endec.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}

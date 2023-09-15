<?php
if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["role"]) && isset($_POST["img"]) && isset($_POST["passport"])  && isset($_POST["phone"])&& isset($_POST["id_plan"])) {

    $conn = new mysqli("localhost", "root", "", "yl2");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["name"]);
    $surname = $conn->real_escape_string($_POST["surname"]);
    $role = $conn->real_escape_string($_POST["role"]);
    $img = $conn->real_escape_string($_POST["img"]);
    $passport = $conn->real_escape_string($_POST["passport"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $id_plan = $conn->real_escape_string($_POST["id_plan"]);
    $sql = "INSERT INTO workers (name, surname, role, img, passport, phone, id_planing) VALUES ('$name', '$surname', '$role', '$img', '$passport', '$phone', '$id_plan')";
    if ($conn->query($sql)) {
        header('Location: endec.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}

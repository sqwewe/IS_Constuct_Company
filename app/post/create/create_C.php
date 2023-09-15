<?php
if (isset($_POST["name"]) && isset($_POST["degree"])) {

    $conn = new mysqli("localhost", "root", "", "yl2");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["name"]);
    $degree = $conn->real_escape_string($_POST["degree"]);
    $sql = "INSERT INTO class (name, degree) VALUES ('$name', '$degree')";
    if ($conn->query($sql)) {
        header('Location: endec.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}


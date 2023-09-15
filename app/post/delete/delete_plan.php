<?php
if (isset($_POST["id"])) {
    $conn = new mysqli("localhost", "root", "", "yl2");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM planing WHERE id  = '$id'";
    if ($conn->query($sql)) {

        header("Location: endec.php");
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
?>

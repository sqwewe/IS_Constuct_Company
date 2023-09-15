<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'yl2';
$link = mysqli_connect($host, $user, $pass, $db_name);
if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "yl2");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}
?>
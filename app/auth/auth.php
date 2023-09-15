<?php 

$login = filter_var(trim($_POST['login']), );
$pass = filter_var(trim($_POST['pass']), );
$role = filter_var(trim($_POST['role']), );

$pass = md5($pass."thisisforhabr"); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'root', '', 'yl2');


$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$user = $result->fetch_assoc(); // Конвертируем в массив
$result2 = $mysql->query("SELECT * FROM `users`");
$roles = $result2->fetch_assoc();

if(count($user) == 0){
	echo "Такой пользователь не найден.";
	exit();
}
else if(count($user) == 1){
	echo "Логин или пароль введены неверно";
	exit();
}

if($user['role'] = 4){
	header('Location: admin.php');
	exit();
}
setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

header('Location: index.php');

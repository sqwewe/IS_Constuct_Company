<?php 

$login = filter_var(trim($_POST['login'])); // Удаляет все лишнее и записываем значение в переменную //$login
$name = filter_var(trim($_POST['name']));
$pass = filter_var(trim($_POST['pass']));
$role = filter_var(trim($_POST['role']));

if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
	echo "Недопустимая длина логина";
	exit();
}
else if(mb_strlen($name) < 5){
	echo "Недопустимая длина имени.";
	exit();
} // Проверяем длину имени

$pass = md5($pass."thisisforhabr"); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'root', '', 'yl2');

$result1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user1 = $result1->fetch_assoc(); // Конвертируем в массив
if(!empty($user1)){
	echo "Данный логин уже используется!";
	exit();
}

$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`)
	VALUES('$login', '$pass', '$name')");
$mysql->close();

header('Location: /yl2');
exit();
 ?>
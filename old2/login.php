<?php
session_start();

$link = mysqli_connect('127.0.0.1', 'root', 'root', 'gbphp');    //<--подключение к БД

//var_dump(password_hash('123', PASSWORD_DEFAULT));    <--генерация хэша пароля

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(empty($_POST['login']) || empty($_POST['password'])){
		header('Location: /');
		exit;
	}

	$login = $_POST['login'];
	$password = $_POST['password'];

	$sql = "SELECT login, password FROM users WHERE login = '{$login}'";   //<--создание запроса к БД
	$result = mysqli_query($link, $sql);    //<--отправка запроса к БД и запись результата запроса в переменную

	$userData = mysqli_fetch_assoc($result);    //<--обработка результата запроса

	if(!empty($userData) && password_verify($password, $userData['password'])){    //<--верификация хэша пароля
		$_SESSION['user'] = 1;
	}
	header('Location: /');
	exit;
}

if(array_key_exists('exit', $_GET)){
	session_destroy();    //<--полное удаление данных сессии(самый лучший вариант)
	//setcookie('PHPSESSID', '');    <--удаление cookie(не самый лучший вариант)
	//unset($_SESSION['user']);    <--удаление выбранного элемента из массива
	header('Location: /');
	exit;
}

echo '<pre>';
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>document</title>
</head>
<body>
<?php if (empty($_SESSION['user'])) :?>
<form method="post">
	<input name="login" placeholder="login">
	<input name="password" placeholder="password">
	<input type="submit">
</form>
<?php else :?>
	Вы авторизованы
	<a href="?exit">Выход</a>
<?php endif;?>
</body>
</html>
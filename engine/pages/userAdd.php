<?php


function indexAction()
{

if (empty($_SESSION['user'])){
	return <<<php
		<h2>Вам необходимо авторизоваться для того,<br>чтобы иметь возможность добавить нового пользователя</h2>
php;

	}
	return <<<php
		<form method="post" action="?p=userAdd&a=register">
			<input name="name" placeholder="введите имя">
			<input name="position" placeholder="введите должность"><br><br>
			<input name="login" placeholder="введите логин">
			<input name="password" placeholder="введите пароль">
			<input type="submit">
		</form>

php;

}

function userAddedAction()
{
	return <<<php
		<h4 style="color: green">Пользователь добавлен<h4>
		<a href="?p=userAdd">Добавить другого пользователя</a>
php;

}


function registerAction()
{
$sqlUsers = 'SELECT * FROM users';
$resUsers = mysqli_query(getLink(), $sqlUsers);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$position = $_POST['position'];
		$sqlAddUser = "INSERT INTO users (id, login, password, name, is_admin, position) VALUES (NULL, '{$login}', '{$password}', '{$name}', 0, '{$position}');";
		if(!empty($login) && !empty($password) && !empty($name)){
			mysqli_query(getLink(), $sqlAddUser);
			header('Location: ?p=userAdd&a=userAdded');   //<---избавился от лишнего перенаправления
			exit;
		}
	}
}
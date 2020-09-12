<?php


function indexAction()
{
    	return render(
    		'authIndex',
    		[
    			'user' => $_SESSION['user'],
    			'title' => 'Auth',
    		]);
}


function loginAction()
{
		if($_SERVER['REQUEST_METHOD'] != 'POST'){
			header('Location: /?p=auth');
			return;
		}

		if(empty($_POST['login']) || empty($_POST['password'])){
			header('Location: /?p=auth');
			return;
		}

		$login = clearStr($_POST['login']);
		$password = $_POST['password'];

		$sql = "SELECT login, password FROM users WHERE login = '{$login}'";   //<--создание запроса к БД
		$result = mysqli_query(getLink(), $sql);    //<--отправка запроса к БД и запись результата запроса в переменную

		$userData = mysqli_fetch_assoc($result);    //<--обработка результата запроса

		if(!empty($userData) && password_verify($password, $userData['password'])){    //<--верификация хэша пароля
			$_SESSION['user'] = 'admin';
		}

		header('Location: /?p=personalPage');
		return;
}

function outAction()
{
	session_destroy();
	header('Location: /?p=auth');
}


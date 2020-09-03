<?php

function indexAction()
{

if (empty($_SESSION['user'])){
	return <<<php
		<h2>вам необходимо авторизоваться</h2>
php;

	}
	$sqlLogin = "SELECT * FROM users";
	$resLogin = mysqli_query(getLink(), $sqlLogin);
	$loginData = mysqli_fetch_assoc($resLogin);
	return <<<php
		<h3>Вы авторизованы под логином: {$loginData['login']}</h3>
		<h1>Добро пожаловать, {$loginData['name']}!</h1>


php;

}

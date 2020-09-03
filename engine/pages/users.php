<?php


function indexAction()
{

if (empty($_SESSION['user'])){
	return <<<php
		<h2>Вам необходимо авторизоваться для того,<br>чтобы иметь доступ к просмоту списка пользователей</h2>
php;

}
	$sql = "SELECT * FROM users";
	$res = mysqli_query(getLink(), $sql);

	$html = '<h1>Пользователи</h1>';
	while($row = mysqli_fetch_assoc($res)){
		$html .= <<<php
		<h3>{$row['name']}</h3>
		<p>{$row['position']}</p>
		<hr>
php;
}

return $html;

}

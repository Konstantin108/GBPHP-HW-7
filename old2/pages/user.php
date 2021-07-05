<?php

$sql = 'SELECT * FROM users WHERE id = ' . getId();
$res = mysqli_query($link, $sql);

$html = '<h1>Информация о пользователе</h1>';
$row = mysqli_fetch_assoc($res);
$html .= <<<php
				Login: {$row['login']}<br>
php;

echo $html;
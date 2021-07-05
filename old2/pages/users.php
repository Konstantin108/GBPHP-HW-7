<?php

$sql = 'SELECT * FROM users';
$res = mysqli_query($link, $sql);

$html = '<h1>Пользователи</h1>';
while ($row = mysqli_fetch_assoc($res)) {
    $html .= <<<php
				Login: <a href="?page=3&id={$row['id']}">{$row['login']}</a><br>
php;
}

echo $html;
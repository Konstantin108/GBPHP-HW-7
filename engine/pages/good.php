<?php


function indexAction()
{
	return allAction();
}
function allAction()
{

	$sql = "SELECT id, name, price, info FROM goods";
	$res = mysqli_query(getLink(), $sql);

	$html = '<h1>товары</h1>';
	while($row = mysqli_fetch_assoc($res)){
		$html .= <<<php
		<h3>{$row['name']}</h3>
		<p>{$row['info']}</p>
		<p>{$row['price']}р.</p>
		<a href="?p=good&a=one&id={$row['id']}">подробнее</a>
		<hr>
php;
}

return $html;

}

function oneAction()
{
	$sql = "SELECT id, name, price, info FROM goods WHERE id = " . getId();
	$res = mysqli_query(getLink(), $sql);

	$row = mysqli_fetch_assoc($res);
	return <<<php
		<h2>{$row['name']}</h2>
		<p>{$row['info']}</p>
		<p>{$row['price']}р.</p>
		<p><a href="?p=cart&a=add&id={$row['id']}">добавить товар в корзину</a></p>
		<a href="?p=good">назад</a>
		<hr>

php;

}
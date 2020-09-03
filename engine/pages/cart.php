<?php

function indexAction()
{
	$html = '<h1>корзина</h1>';
	if(empty($_SESSION['goods'])){
		return $html . 'нет товаров';
	}
	foreach ($_SESSION['goods'] as $id => $good) {
		$total = $good['count'] * $good['price'];
		$html .= <<<php
			<p>название товара: {$good['name']}</p>
			<p>
				количество:
					<a href="?p=cart&a=decrement&id={$id}">-</a>
						{$good['count']}
					<a href="?p=cart&a=add&id={$id}">+</a>
			</p>
			<p>цена: {$good['price']}</p>
			<p>итого: {$total}</p>
			<hr>
php;
	}
	return $html;
}

function addAction()
{
	$msg = goodAdd(getId());
	if(empty($msg)){
		$msg = 'Товар успешно добавлен';
	}
	setMSG($msg);
	redirect();

}

function goodAdd($id)
{
	if(empty($id)){
		return 'не передан id';
	}
	$sql = "SELECT id, name, price, info FROM goods WHERE id = " . $id;
	$res = mysqli_query(getLink(), $sql);

	$row = mysqli_fetch_assoc($res);
	if(empty($row)){
		return 'товар не найден';
	}

	if(!empty($_SESSION['goods'][$id])){
		$_SESSION['goods'][$id]['count']++;
		return '';
	}
	$_SESSION['goods'][$id] = [
		'name' => $row['name'],
		'price' => $row['price'],
		'count' => 1,
	];
	return '';
}


function decrementAction()
{
	$msg = goodDecrement(getId());
	if(empty($msg)){
		$msg = 'Товар успешно добавлен';
	}
	setMSG($msg);
	redirect();

}

function goodDecrement($id)
{
	if(empty($id)){
		return 'не передан id';
	}
	$sql = "SELECT id, name, price, info FROM goods WHERE id = " . $id;
	$res = mysqli_query(getLink(), $sql);

	$row = mysqli_fetch_assoc($res);
	if(empty($row)){
		return 'товар не найден';
	}

	if(!empty($_SESSION['goods'][$id])){
		if($_SESSION['goods'][$id]['count'] == 0){

			unset($_SESSION['goods'][$id]);
			return '';
		}else{
			$_SESSION['goods'][$id]['count']--;
			return '';
		}

	}
	$_SESSION['goods'][$id] = [
		'name' => $row['name'],
		'price' => $row['price'],
		'count' => 1,
	];
	return '';
}
<?php
	/**@var string $msg*/
	/**@var string $content*/
	/**@var string $title*/
	/**@var int $countGoodsInCart*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<title><?= $title ?></title>
	<style>
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<ul>
		<li><a href="?page=1">главная</a></li>
		<li><a href="?p=good&a=all">товары</a></li>
		<li><a href="?p=cart">корзина <span class="countGood">(<?= $countGoodsInCart ?>)</span></a></li>
		<?php if (empty($_SESSION['user'])) : ?>
		<?php else : ?>
		<li><a href="?p=order">мой заказ</a></li>
		<?php endIf; ?>
		<li><a href="?p=users&a=index">пользователи</a></li>
		<li><a href="?p=userAdd&a=index">добавить пользователя</a></li>
		<li><a href="?p=personalPage&a=index">личный кабинет</a></li>
		<li><a href="?p=auth&a=index">вход</a></li>
	</ul>
<p style="color: red"><?= $msg ?></p>
	<?= $content ?>

<script src="/js/script.js"></script>
</body>
</html>
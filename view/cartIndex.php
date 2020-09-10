<?php
	/**@var array $goods*/
	/**@var string $user*/
?>
<?php if (empty($_SESSION['user'])) : ?>
		<h2>Вам необходимо авторизоваться для того,<br>чтобы иметь доступ к корзине</h2>
<?php else : ?>
<h1>корзина</h1>
<?php if(empty($goods)) : ?>
		нет товаров
<?php else : ?>
	<? foreach ($goods as $id => $good) : ?>
		<?php $total = $good['count'] * $good['price']; ?>
			<p>название товара: <?= $good['name'] ?></p>
			<p>
				количество:
					<a href="?p=cart&a=decrement&id=<?= $id ?>">-</a>
						<?= $good['count'] ?>
					<a href="?p=cart&a=add&id=<?= $id ?>">+</a>
			</p>
			<p>цена: <?= $good['price'] ?></p>
			<p>итого: <?= $total ?></p>
			<hr>
		<?php endforeach; ?>
<?php endIf; ?>
<?php endIf; ?>
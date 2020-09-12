<?php
    /**@var array $goods*/
?>
<style>
		.btn{
			text-decoration: none;
			background-color: #7FFFD4;
			width: 210px;
			border-radius: 12px;
		}
</style>
<?php if (empty($_SESSION['user'])) : ?>
		<h2>Вам необходимо авторизоваться для того,<br>чтобы иметь доступ к просмотру списка товаров</h2>
<?php else : ?>
<h1 style="color: blue">добавить товар</h1>
		<form method="post" action="?p=good&a=addGood">
			<input name="name" placeholder="название товара">
			<input name="price" placeholder="цена товара"><br><br>
			<input name="info" placeholder="о товаре">
			<input type="submit" value="добавить товар" style="cursor: pointer">
		</form>
<h1>товары</h1>
<?foreach ($goods as $good) :?>
<h3><?= $good['name']?></h3>
<p><img src="/img/no_img.jpg" alt="no_img" style="width: 190px"></p>
<p><?= $good['info']?></p>
<p><?= $good['price']?>р.</p>
<a href="?p=good&a=one&id=<?= $good['id']?>" class="btn">подробнее</a>
<p
    style="cursor: pointer"
    onclick="addGood(<?= $good['id']?>)"
    class="btn"
    >добавить товар в корзину
</p>
<form method="post" action="?p=good&a=addToOrder">
<input name="hiddenGoodIdToOrder" value="<?= $good['id'] ?>" type="hidden">
<input type="submit" value="добавить товар к моему заказу" style="cursor: pointer"><br><br>
</form>
<a href="?p=updateGood&a=delGood&id=<?= $good['id']?>" class="btn">редактировать товар</a><br><br>
<form method="post" action="?p=good&a=delGood">
<input name="hiddenGoodId" value="<?= $good['id'] ?>" type="hidden">
<input type="submit" value="удалить товар" style="cursor: pointer">
</form>
<hr>

<?php endforeach; ?>
<?php endIf; ?>
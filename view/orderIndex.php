<?php
	/**@var string $user*/
	/**@var array $row*/
	/**@var array $res*/
    	$sql = "SELECT * FROM orders";
    	$res = mysqli_query(getLink(), $sql);
    	VAR_DUMP($orderGoodId);

?>
<style>
    .minus{
      float: left;
      width: 12px;
      margin-right: 12px;
    }
</style>
<?php if (empty($_SESSION['user'])) : ?>
		<h2>Вам необходимо авторизоваться для того,<br>чтобы иметь доступ к просмоту заказа</h2>
<?php else : ?>
	<h1>Мой заказ</h1>
	<?while ($row = mysqli_fetch_assoc($res)) :?>
	<form method="post" action="?p=good&a=delGoodFromOrder">
		<h3><?= $row['item'] ?></h3>
		<p>Стоимость: <?= $row['price'] ?>р.</p>
		<p>Количество: <?= $row['count'] ?></p>

		<p>Общая стоимость: </p>
		<p>Статус: <?= $row['status'] ?></p>
		<input value="<?= $row['id'] ?>" name="orderGoodId" type="hidden">
		<input type="submit" value="убрать из заказа" style="cursor: pointer">
	</form>
	<form method="post" action="?p=good&a=incrementInOrder" class="minus">
        		<input type="submit" value="-" style="cursor: pointer"></input>
    </form>
	<form method="post" action="?p=good&a=incrementInOrder">
    		<input type="submit" value="+" style="cursor: pointer"></input>
    </form>
	<hr>

<?php endwhile; ?>
<?php endIf; ?>
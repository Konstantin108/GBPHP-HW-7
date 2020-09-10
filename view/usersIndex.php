<?php
	/**@var string $user*/
	/**@var array $row*/
	/**@var array $res*/
    	$sql = "SELECT * FROM users";
    	$res = mysqli_query(getLink(), $sql);
?>
<?php if (empty($_SESSION['user'])) : ?>
		<h2>Вам необходимо авторизоваться для того,<br>чтобы иметь доступ к просмоту списка пользователей</h2>
<?php else : ?>
	<h1>Пользователи</h1>
	<?while ($row = mysqli_fetch_assoc($res)) :?>
	<form method="post" action="?p=users&a=delUser">
		<h3><?= $row['name'] ?></h3>
		<p><?= $row['position'] ?></p>
		<input value="<?= $row['id'] ?>" name="userId" type="hidden">
		<input type="submit" value="удалить пользователя" style="cursor: pointer">
	</form>
	<hr>

<?php endwhile; ?>
<?php endIf; ?>

<?php
	/**@var string $user*/
?>

<?php if (empty($_SESSION['user'])) : ?>
		<h2>Вам необходимо авторизоваться для того,<br>чтобы иметь возможность добавить нового пользователя</h2>
<?php else : ?>
<h1 style="color: blue">добавление пользователя</h1>
		<form method="post" action="?p=userAdd&a=register">
			<input name="name" placeholder="введите имя">
			<input name="position" placeholder="введите должность"><br><br>
			<input name="login" placeholder="введите логин">
			<input name="password" placeholder="введите пароль">
			<input type="submit" value="добавить пользователя" style="cursor: pointer">
		</form>
<?php endIf; ?>

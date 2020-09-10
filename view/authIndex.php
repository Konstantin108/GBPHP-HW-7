<?php
    /**@var string $user*/
?>
<?php if (empty($_SESSION['user'])) : ?>
		<form method="post" action="?p=auth&a=login">
			<input name="login" placeholder="login">
			<input name="password" placeholder="password">
			<input type="submit">
		</form>
<?php else : ?>
		вы авторизованы
		<a href="?p=auth&a=out">выход</a>
<?php endIf; ?>
<?php
	/**@var string $user*/
	/**@var string loginData*/
		$sqlLogin = "SELECT * FROM users";
    	$resLogin = mysqli_query(getLink(), $sqlLogin);
    	$loginData = mysqli_fetch_assoc($resLogin);
?>

<?php if (empty($_SESSION['user'])) : ?>
		<h2>Вам необходимо авторизоваться</h2>
<?php else : ?>
		<h3>Вы авторизованы под логином: <?= $loginData['login'] ?></h3>
		<h1>Добро пожаловать, <?= $loginData['name'] ?>!</h1>
<?php endIf; ?>
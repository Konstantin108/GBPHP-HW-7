<?php
/**@var string $user */
/**@var string loginData */
$sqlLogin = "SELECT * FROM users";
$resLogin = mysqli_query(getLink(), $sqlLogin);
$loginData = mysqli_fetch_assoc($resLogin);
?>

<?php if (empty($_SESSION['user'])) : ?>
    <h2>Вам необходимо авторизоваться</h2>
<?php else : ?>
    <h3>Вы авторизованы под логином: <?= $_SESSION['user'] ?></h3>
    <h1>Добро пожаловать, <?= $_SESSION['name'] ?>!</h1>
    <h1>Занимаемая должность: <?= $_SESSION['position'] ?></h1>
    <?php if ($_SESSION['is_admin'] == 1) : ?>
        <h2>Пользователь является администратором</h2>
    <?php elseif ($_SESSION['is_admin'] == 2) : ?>
        <h2>Пользователь имеет расширенные права</h2>
    <?php endif; ?>
<?php endif; ?>
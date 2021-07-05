<?php
/**@var string $user */
/**@var array $row */
/**@var array $res */
$sql = "SELECT * FROM users";
$res = mysqli_query(getLink(), $sql);
?>

<h1>Добро пожаловать</h1>
<h2>Список пользователей</h2>
<? while ($row = mysqli_fetch_assoc($res)) : ?>
    <form method="post" action="?p=users&a=delUser">
        <h3>имя пользователя: <?= $row['name'] ?></h3>
        <p>должность пользователя: <?= $row['position'] ?></p>
        <h3 style="color: green">логин: <?= $row['login'] ?></h3>
        <?php if ($row['is_admin'] == 1)  : ?>
            <h3 style="color: green">пароль: 123</h3>
            <h3 style="color: red">данный пользователь является администратором</h3>
        <?php elseif ($row['is_admin'] == 2) : ?>
            <h3 style="color: green">пароль: <?= $row['password'] ?></h3>
            <h3 style="color: blue">данный пользователь имеет расширенные права</h3>
        <?php else : ?>
            <h3 style="color: green">пароль: <?= $row['password'] ?></h3>
        <?php endif; ?>
    </form>
    <hr>

<?php endwhile; ?>





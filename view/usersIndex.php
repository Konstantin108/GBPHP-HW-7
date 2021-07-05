<?php
/**@var string $user */
/**@var array $row */
/**@var array $res */
$sql = "SELECT * FROM users";
$res = mysqli_query(getLink(), $sql);
?>
<?php if (empty($_SESSION['user'])) : ?>
    <h2>Вам необходимо авторизоваться для того,<br>чтобы иметь доступ к просмотру списка пользователей</h2>
<?php else : ?>
    <h1>Пользователи</h1>
    <? while ($row = mysqli_fetch_assoc($res)) : ?>
        <form method="post" action="?p=users&a=delUser">
            <h3><?= $row['name'] ?></h3>
            <p><?= $row['position'] ?></p>
            <input value="<?= $row['id'] ?>" name="userId" type="hidden">
            <?php if ($row['is_admin'] != 1)  : ?>
                <?php if ($_SESSION['is_admin'] == 1) : ?>
                    <input type="submit" value="удалить пользователя" style="cursor: pointer">
                <?php endif; ?>
            <?php else : ?>
                <h3 style="color: red">данный пользователь является администратором</h3>
            <?php endif; ?>
        </form>
        <hr>

    <?php endwhile; ?>
<?php endif; ?>

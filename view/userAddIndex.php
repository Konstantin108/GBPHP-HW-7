<?php
/**@var string $user */
?>
<?php if (empty($_SESSION['user'])) : ?>
    <h2>Вам необходимо авторизоваться для того,<br>чтобы иметь доступ к корзине</h2>
<?php else : ?>
    <?php if ($_SESSION['is_admin'] == 1) : ?>
        <h1 style="color: blue">добавление пользователя</h1>
        <form method="post" action="?p=userAdd&a=register">
            <input type="text" name="name" id="name" placeholder="введите имя">
            <input type="text" name="position" id="position" placeholder="введите должность"><br><br>
            <input type="text" name="login" id="login" placeholder="введите логин">
            <input name="password" id="password" placeholder="введите пароль"><br><br>
            <input name="avatar" id="avatar" type="hidden" value="no_avatar.png">
            <input type="submit" value="добавить пользователя" style="cursor: pointer">
        </form>
    <?php else : ?>
        <h2>Только администратор может добавлять новых пользователей</h2>
    <?php endif; ?>
<?php endif; ?>

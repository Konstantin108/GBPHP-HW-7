<?php
/**@var string $user */
?>
<?php if (empty($_SESSION['user'])) : ?>
    <form method="post" action="?p=auth&a=login">
        <input name="login" id="login" placeholder="login" type="text">
        <input name="password" id="name" placeholder="password" type="text">
        <input type="submit">
    </form>
<?php else : ?>
    вы авторизованы
    <a href="?p=auth&a=out">выход</a>
<?php endif; ?>
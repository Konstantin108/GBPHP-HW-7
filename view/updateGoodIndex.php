<?php
/**@var array $goods */
/**@var array $good */
?>

<?php if ($_SESSION['is_admin'] == 1) : ?>
    <h1 style="color: blue">редактирование товара</h1>
    <form method="post" action="?p=updateGood&a=updateDataOfGood">
        <input name="thisId" value="<?= $good['id'] ?>" type="hidden">
        <input type="text" name="nameForUpdate" id="nameForUpdate" value="<?= $good['name'] ?>">
        <input type="text" name="priceForUpdate" id="priceForUpdate" value="<?= $good['price'] ?>"><br><br>
        <input type="text" name="infoForUpdate" id="infoForUpdate" value="<?= $good['info'] ?>">
        <input type="hidden" name="counter" id="counter" value="1">
        <input type="hidden" name="img" id="img" value="no_img.jpg">
        <input type="submit" value="отредактировать" style="cursor: pointer">
    </form>
<?php else : ?>
    <h2>Только администратор может редактировать данные</h2>
<?php endif; ?>
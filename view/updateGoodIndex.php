<?php
    /**@var array $goods*/
    /**@var array $good*/
?>
<h1 style="color: blue">редактирование товара</h1>
		<form method="post" action="?p=updateGood&a=updateDataOfGood">
		    <input name="thisId" value="<?= $good['id'] ?>" type="hidden">
			<input name="nameForUpdate" placeholder="<?= $good['name'] ?>">
			<input name="priceForUpdate" placeholder="<?= $good['price'] ?>"><br><br>
			<input name="infoForUpdate" placeholder="<?= $good['info'] ?>">
			<input type="submit" value="отредактировать" style="cursor: pointer">
		</form>
<?php
    /**@var array $good*/
?>
<style>
		.btn{
			text-decoration: none;
			background-color: #7FFFD4;
			width: 210px;
			border-radius: 12px;
		}
</style>
<h2><?= $good['name']?></h2>
<p><img src="/img/no_img.jpg" alt="no_img" style="width: 190px"></p>
<p><?= $good['info']?></p>
<p><?= $good['price']?>р.</p>
<p><a href="?p=cart&a=add&id=<?= $good['id']?>" class="btn">добавить товар в корзину</a></p>
<a href="?p=updateGood&a=delGood&id=<?= $good['id']?>" class="btn">редактировать товар</a><br><br>
<!--<a href="?p=good&a=delGood&id=<?= $good['id']?>" class="btn">удалить товар</a><br><br>-->
<form method="post" action="?p=good&a=delGood">
<input name="hiddenGoodId" value="<?= $good['id'] ?>" type="hidden">
<input type="submit" value="удалить товар" style="cursor: pointer">
</form><br>
<a href="?p=good" class="btn">назад</a>
<hr>
<?php


function indexAction()
{
	return allAction();
}
function allAction()
{

	$sql = "SELECT id, name, price, info FROM goods";
	$res = mysqli_query(getLink(), $sql);

	$goods = mysqli_fetch_all($res, MYSQLI_ASSOC);
	    return render(
            'goodAll',
            [
                'goods' => $goods,
                'title' => 'All goods'
            ]
        );
}

function addGoodAction()
{

$sqlNewGood = 'SELECT * FROM goods';
$resNewGood = mysqli_query(getLink(), $sqlNewGood);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$price = $_POST['price'];
		$info = $_POST['info'];
		$sqlAddNewGood = "INSERT INTO goods (id, name, price, info) VALUES (NULL, '{$name}', '{$price}', '{$info}');";
		if(!empty($name) && !empty($price) && !empty($info)){
			mysqli_query(getLink(), $sqlAddNewGood);
			$msg = 'Товар успешно добавлен';
			setMSG($msg);
			redirect();
			exit;
		}else{
            	return render(
            		'emptyFields',
            		[
            			'title' => 'emptyFields',
            		]);
		}
	}
}


function oneAction()
{
	$sql = "SELECT id, name, price, info FROM goods WHERE id = " . getId();
	$res = mysqli_query(getLink(), $sql);
    $good = mysqli_fetch_assoc($res);
    return render(
        'goodOne',
        [
            'good' => $good,
            'title' => $good['name']
        ]
    );

}

//function delGoodAction()
//{
//	$sqlDel = "DELETE FROM goods WHERE goods.id = " . getId();
//	$resDel = mysqli_query(getLink(), $sqlDel);
//	header('Location: ' . '/?p=good&a=all');
//	exit;
//}

function delGoodAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $hiddenGoodId = $_POST['hiddenGoodId'];
            $sqlDel = "DELETE FROM goods WHERE goods.id = {$hiddenGoodId}";
            $resGoodDel = mysqli_query(getLink(), $sqlDel);
            header('Location: ' . '/?p=good&a=all');
            exit;

    }

}
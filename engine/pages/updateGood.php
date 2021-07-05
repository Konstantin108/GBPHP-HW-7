<?php

function indexAction()
{
    return updateOneGoodAction();
}

function updateOneGoodAction()
{
    $sql = "SELECT id, name, price, info, counter, img FROM goods WHERE id = " . getId();
    $res = mysqli_query(getLink(), $sql);
    $good = mysqli_fetch_assoc($res);
    return render(
        'updateGoodIndex',
        [
            'good' => $good,
            'id' => $good['id'],
            'title' => $good['name']
        ]
    );
}

function updateDataOfGoodAction()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $thisId = $_POST['thisId'];
        $nameForUpdate = $_POST['nameForUpdate'];
        $priceForUpdate = $_POST['priceForUpdate'];
        $infoForUpdate = $_POST['infoForUpdate'];
        $counter = $_POST['counter'];
        $img = $_POST['img'];
        $sqlAddUpdateGood = "UPDATE goods
                                    SET
                                name = '{$nameForUpdate}',
                                price = '{$priceForUpdate}',
                                info = '{$infoForUpdate}',
                                counter = '{$counter}',
                                img = '{$img}'        
                                    WHERE
                                goods.id = {$thisId}";
        if (!empty($nameForUpdate) && !empty($priceForUpdate) && !empty($infoForUpdate)) {
            mysqli_query(getLink(), $sqlAddUpdateGood);
            $msg = 'Товар отредактирован';
            setMSG($msg);
            header('Location: ' . '/?p=good&a=all');
            exit;
        } else {
            return render(
                'emptyFields',
                [
                    'title' => 'emptyFields',
                ]);
        }
    }
}




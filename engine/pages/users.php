<?php


function indexAction()
{

    return render(
        'usersIndex',
        [
            'user' => $_SESSION['user'],
            'title' => 'users',
        ]);

}

function delUserAction()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userId = $_POST['userId'];
        $delUser = "DELETE FROM users WHERE users.id = {$userId}";
        $resUserDel = mysqli_query(getLink(), $delUser);
        header('Location: ' . '/?p=users&a=index');
        exit;

    }

}
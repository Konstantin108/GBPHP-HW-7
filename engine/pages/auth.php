<?php


function indexAction()
{
    return render(
        'authIndex',
        [
            'user' => $_SESSION['user'],
            'title' => 'Auth',
        ]);
}


function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /?p=auth');
        return;
    }

    if (empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: /?p=auth');
        return;
    }

    $login = clearStr($_POST['login']);
    $password = $_POST['password'];

    $sql = "SELECT login, password FROM users WHERE login = '{$login}'";   //<--создание запроса к БД
    $result = mysqli_query(getLink(), $sql);    //<--отправка запроса к БД и запись результата запроса в переменную
    $userData = mysqli_fetch_assoc($result);    //<--обработка результата запроса

    $sqlAllData = "SELECT id, name, is_admin, position, avatar FROM users WHERE login = '{$login}'";   //<--создание запроса к БД(поиск имени)
    $resultAllData = mysqli_query(getLink(), $sqlAllData);
    $allData = mysqli_fetch_assoc($resultAllData);

    $dataId = '';
    $dataName = '';
    $dataIsAdmin = '';
    $dataPosition = '';
    $dataAvatar = '';

    foreach ($allData as $item => $data) {
        if ($item == 'id') {
            $dataId = $data;
        } elseif ($item == 'name') {
            $dataName = $data;
        } elseif ($item == 'is_admin') {
            $dataIsAdmin = $data;
        } elseif ($item == 'position') {
            $dataPosition = $data;
        } elseif ($item == 'avatar') {
            $dataAvatar = $data;
        }
    }

    if (!empty($userData) && password_verify($password, $userData['password'])) {    //<--верификация хэша пароля
        $_SESSION['user'] = $login;
        $_SESSION['id'] = $dataId;
        $_SESSION['name'] = $dataName;
        $_SESSION['is_admin'] = $dataIsAdmin;
        $_SESSION['position'] = $dataPosition;
        $_SESSION['avatar'] = $dataAvatar;
    }

    header('Location: /?p=personalPage');
    return;
}

function outAction()
{
    session_destroy();
    header('Location: /?p=auth');
}


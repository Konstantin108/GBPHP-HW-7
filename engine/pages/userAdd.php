<?php


function indexAction()
{

    return render(
        'userAddIndex',
        [
            'user' => $_SESSION['user'],
            'title' => 'add user',
        ]);

}

function userAddedAction()
{
    return render(
        'userAdded',
        [
            'title' => 'added user',
        ]);

}


function registerAction()
{

    if (empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: /?p=userAdd&a=index');
        return;
    }

    $sqlUsers = 'SELECT * FROM users';
    $resUsers = mysqli_query(getLink(), $sqlUsers);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $position = $_POST['position'];
        $avatar = $_POST['avatar'];
        $sqlAddUser = "INSERT INTO users (
                               id,
                               login,
                               password,
                               name,
                               is_admin,
                               position,
                               avatar
                   ) VALUES (
                                NULL,
                                '{$login}',
                                '{$password}',
                                '{$name}',
                                0,
                                '{$position}',
                                '{$avatar}'
                   );";
        if (!empty($login) && !empty($password) && !empty($name)) {
            mysqli_query(getLink(), $sqlAddUser);
            header('Location: ?p=userAdd&a=userAdded');   //<---избавился от лишнего перенаправления
            exit;
        }
    }
}
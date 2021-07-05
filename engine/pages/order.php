<?php


function indexAction()
{

    return render(
        'orderIndex',
        [
            'user' => $_SESSION['user'],
            'title' => 'order',
        ]);

}

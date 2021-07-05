<?php

function indexAction()
{

    return render(
        'home',
        [
            'user' => $_SESSION['user'],
            'title' => 'home',
        ]);
}
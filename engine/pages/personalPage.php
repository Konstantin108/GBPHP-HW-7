<?php

function indexAction()
{

    return render(
        'personalPageIndex',
        [
            'user' => $_SESSION['user'],
            'title' => 'PersonalPage',
        ]);

}

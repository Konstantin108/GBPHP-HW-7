<?php


function indexAction()
{
    return allAction();
}

function allAction()
{
    return '<h1>пользователи</h1>';
}

function oneAction()
{
    return '<h1>пользователь</h1>';
}

function addAction()
{
    if (!isAdmin()) {
        header('Location: /');
        return '';
    }
    return 'Добавление';
}
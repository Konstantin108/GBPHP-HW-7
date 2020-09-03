<?php

function getLink()
{
	static $link;
	if(empty($link)){
		$link = mysqli_connect('127.0.0.1', 'root', 'root', 'gbphp');
	}
	return $link;
}

function getContent()
{
	$page = 'index';
	if(!empty($_GET['p'])){
		$page = trim($_GET['p']);
	}

	$fileName = getFullNamePage($page);

	if(!file_exists($fileName)){
		$fileName = getFullNamePage('index');
	}

	require_once $fileName;

	$action = 'index';
	if(!empty($_GET['a'])){
		$action = trim($_GET['a']);
	}

	$action .= 'Action';
	if(!function_exists($action)){
		$action = 'indexAction';
	}

	return $action();

}

function getFullNamePage($page)
{
	return __DIR__ . '/pages/' . $page . '.php';
}

function clearStr($str)
{
	return mysqli_real_escape_string(getLink(), strip_tags(trim($str)));
}

function isAdmin()
{
	return !empty($_SESSION['user']);
}

function getId()
{
	if(empty($_GET['id'])){
		return 0;
	}
	return (int)$_GET['id'];
}

function redirect($path = '')    //<--- создание redirect
{
	if(!empty($path)){
		header('Location: ' . $path);
		return;
	}
	if(isset($_SERVER['HTTP_REFERER'])){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		return;
	}

	header('Location: /');
}

function setMSG($msg)
{
	$_SESSION['msg'] = $msg;
}

function segMSG()
{
	if(empty($_SESSION['msg'])){
		return '';
	}
	$msg = $_SESSION['msg'];
	unset($_SESSION['msg']);
	return $msg;
}

function goodsCount()
{
	if(empty($_SESSION['goods'])){
		return 0;
	}

	return count($_SESSION['goods']);
}
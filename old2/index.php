<?php
require_once __DIR__ . '/config/lib.php';
$pages = include __DIR__ . '/config/pages.php';

$pageName = getPage($pages);

ob_start();
include __DIR__ . '/pages/' . $pageName;
$content = ob_get_clean();

$html = file_get_contents('main.html');
echo str_replace('{{content}}', $content, $html);
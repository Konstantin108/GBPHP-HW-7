<?php
session_start();
require_once __DIR__ . '/lib.php';

$content = getContent();
if (!empty($content)) {
    echo $content;
    // $html = file_get_contents(__DIR__ . '/main.html');
    // echo str_replace(
    // 	['{{content}}', '{{MSG}}', '{{GOOD_COUNT}}'],
    // 	[$content, segMSG(), goodsCount()],
    // 	$html
    // );
}
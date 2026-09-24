<?php
$dt = time();
$page = $_SERVER['REQUEST_URI'] ?? '';
$ref = $_SERVER['HTTP_REFERER'] ?? '';

$path = 'log/' . PATH_LOG;
$str = "$dt|$page|$ref\n";

file_put_contents($path, $str, FILE_APPEND);
?>
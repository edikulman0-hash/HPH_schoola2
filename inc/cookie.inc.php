<?php
$visitCounter = 0;

if (isset($_COOKIE['visitCounter'])) {
    $visitCounter = (int)$_COOKIE['visitCounter'];
}

$visitCounter++;

$lastVisit = "";

if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = date('d-m-Y H:i:s', $_COOKIE['lastVisit']);
}

// Устанавливаем куки раз в день
if (!isset($_COOKIE['lastVisit']) || date('d-m-Y', $_COOKIE['lastVisit']) !== date('d-m-Y')) {
    setcookie('visitCounter', $visitCounter, time() + 3600 * 24 * 30);
    setcookie('lastVisit', time(), time() + 3600 * 24 * 30);
}
?>
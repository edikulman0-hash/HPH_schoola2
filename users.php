<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

$user1 = new User('Вася Пупкин', 'vasya', '12345');
$user2 = new User('Петя Иванов', 'petya', 'qwerty');
$user3 = new User('Иван Сидоров', 'ivan', 'secret');

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

$user = new SuperUser('Админ Админов', 'admin', 'root123', 'administrator');
$user->showInfo();

echo "<h4>Результат getInfo():</h4><pre>";
print_r($user->getInfo());
echo "</pre>";

echo "<h4>Проверка auth():</h4>";
var_dump($user->auth('admin', 'root123'));

echo "<br /><br />Всего обычных пользователей: " . User::$userCount . "<br />";
echo "Всего супер-пользователей: " . SuperUser::$superUserCount . "<br /><br />";
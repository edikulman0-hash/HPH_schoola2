<?php
class User {
    public $name;
    public $login;
    public $password;

    public function showInfo() {
        echo "<p>";
        echo "Имя: {$this->name}<br />";
        echo "Логин: {$this->login}<br />";
        echo "Пароль: {$this->password}<br />";
        echo "</p>";
    }
}

$user1 = new User();
$user1->name = 'Вася Пупкин';
$user1->login = 'vasya';
$user1->password = '12345';

$user2 = new User();
$user2->name = 'Петя Иванов';
$user2->login = 'petya';
$user2->password = 'qwerty';

$user3 = new User();
$user3->name = 'Иван Сидоров';
$user3->login = 'ivan';
$user3->password = 'secret';

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
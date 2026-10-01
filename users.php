<?php
class User {
    public $name;
    public $login;
    public $password;

    public function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public function __destruct() {
        echo "Пользователь {$this->login} удален<br />";
    }

    public function showInfo() {
        echo "<p>";
        echo "Имя: {$this->name}<br />";
        echo "Логин: {$this->login}<br />";
        echo "Пароль: {$this->password}<br />";
        echo "</p>";
    }
}

$user1 = new User('Вася Пупкин', 'vasya', '12345');
$user2 = new User('Петя Иванов', 'petya', 'qwerty');
$user3 = new User('Иван Сидоров', 'ivan', 'secret');

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
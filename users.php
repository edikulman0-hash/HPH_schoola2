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

class SuperUser extends User {
    public $role;

    public function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    public function showInfo() {
        echo "<p>";
        echo "Имя: {$this->name}<br />";
        echo "Логин: {$this->login}<br />";
        echo "Пароль: {$this->password}<br />";
        echo "Роль: {$this->role}<br />";
        echo "</p>";
    }
}

$user1 = new User('Вася Пупкин', 'vasya', '12345');
$user2 = new User('Петя Иванов', 'petya', 'qwerty');
$user3 = new User('Иван Сидоров', 'ivan', 'secret');

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

$user = new SuperUser('Админ Админов', 'admin', 'root123', 'administrator');
$user->showInfo();
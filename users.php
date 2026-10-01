<?php
abstract class UserAbstract {
    abstract public function showInfo();
}

interface ISuperUser {
    public function getInfo();
}

interface IAuthorizeUser {
    public function auth($login, $password);
}

class User extends UserAbstract {
    public $name;
    public $login;
    public $password;

    public static $userCount = 0;

    public function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$userCount++;
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

class SuperUser extends User implements ISuperUser, IAuthorizeUser {
    public $role;

    public static $superUserCount = 0;

    public function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$superUserCount++;
    }

    public function showInfo() {
        echo "<p>";
        echo "Имя: {$this->name}<br />";
        echo "Логин: {$this->login}<br />";
        echo "Пароль: {$this->password}<br />";
        echo "Роль: {$this->role}<br />";
        echo "</p>";
    }

    public function getInfo() {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'password' => $this->password,
            'role' => $this->role
        ];
    }

    public function auth($login, $password) {
        return ($this->login === $login && $this->password === $password);
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

echo "Всего обычных пользователей: " . User::$userCount . "<br />";
echo "Всего супер-пользователей: " . SuperUser::$superUserCount . "<br />";
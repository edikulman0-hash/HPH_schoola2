<?php
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
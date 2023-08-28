<?php

namespace models\dto;

class ConnectionDTO
{
    public string $host;
    public string $username;
    public string $password;
    public string $database;

    public function __construct($host, $database, $username, $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function setHost($host): void
    {
        $pattern =  '/^(localhost|[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*)$/';
        if (!preg_match($pattern, $host)) {
            throw new \InvalidArgumentException('Некорректное значение хоста!');
        }
        $this->host = $host;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function setPassword($password) : void
    {
        if (mb_strlen($password) < 4 || mb_strlen($password) > 32) {
            throw new \Exception('Некорректное значение пароля!');
        }
        $this->password=$password;
    }

    public function setDatabase($database) : void
    {
        if (mb_strlen($database) < 1 || mb_strlen($database) > 64) {
            throw new \Exception('Некорректное значение базы данных!');
        }
        $this->database=$database;
    }
}
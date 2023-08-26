<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '0611';
    private $database = 'link';

    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
        } catch (PDOException $e) {
            echo 'Ошибка соединения с базой данных: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
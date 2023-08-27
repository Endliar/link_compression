<?php

namespace models\DTO;

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
}